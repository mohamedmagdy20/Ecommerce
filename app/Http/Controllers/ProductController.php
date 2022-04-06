<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function products(){
        $products = DB::table('products')->select('products.id as prodId','stock','products.name as prodName','products.description','products.priceOut as priceout','products.priceIn as pricein','products.img','products.created_at','categories.name as catName','suppliers.name as supName')
        ->join('categories','categories.id','=','products.categories_id')
        ->join('suppliers','products.suppliers_id','=','suppliers.id')->orderBy('products.id','desc')->get();
        //dd($products);
        return view('admin.products',compact('products'));
    }
    public function addproduct(){
        $cats = DB::table("categories")->select('categories.name','categories.id')->get();
        $sups =DB::table('suppliers')->select('suppliers.name','suppliers.id')->get();
        return view('admin/addproduct',compact('cats','sups'));
   }
   public function storeproduct(Request $req){
    $images = $req->file('images');
    // validation //
    // $req->validate(['name'=>"required",'description'=>"required",
    // 'priceIn'=>"required|numeric",'priceOut'=>"required|numeric"
    // ,'stock'=>"required|numeric"]);
    // // create Product //
    $product = new Products();
    $product->name = $req->name;
    $product->description = $req->desc;
    $product->priceIn = $req->priceIn;
    $product->priceOut = $req->priceOut;
    $product->categories_id = $req->category;
    $product->suppliers_id = $req->supplier;
    $product->stock = $req->stock;   
    $product->img = 'no-image';
    $product->save();
//   //////////////////////////////////////////////////////////
// store the images names in the database and store the images in the public folder
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
    Session::flash("success","Product Added");
    return redirect('admin/products');
}

public function deleteproduct($id){
    $imgs =DB::table('images')->select('img')->where('product_id','=',$id)->get();
    foreach($imgs as $img){
        unlink("uploads/".$img->img);
    }
    DB::table('images')->where('images.product_id','=',$id)->delete();
    DB::table('products')->delete($id);
    
    Session::flash("success","Product Deleted");
    return redirect('admin/products');
}
public function editproduct($id){
    $prod = DB::table('products')
    ->select("products.id as prodId","products.name as prodName","priceIn","priceOut","products.img as prodImg" ,"stock" ,"products.created_at","description" ,"categories.name as catName","suppliers.name as supName")
    ->join('categories','categories.id','=','products.categories_id')
    ->join('suppliers','suppliers.id','=','products.suppliers_id')
    ->where('products.id',$id)->first(); 
    $cats = DB::table("categories")->select('categories.name','categories.id')->get();
    $sups =DB::table('suppliers')->select('suppliers.name','suppliers.id')->get();
    return view("admin/editproduct",compact('prod','cats','sups'));     
}
public function updateproduct(Request $req){
       unlink("uploads/".$_POST['images']);
        $newImage = $req->images;
        $fileName =Str::random(30).'.'.$newImage->getClientOriginalName();
        $newImage->move(public_path()."uploads/", $fileName);
        DB::table("product")->where('id',$_POST['id'])->update([
            "name" => $_POST['name'],
            "img"=> $_POST['images'],
            "priceIn"=>$_POST['priceIn'],
            "priceOut"=>$_POST['priceOut'],
            "stock"=>$_POST['stock'],
            "description"=>$_POST['desc'],

        ]);
        Session::flash("success","Product Updated");
        return redirect("admin/products");
    }

    public function shortageproduct(){
        $prods = DB::table('products')->select('products.id as prodId','stock','products.name as prodName','products.description','products.priceOut as priceout','products.priceIn as pricein','products.img','products.created_at','categories.name as catName','suppliers.name as supName')
        ->join('categories','categories.id','=','products.categories_id')
        ->join('suppliers','products.suppliers_id','=','suppliers.id')->orderBy('products.id','desc')->where('stock','<=',10)->get();
        return view('admin.shortageproduct',compact('prods'));
    }

    
    public function searchproduct(Request $req){
        $name  = $req->search;
        $search = DB::table("products")->select("products.id as prodId",'suppliers.name as supName',"products.name as prodName","priceOut","priceIn","products.img" ,"stock" ,"products.created_at","description" ,"categories.name as catName")
        ->join('categories','categories.id','=','products.categories_id')
        ->join('suppliers','suppliers.id','=','products.suppliers_id')
        ->where('products.name', 'LIKE', "%$name%")->get();
        return view('admin.searchproduct',compact('search'));
}


    
}

