<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WinkelwagenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('winkelwagen');
    }

    public function AddToCart(Request $request)
    {
        $product = collect([
            $request->get('id'),
            $request->get('name'),
            $request->get('price'),
            $request->get('quantity')
        ]);
        session()->push('shopping_cart', $product);

        return Redirect::to('winkel');
    }

    public function EditItem(Request $request, $productKey)
    {
        $product = session()->get('shopping_cart.' . $productKey);
        //session()->forget('shopping_cart.' . $product);
        $product[3] = $request->get('quantity');

        return Redirect::to('/winkelwagen');
    }

    public function PurchaseItems(Request $request)
    {
        /*$order = session()->get('shopping_cart');

        session()->push('shopping_cart', $product);*/

        return view('payment');
    }

    public function RemoveItem($product)
    {
        session()->forget('shopping_cart.' . $product);

        return Redirect::to('/winkelwagen');
    }
}