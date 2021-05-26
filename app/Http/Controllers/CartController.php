<?php

namespace App\Http\Controllers;


use App\Product;
use App\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  CartController extends Controller
{

    public function addToCart(Request $request){
        $product = Product::where('id', $request->id)->first();

        if(!isset($_COOKIE['cart_id']))
        {
            setcookie('cart_id',uniqid());
        }
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'imagepath'=>$product->imagepath
            ]
        ]);
        return response()->json(\Cart::getContent());
    }

    public function clearCart(){

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = 0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $user_id=User::find($user_id)->is_admin;

        }
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $total = \Cart ::session($cart_id) ->getTotal();
        $products = \Cart::getContent();
        return view('cart.index',['products'=>$products,'total'=>$total,'user_id'=>$user_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
