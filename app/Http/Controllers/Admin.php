<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthAdmin;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Empty_;

use function PHPUnit\Framework\isEmpty;

class Admin extends Controller
{
    //
    public function index(){
        //dd(Auth::guard('admin')->id());
        $total=0;
        $totalsafe = DB::table('safes')->select('safes.amount')->get();
        foreach($totalsafe as $t){
            $total += $t->amount;
        }
        $prod = DB::table('products')->count();
        $cats =DB::table('categories')->count();
        $safe = DB::table('safes')->count(); 
        $admin =DB::table('admins')->count();
        $order = DB::table('orders')->count();
        $shipment =DB::table('shipments')->count();
        $supplier =DB::table('suppliers')->count();
        $user =DB::table('users')->count();
        $com =DB::table('complainments')->count();
        return view('admin/index',compact('prod','cats','safe','admin','order','shipment','supplier','user','com','total'));
    }
    public function categories(){
        $cats =DB::table('categories')->select()->orderBy('categories.id','desc')->get();
        return view('admin/categories',compact('cats'));
    }
    public function addcategory(){
        return view('admin/addcategory');
    }
    public function storecategory(Request $req){
        $req->validate(['name'=>'required']);
        DB::table('categories')->insert(['name'=>$_POST['name']]);
        Session::flash("success","category added");
        return redirect("admin/categories");
    }
    public function editcategory($id){
        $data =DB::table('categories')->where('id',$id)->first();
        return view('admin/editcategory',compact('data'));
    }
    public function updatecategory(Request $request){
        $request->validate(['name'=>"required"]);
        DB::table('categories')->where('id',$_POST['id'])->update([
            "name" => $_POST['name']]);
        Session::flash("success","category updated");
        return redirect("admin/categories");
    
    }

    public function searchcategory(Request $req){
        $name  = $req->search;
        $search = DB::table("categories")
        ->select()->where('categories.name', 'LIKE', "%$name%")->get();
        return view('admin/searchcategory',compact('search'));
    }


    // public function autocompleteSearch(Request $request)
    // {
    //       $query = $request->search;
    //       $filterResult = DB::table('categories')->where('name', 'LIKE', '%'. $query. '%')->get();
    //       return response()->json($filterResult);
    // } 

    // suppliers//
    public function suppliers(){
        $sups =DB::table('suppliers')->select()->get();   
         //dd($sups);
        return view('admin/suppliers',compact('sups'));
    }
    public function searchsupplier(Request $req){
        $name  = $req->search;
        $search = DB::table("suppliers")
        ->select()->where('suppliers.name', 'LIKE', "%$name%")->get();
        return view('admin/searchsupplier',compact('search'));
    }
    
    public function addsupplier(){
        return view('admin/addsupplier');
    }
    public function storesupplier(Request $req){
        $req->validate(['name'=>'required']);
        DB::table('suppliers')->insert(['name'=>$_POST['name']]);
        Session::flash("success","Supplier added");
        return redirect("admin/suppliers");
    }

    public function editsupplier($id){
        $data =DB::table('suppliers')->where('id',$id)->first();
        return view('admin/editsupplier',compact('data'));
    }
    public function updatesupplier(Request $request){
        $request->validate(['name'=>"required"]);
        DB::table('suppliers')->where('id',$_POST['id'])->update([
            "name" => $_POST['name']]);
        Session::flash("success","Supplier updated");
        return redirect("admin/suppliers");
    
    }
    public function showsupplier($id){
        $ships = DB::table('products')->select()->where('products.suppliers_id','=',$id)->get();
        $sups =DB::table('suppliers')->select()->orderBy('suppliers.id','desc')->get();   
        dd($ships);
        //return view("admin/showsupplier",compact('ships'));
        
    }
    public function search_supplier(Request $request)
    {
          $query = $request->search;
          $filterResult = DB::table('suppliers')->where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 

    //complements//

    public function complements(){
        $comps =DB::table('complainments')->select('complainments.id','complainments.created_at','users.email','users.name','complainments.message')->join('users','users.id','=','complainments.user_id')->get();
        return view('admin.complements',compact('comps'));
        //dd($comps);
    }


    //safes//
    public function safes(){
        $total=0;
        $totalsafe = DB::table('safes')->select('safes.amount')->get();
        foreach($totalsafe as $t){
            $total += $t->amount;
        }
        $safes = DB::table('safes')->select()->get();
        return view('admin.safes',compact('safes','total'));
    }

    public function searchsafe(Request $req){
        $name  = $req->search;
        $total=0;
        $totalsafe = DB::table('safes')->select('safes.amount')->get();
        foreach($totalsafe as $t){
            $total += $t->amount;
        }
        $safes = DB::table('safes')->select()->where('safes.name', 'LIKE', "%$name%")->get();
        return view('admin/searchsafe',compact('safes','total'));
    }
    public function addsafe(){
        return view('admin.addsafe');
    }

    public function storesafe(Request $req){
        $req->validate(['name'=>'required','amount'=>'required|numeric']);
        DB::table('safes')->insert(['name'=>$_POST['name'],'amount'=>$_POST['amount']]);
        Session::flash("success","safes added");
        return redirect("admin/safes");   
    }

    //cios//

    public function makecio(){
        $safes = DB::table('safes')->select()->get();
        return view('admin/makecio',compact('safes'));
    } 
    public function storecio(Request $req){
        $req->validate(['amount'=>'required|numeric']);
        DB::table('cios')->insert(['safe_id'=>$_POST['safe']
        ,'amount'=>$_POST['amount'],'admin_id'=>Auth::guard('admin')->id()]);
        DB::table('safes')->where('id','=',$_POST['safe'])->increment('safes.amount',$_POST['amount']);
        Session::flash("success","Cio Done");
        return redirect("admin/safes");   
    }

    //admin//
    public function showadmin(){
        $admins = DB::table('admins')->select()->get();
        return view('admin.showadmin',compact('admins'));
    }
    public function addadmin(){
        return view('admin.addadmin');
    }

    public function storeadmin(Request $req){
        $req->validate(['name'=>'required','email'=>'required|email','password'=>'required','img'=>'required']);
        $admin = new Admins();
        $admin->name = $req->name;
        $admin->email =$req->email;
        $admin->password = Hash::make($req->password);
        $admin->save();
        $imageName = time().'.'.$req->img->getClientOriginalExtension();  
        $req->img->move(public_path('adminuploads'), $imageName);
        $admin->img =$imageName;
        $admin->save();
        Session::flash("success","Admin added");
        return redirect("admin/showadmin");

    }

    public function showorders(){
        $orders = DB::table("orders")->select()->get();
        return view("admin/showorders",compact("orders"));
    } 
    public function searchorders(Request $req){
        $name  = $req->search;
        $orders = DB::table("orders")->select()->where('orders.name', 'LIKE', "%$name%")->get();
        return view('admin/searchorder',compact('orders'));
    }
    public function showorderdetails($id){
        $total=0;
        $order = DB::table('orders')->select()->where('id','=',$id)->first();
        $order_details =DB::table('orders_details')->select('products.name as prodName','products.priceOut as prodPrice','stock')
        ->join('products','products.id','=','orders_details.product_id')
        ->join('orders','orders.id','=','orders_details.order_id')
        ->where('order_id','=',$id)->get();
        $totals =  DB::table('orders_details')->select('orders_details.quantity','products.priceOut')
        ->join('products','products.id','=','orders_details.product_id')
        ->where('order_id','=',$id)->get();
        foreach($totals as $t){
            $total+= $t->priceOut * $t->quantity;
        }
        return view('admin/showorderdetails',compact('order','order_details','total'));
    }

    public function showusers(){
        $users = DB::table('users')->select()->get();
        return view('admin/showusers',compact('users'));
    }

    public function searchuser(Request $req){
        $name  = $req->search;
        $users = DB::table('users')->select()->where('name', 'LIKE', "%$name%")->get();
        return view('admin/showusers',compact('users'));
   
    }
    public function approve($id){
        DB::table('orders')->where('id','=',$id)->update(['statue'=>'approve']);
        Session::flash('success','Order Approved');
        return redirect('admin/showorders');
    }
    public function cencel($id){
        DB::table('orders')->delete($id);
        Session::flash('success','Order Deleted');
        return redirect('admin/showorders');
    }
}
