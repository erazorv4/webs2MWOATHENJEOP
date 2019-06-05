<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
	
	public function newProduct(Request $request)
	{		
		if(!$this->formValid()){
			return Redirect::to('cms/product_lijst');
		}
		$this->validate($request, [
			'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

			$imageName = $request->Image->getClientOriginalName();

			$request->Image->move(public_path('img\WebshopImages'), $imageName);


		Product::Insert(['name' => $_POST['Name'], 'price' =>$_POST['Price'], 'category_id' => $_POST['Category'], 'image' => $imageName , 'description' => $_POST['Description'] ]);


		return Redirect::to('cms/product_lijst');
	}
	
	public function editProduct(Request $request)
	{
		if(!$this->formValid()){
			return Redirect::to('cms/product_lijst');
		}

		$this->validate($request, [
			'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
			$imageName = $request->Image->getClientOriginalName();

			$request->Image->move(public_path('img\WebshopImages'), $imageName);


		Product::Where('id', '=', $_POST['Id'])->update(['name' => $_POST['Name'], 'price' =>$_POST['Price'], 'category_id' => $_POST['Category'], 'image' => $imageName, 'description' => $_POST['Description'] ]);

		return Redirect::to('cms/product_lijst');
	}
	
	private function formValid()
	{		
		$isValid = true;
		
		if(!isset($_POST['Name']))
		{
			$isValid = false;
		}
		
		if(!isset($_POST['Price']))
		{
			$isValid = false;
		}
		else
        {
			if($_POST['Price'] == '')
			{
				$isValid = false;
			}
		}

        if (!isset($_POST['Category']))
        {
            $isValid = false;
        }
		
		if(!isset($_POST['Description'])){
			$isValid = false;
		}
		
		return $isValid;
	}
	
	public function getFormData($id = -1)
	{
		$formData['name'] = "";
		$formData['price'] = "0";
		$formData['category_id'] = 0;
		$formData['image'] = "";
		$formData['description'] = "";
		
		if($id != -1){
			
			$product = Product::find($id);

			if($product != null){

				$formData['name'] = $product->name;
				$formData['price'] = $product->price;
				$formData['category_id'] = $product->category_id;
				$formData['image'] = $product->image;
				$formData['description'] = $product->description;
			}
		}
		return $formData;
	}
	
	public function removeItem($id)
	{		
		Product::Where('ID', '=', $id)->Delete();
		
		return redirect('cms/product_lijst');
	}

	public function upload()
	{
		$file = Input::file('Image');
		$file->move('uploads', $file->getClientOriginalName());
	}

}
