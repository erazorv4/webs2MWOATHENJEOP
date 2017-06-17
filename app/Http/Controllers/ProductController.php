<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
	
	public function newProduct()
	{		
		if(!$this->formValid()){
					
			return Redirect::to('cms/product_lijst');
					
		}
		
		Product::Insert(['name' => $_POST['Name'], 'price' =>$_POST['Price'], 'category' => $_POST['Category'], 'image' => $_POST['Image'], 'description' => $_POST['Description'] ]);
		
		return Redirect::to('cms/product_lijst');
	}
	
	public function editProduct()
	{
		if(!$this->formValid()){
				
			return Redirect::to('cms/product_lijst');
				
		}
		Product::Where('id', '=', $_POST['Id'])->update(['name' => $_POST['Name'], 'price' =>$_POST['Price'], 'category' => $_POST['Category'], 'image' => $_POST['Image'], 'description' => $_POST['Description'] ]);
		
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

        if (!isset($_POST['Image']))
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
		$data['name'] = "";
		$data['price'] = "0";
        $date['category'] = "";
		$date['image'] = "";
		$data['description'] = "";
		
		if($id != -1){
			
			$product = Product::find($id);
			
			if($product != null){
				
				$data['name'] = $product->name;
				$data['price'] = $product->price;
				$date['category'] = Category::find($product->category_id)->name;
				$date['image'] = $product->image;
				$data['description'] = $product->description;
				
			}
			
		}
		
		return $data;
	}
	
	public function removeItem($id)
	{		
		Product::Where('ID', '=', $id)->Delete();
		
		return redirect('cms/product_lijst');
	}
	
}
