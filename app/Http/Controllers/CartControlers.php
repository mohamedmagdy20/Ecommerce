<?php

namespace App\Http\Controllers;

use App\Models\cart_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartControlers extends Controller
{
    //
    public function addcart(Request $request){
        //$userid = Auth::user();
         $id = Auth::id();
         $cart = new cart_items();
         $cart->products_id = $request->id;
         $cart->user_id = $id;
         $cart->quantity = $request->qty;
         $cart->save();
         Session::flash("success","Cart Added");        
         return redirect('user/cart');
     }
     public function showCart(){
        $total=0;
        $carttotal = DB::table('cart_items')->select('cart_items.quantity','products.priceOut') 
        ->join('products','products.id','=','cart_items.products_id')->where('cart_items.user_id','=',Auth::id())->get();
        foreach($carttotal as $t){
            $total+= $t->priceOut * $t->quantity;
        }
        $safes = DB::table('safes')->select()->get();
        $cats = DB::table("categories")->select('categories.id as catId','categories.name as catName')->get();     
        $carts =DB::table('cart_items')->select('cart_items.id as cartId','cart_items.user_id','products.name as prodName','products.priceOut','products.img as prodImg','cart_items.quantity',)
        ->join('products','products.id','=','cart_items.products_id')->where('cart_items.user_id','=',Auth::id())->get();
        $cartcount = DB::table('cart_items')->select(DB::raw('COUNT(cart_items.id) as count'))->where('cart_items.user_id','=',Auth::id())->first();
  
        return view('user.cart' , ['carts' => $carts,'cats'=>$cats,'total'=>$total,'cartcount'=>$cartcount,'safes'=>$safes]);
    }
    public function deleteCart($id){
        DB::table('cart_items')->delete($id);
        Session::flash("success","Cart Deleted"); 
        return redirect('user/cart');
    }
}
