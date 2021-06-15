<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdController extends Controller
{
    public function getProduct($id)
    {
        $user_id = 0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $user_id=User::find($user_id)->is_admin;

        }
        $product = Product::where('id',$id)->first();
        $category = Category::all();
        return view("prodcreate.edit",['product'=>$product,'category'=>$category,'user_id'=>$user_id]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $user_id = 0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $user_id=User::find($user_id)->is_admin;

        }
        return view('prodcreate.index',['product'=>$product,'category'=>$category,'user_id'=>$user_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $category = Category::pluck('id');
        return view('prodcreate.index',['product'=>$product,'category'=>$category]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name=$request->productnameform;
        $product->price=$request->productpriceform;
        $product->new_price=$request->productnew_priceform;
        $product->in_stock=$request->productin_stockform;
        $product->barcode=$request->productbarcodeform;
        $product->description=$request->productdescriptionform;
        $fname = $request->file('productimagepathform');
        if($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $product->imagepath = '/images/' . $original_name;
        }
        $product->kCal=$request->productkcalform;
        $product->protein=$request->productproteinform;
        $product->fats=$request->productfatsform;
        $product->carbohydrates=$request->productcarbohydratesform;
        $product->category_id=$request->productcategory_idform + 1;

        if(!$product->save())
        {
            $err=$product->getErrors();
            return redirect()->action('ProdController@index')->with('errors',$err)->withInput();
        }

        return redirect()->action('ProdController@index')->with('message',"New product $product->name has been added with id $product->id");
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
        $product = Product::find($id);
        return view("prodcreate.edit",['product'=>$product]);

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
        $product = Product::find($id);
        $product->name=$request->productnameform;
        $product->price=$request->productpriceform;
        $product->new_price=$request->productnew_priceform;
        $product->in_stock=$request->productin_stockform;
        $product->barcode=$request->productbarcodeform;
        $product->description=$request->productdescriptionform;
        $fname = $request->file('productimagepathform');
        if($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $product->imagepath = '/images/' . $original_name;
        }
        $product->kCal=$request->productkcalform;
        $product->protein=$request->productproteinform;
        $product->fats=$request->productfatsform;
        $product->carbohydrates=$request->productcarbohydratesform;
        $product->category_id=$request->productcategory_idform + 1;

        if(!$product->save())
        {
            $err=$product->getErrors();
//            return redirect()->action('ProdController@')->with('errors',$err)->withInput();
            return redirect()->action("ProdController@index")->with('errors',$err)->withInput();
        }

        return redirect()->action("ProdController@index")->with('message',"New product $product->name has been added with id $product->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('home'));
    }
}
