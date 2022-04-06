<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\orders_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //
    public function checkOut(Request $req)
    {
       $validated = $req->validate([
           'address' => 'required',
           'phone' => 'required|numeric'
       ]);
       $address = $validated['address'];
       $phone = $validated['phone'];
       $safes_id = $_POST['safes']; 
       $user = Auth::user();
       // make a new order
       $order = new orders();
       $order->name = $user->name;
       $order->email = $user->email;
       $order->address = $address;
       $order->phone = $phone;
       $order->safes_id = $safes_id;
       $order->save();

       $cart_items = $user->cart_items;
 //      dd($cart_items);
       // make order details
       //$totalbenefit =0;
    //    $totalbenefit = DB::table('products')->select(DB::raw('products.priceIn - products.priceOut as tot'))->where('products.id','=', 37)->first(); 
    //    dd($totalbenefit->tot);   
        foreach ($cart_items as $item) {
           $totalbenefit = DB::table('products')->select(DB::raw(' products.priceOut - products.priceIn as tot'))->where('products.id','=', $item->products_id)->first(); 
           DB::table('safes')->where('safes.id','=',$safes_id )->increment('safes.amount',$totalbenefit->tot);
           // make an order detail
           $order_detail =new orders_details();
           $order_detail->quantity = $item->quantity;
           $order_detail->product_id = $item->products_id;
           $order_detail->order_id = $order->id;
           $order_detail->user_id =Auth::id();
           
           $order_detail->save();
           DB::table('products')->where('products.id','=',$item->products_id)->decrement('products.stock',$item->quantity);
           // delete cart item
           $item->delete();
        }
        // dd($totalbenefit);
       Session::flash("success","Order Done");
       return redirect('/user/index');
   }
   
    
}
