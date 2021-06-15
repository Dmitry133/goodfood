<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatController extends Controller
{


    public function getCat($cat_alias){
        $user_id = 0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $user_id=User::find($user_id)->is_admin;

        }
        $category = Category::where('alias',$cat_alias)->first();
        return view("content.edit",['category'=>$category,'user_id'=>$user_id]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $user_id = 0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $user_id=User::find($user_id)->is_admin;

        }
        return view('content.index',['category'=>$category,'user_id'=>$user_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        return view('content.index',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->title=$request->categorytitleform;
        $category->description=$request->categorydescriptionform;

        $fname = $request->file('categoryimagepathform');
        if($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $category->imagepath = '/images/' . $original_name;
        }

        $category->alias=$request->categoryaliasform;

        if(!$category->save())
        {
            $err=$category->getErrors();
            return redirect()->action('CatController@index')->with('errors',$err)->withInput();
        }

        return redirect()->action('CatController@index')->with('message',"New category $category->title has been added with id $category->id");
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
        $category = Category::find($id);
        return view("content.edit",['category'=>$category]);
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
        $category = Category::find($id);
        $category->title=$request->categorytitleform;
        $category->description=$request->categorydescriptionform;

        $fname = $request->file('categoryimagepathform');
        if($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $category->imagepath = '/images/' . $original_name;
        }

        $category->alias=$request->categoryaliasform;

        if(!$category->save())
        {
            $err=$category->getErrors();
            return redirect()->action('CatController@getCat',['cat'=>$category->alias])->with('errors',$err)->withInput();
        }

        return redirect()->action('CatController@getCat',['cat'=>$category->alias])->with('message',"New category $category->title has been edit with id $category->id");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route('home'));
    }
}
