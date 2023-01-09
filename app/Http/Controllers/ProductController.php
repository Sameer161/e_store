<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
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
                'description'=>$request->description,
                'price'=>$request->price,                
                'stock'=>$request->stock,                
                'cateid'=>$request->cate_id                
            ];
            if($request->hasFile('image')){
                $file=$request->file('image');
                $filename=Storage::putFile('/public/upload',$file);
                $data['image']=$filename;
            }
            $addpr=new Product;
            $addpr->insert($data);
            return redirect('addproducts');
        }      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $data=[];
        $data['sinpr']=Product::find($id);
        return view('main.single-product',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $showpr=Product::all();
        return view('admin.products.showproduct',compact('showpr'));
    }
    public function view(Product $product)
    {
        $data=[];
        $data['catemen']=Categories::where('id','1')->get();
        $data['catewomen']=Categories::where('id','2')->get();
        $data['showpr']=Product::where('cateid','1')->get();
        $data['showwo']=Product::where('cateid','2')->get();
        return view('main.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[];
        $data['editpr']=Product::find($id);
        $data['cateid']=Categories::all();
        return view("admin.products.update",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->isMethod('post')){
            $data=[
                'name'=>$request->name,
                'description'=>$request->description,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'cateid'=>$request->cate_id                
            ];
            if($request->hasFile('image')){ 
                $file=$request->file('image');
                $filename=Storage::putFile('/public/upload',$file);
                $data['image']=$filename;
            }
            $updatepr=Product::find($id);
            $updatepr->update($data);
            return redirect('viewproducts');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delpr=Product::find($id);
        $delpr->delete();
        return redirect('viewproducts');
    }
}
