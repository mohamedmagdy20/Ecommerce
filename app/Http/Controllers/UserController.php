<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(Request $request){
        //dd(Auth::id());
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName','products.img as catImg')
        ->join('products','categories.id','=','products.categories_id')
        ->groupBy('categories.id')->get();
        $newprods = DB::table('products')->orderBy('products.created_at','desc')->take(6)->get();
        return view('user/index',compact("cats","newprods"));
    }

    public function choosecategory(){
        //$cartcount = DB::table('cart_items')->select(DB::raw('COUNT(cart_items.id) as count'))->where('cart_items.user_id','=',Auth::id())->first();
        //dd($cartcount);
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName','products.img as catImg')
        ->join('products','categories.id','=','products.categories_id')
        ->groupBy('categories.id')->get();
        return view('layout/user-layout',compact('cats'));
    }

    public function category($id){
        $prods = DB::table('products')->select("products.name as prodName","categories.name as catName","products.img as prodImg","priceOut","products.id as prodId")->join('categories',"categories.id","=","products.categories_id")->where("categories_id","=",$id)->orderBy('products.id','desc')->paginate(3);
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName')->get();
        return view('user/category',compact("prods","cats"));
    }

    public function showproducts(){
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName','products.img as catImg')
        ->join('products','categories.id','=','products.categories_id')
        ->groupBy('categories.id')->get();
        $products = DB::table('products')->select("products.name as prodName","suppliers.name as supname","categories.name as catName","products.img as prodImg","priceOut","products.id as prodId")
        ->join("categories","products.categories_id",'=',"categories.id")
        ->join('suppliers','suppliers.id','=','products.suppliers_id')
        ->orderBy('products.id','desc')
        ->paginate(9);
        return view("user.showproducts",compact("products","cats"));
    }

    public function pricebetween(){
        $prods = DB::table('products')->select("products.name as prodName","categories.name as catName","products.img as prodImg","priceOut","products.id as prodId")
        ->join('categories','categories.id','=','products.categories_id')
        ->whereBetween('priceOut',[$_POST['from'],$_POST['to']])->get(); 
        //dd($prods);
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName')->get();
        return view('user/pricebetween',compact('prods','cats'));     
    }

    public function product($id){
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName')->get();
        $product = DB::table("products")->select("products.stock","products.id as prodId","products.name as prodName","categories.name as catName","description","priceOut","products.img as prodImg")
        ->join("categories","categories.id","=","products.categories_id")->where("products.id","=",$id)->first();
        $imgs = DB::table("images")->select("images.img")->where("images.product_id","=",$id)->get();
        //dd($product,$imgs);
        return view("user/product",compact("product","imgs","cats"));
    }

    public function profile(){
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName')->get();
        $profile = DB::table('users')->select()->where('id','=',Auth::id())->first();
        $orders = DB::table('orders_details')->select('products.name as prodName','products.priceOut','products.img','orders.address','orders.phone','orders.created_at')
        ->join('orders','orders.id','=','orders_details.order_id')
        ->join('products','products.id','=','orders_details.product_id')->where('orders_details.user_id',Auth::id())->get();
        return view('user/profile',compact('profile','cats','orders'));
    }

    public function searchproduct(Request $req){
        $name  = $req->search;
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName')->get();
        $search = DB::table("products")->select("products.id","products.name as prodName","priceOut","products.img as prodImg" ,"stock" ,"products.created_at","description" ,"categories.name as catName")->join('categories','categories.id','=','products.categories_id')
        ->where('products.name', 'LIKE', "%$name%")->get();
        return view('user.Search',compact('cats','search'));
    }

    public function adduser()
    {
        return view("adduser");
    }

    public function storeuser(Request $request){
        $request->validate(['name'=>"required",
        'email'=>"required|email",
        'pass'=>"required",
        'image'=>"image|mimes:jpeg,png,jpg,gif,svg|max:2048"
    ]); 
        $user =new User();
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->pass);
        $user->img = "1.jpg";
        $user->save();
        $imageName = time().'.'.$request->images->getClientOriginalExtension();  
        $request->images->move(public_path('images-users'), $imageName);
        $user->img =$imageName;
        $user->save();
        return redirect("user/index");
    }

    public function storecomplements(Request $req){
        $req->validate(['com'=>'required']); 
        DB::table('complainments')->insert(['message'=>$_POST['com'],'user_id'=>Auth::id()]);
        Session::flash('success','Note Added');
        redirect('user/index');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('userlogin');
    }
}
