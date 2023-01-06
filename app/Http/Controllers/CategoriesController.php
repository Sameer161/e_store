<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('post')){
         $data=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $addcate=new Categories;
        $addcate->insert($data);
        return view('admin.categories.addcategories');
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        $showcate=Categories::all();
        return view('admin.categories.showcategories',compact('showcate'));
    }
    public function view()
    {
        $data=[];
        $data['cateid']=Categories::all();
        // dd($data['cateid']);
        return view('admin.products.addproduct',$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updacate=Categories::find($id);
        return view('admin.categories.updatecategories',compact('updacate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $updacate=Categories::find($id);
        $data=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $updacate->update($data);
        return redirect('showcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcate=Categories::find($id);
        $delcate->delete();
        return redirect('showcategories');
    }
}
