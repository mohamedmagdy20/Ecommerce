<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\images;
use App\Models\Products as productmodel ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class products extends Controller
{
    //

    public function products(){
        $products = DB::table('products')->select('products.id as prodId','stock','products.name as prodName','products.description','products.priceOut as priceout','products.priceIn as pricein','products.img','products.created_at','categories.name as catName','suppliers.name as supName')
        ->join('categories','categories.id','=','products.categories_id')
        ->join('suppliers','products.suppliers_id','=','suppliers.id')->orderBy('products.id','desc')->get();
        //dd($products);
        //return view('admin.products',compact('products'));
        return response()->json($products);
    }

    public function shortageproduct(){
        $prods = DB::table('products')->select('products.id as prodId','stock','products.name as prodName','products.description','products.priceOut as priceout','products.priceIn as pricein','products.img','products.created_at','categories.name as catName','suppliers.name as supName')
        ->join('categories','categories.id','=','products.categories_id')
        ->join('suppliers','products.suppliers_id','=','suppliers.id')->orderBy('products.id','desc')->where('stock','<=',10)->get();
        // return view('admin.shortageproduct',compact('prods'));
        return response()->json($prods); 
    }

    public function storeproduct(Request $req){
       $images = $req->file('images');
       $product = new productmodel();
       $product->name = $req->name;
       $product->description = $req->desc;
       $product->priceIn = $req->priceIn;
       $product->priceOut = $req->priceOut;
       $product->categories_id = $req->category;
       $product->suppliers_id = $req->supplier;
       $product->stock = $req->stock;   
       $product->img = 'no-image';
       $product->save();

       //

       for ($i=0; $i <count($images) ; $i++) {
        $image = $images[$i]; 
        $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
        $img = new images();
        $img->img = $imageName; 
        $img->product_id = $product->id;
        $img->save(); 
        $image->move(public_path('/uploads'), $imageName);
        if($i == 0){
            $product->img = $imageName;
            $product->save();
            }
        }

        return response()->json(["status"=>201,"msg"=>'category inserted']);
    }

   
}
