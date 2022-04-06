<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\Products;
use App\Models\Shipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class shipmentscontroller extends Controller
{

    public function Shipment()
    {
        $ships = DB::table('shipments')->select('shipments.id as shipId', 'shipment_items as shipName', 'admins.name as adminName', 'suppliers.name as supName', 'total', 'statue', 'safes.name as safeName')
            ->join('admins', 'admins.id', '=', 'shipments.admin_id')
            ->join('suppliers', 'suppliers.id', '=', 'shipments.supplier_id')
            ->join('safes', 'safes.id', '=', 'shipments.safes_id')
            ->orderBy('shipments.id','desc')->get();
        return view('admin/shipments', compact('ships'));
    }
    public function showshipment($id)
    {
        $shipId = DB::table('shipments')->select('shipments.id')->where('shipments.id','=',$id)->first();
        $ships = DB::table('shipments_items')->select(DB::raw('(quantity * price_per_one) as total'),'shipments_items.id as itemId',"shipments.statue",'products.name as prodName','products.stock','products.priceIn as price','products.img')
        ->join('products','products.id','=','shipments_items.products_id')
        ->join('shipments','shipments.id','shipments_items.shipments_id')
        ->where('shipments_items.shipments_id', '=', $id)->get();
        $shipstatue = DB::table('shipments')->select('shipments.statue')->where('shipments.id','=',$id)->first();
        //dd($ships);
        return view('admin.showshipment',compact('ships','shipId','shipstatue'));
    }
    public function addshipment()
    {
        $suppliers = DB::table('suppliers')->select()->get();
        $safes = DB::table('safes')->select()->get();
        return view('admin/addshipment', compact('suppliers', 'safes'));
    }

    public function storeshipment(Request $req)
    {
        $req->validate(['name' => 'required', 'supplier' => "required", 'safes' => "required"]);
        $id = DB::table('shipments')
        ->insertGetId(['shipment_items' => $_POST['name'], 'admin_id' => Auth::guard('admin')->id(), 'supplier_id' => $_POST['supplier'], 'safes_id' => $_POST['safes']]);
        Session::flash("storesuccess", "Shipment added");
        return view('admin.select_shipment_kind', ['shipment_id' => $id]);
    }

    public function searchshipment(Request $req){
        $name  = $req->search;
        $search = DB::table('shipments')->select('shipments.id as shipId', 'shipment_items as shipName', 'admins.name as adminName', 'suppliers.name as supName', 'total', 'statue', 'safes.name as safeName')
        ->join('admins', 'admins.id', '=', 'shipments.admin_id')
        ->join('suppliers', 'suppliers.id', '=', 'shipments.supplier_id')
        ->join('safes', 'safes.id', '=', 'shipments.safes_id')
        ->where('shipments.shipment_items', 'LIKE', "%$name%")->get();
        return view('admin/searchshipment',compact('search'));   
    }
    public function addproduct(Request $req)
    {
        $shipment_id = $req->shipment_id;
        $cats = DB::table("categories")->select('categories.name', 'categories.id')->get();
        //$sups = DB::table('suppliers')->select('suppliers.name', 'suppliers.id')->get();
        return view('admin/addproduct_shipment', compact('cats','shipment_id'));
    }
    public function storeproduct_ship(Request $req)
    {
        $shipment_id = $req->ship;
        $supName = DB::table('shipments')->select('shipments.supplier_id')->where('id','=',$shipment_id)->first();
        $images = $req->file('images');
        // validation //
        $req->validate([
            'name' => "required", 'desc' => "required",
            'priceIn' => "required|numeric", 'priceOut' => "required|numeric"
        ]);
        // // create Product //
        $product = new Products();
        $product->name = $req->name;
        $product->description = $req->desc;
        $product->priceIn = $req->priceIn;
        $product->priceOut = $req->priceOut;
        $product->categories_id = $req->category;
        $product->suppliers_id = $supName->supplier_id;
        //$product->stock = $req->stock;
        $product->img = 'no-image';
        $product->save();
        //   //////////////////////////////////////////////////////////
        // store the images names in the database and store the images in the public folder
        for ($i = 0; $i < count($images); $i++) {
            $image = $images[$i];
            $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
            $img = new images();
            $img->img = $imageName;
            $img->product_id = $product->id;
            $img->save();
            $image->move(public_path('/uploads'), $imageName);
            if ($i == 0) {
                $product->img = $imageName;
                $product->save();
            }
        }

       // dd($shipment_id);
        Session::flash("success", "Product Added");
        return redirect("admin/makeshipment?shipment_id=$shipment_id");
    }
    public function makeshipment(Request $req)
    {
        $shipment_id = $req->shipment_id;
        $total = 0;
        $shiptotal =DB::table('shipments_items')->select('quantity','price_per_one')->where('shipments_id','=',$shipment_id)->get();
        foreach($shiptotal as $ship){
            $total += $ship->quantity * $ship->price_per_one;
        }
        $supsid = DB::table('shipments')->select('shipments.supplier_id')->where('shipments.id','=',$shipment_id)->first();
        if(! $shipment_id) abort(404);
        $products = DB::table('products')->select('products.id as prodId', 'stock', 'products.name as prodName', 'products.description', 'products.priceOut as priceout', 'products.priceIn as pricein', 'products.img', 'products.created_at', 'categories.name as catName', 'suppliers.name as supName')
            ->join('categories', 'categories.id', '=', 'products.categories_id')
            ->join('suppliers', 'products.suppliers_id', '=', 'suppliers.id')->where('products.suppliers_id','=',$supsid->supplier_id)->orderBy('products.id', 'desc')->get();        
        $shipmentName =DB::table('shipments')->select('shipments.shipment_items')->where('shipments.id','=',$shipment_id)->first();
        DB::table('shipments')->where('shipments.id','=',$shipment_id)->update(['shipments.total'=>$total]);
        $safemoney = DB::table('safes')->select('safes.amount')->join('shipments','safes.id','=','shipments.safes_id')->where('shipments.id','=',$shipment_id)->first() ;       
        return view('admin.makeshipment',compact('products','shipmentName','shipment_id','total','safemoney'));
    }
    public function selectshipment(Request $req ,$id){
        $shipment_id = $req->shipment_id;
        $prodnum = DB::table('products')->select('products.id','products.stock','products.priceIn')->where('products.id','=',$id)->first();
        return view('admin.selectproduct',compact('prodnum','shipment_id'));
    }
    public function store_selected_shipment(Request $req){
        $shipment_id = $req->shipment_id;
        if($shipment_id== ''){ return redirect('admin/shipments');}
            $req->validate(['stock'=>'required|numeric','priceIn'=>'required|numeric']);
            DB::table('shipments_items')->insert(['shipments_id' => $_POST['shipment_id'],'products_id' => $_POST['prodId'],'quantity' => $_POST['stock'], 'price_per_one' => $_POST['priceIn']]);
            DB::table('products')->where('id',$_POST['prodId'])->increment('products.stock',$_POST['stock']);
            Session::flash("success", "Product added to Cart");
            return redirect("admin/makeshipment?shipment_id=$shipment_id");
    }
    public function approveshipment(Request $req){
        $shipment_id = $req->shipment_id;
        $safe = DB::table('shipments')->select('safes.amount')
        ->join('safes','safes.id','=','shipments.safes_id')
        ->where('shipments.id','=',$shipment_id)->first();
        $totalshipment = DB::table('shipments')->select('total')->where('id','=',$shipment_id)->first();

        if($totalshipment->total >= ($safe->amount-1000)){
            Session::flash("storesuccess", "Not Enough Padget!!!!");
            return redirect('admin/shipments');  
        }
        else{
            DB::table('shipments')->where('shipments.id',$shipment_id)->update(['statue'=>'Approve']);
            DB::table('shipments')->where('shipments.id',$shipment_id)
            ->join('safes','safes.id','=','shipments.safes_id')
            ->decrement('safes.amount',$totalshipment->total);
            Session::flash("storesuccess", "Shipment Submited");
            return redirect('admin/shipments');
        }
        
    }

    public function deleteshipment($id){
        DB::table('shipments')->delete($id);
        Session::flash("storesuccess", "Shipment Deleted");
        return redirect('admin/shipments');
    }
    public function deleteshipment_item(Request $req,$id){
        DB::table('shipments_items')->delete($id);
        Session::flash("storesuccess", "Item Deleted");
        return redirect()->back();
    }

    public function editshipment($id){
        $shipment = DB::table('shipments')->select()->where('shipments.id',$id)->first();
        $safes = DB::table('safes')->select()->get();
        $suppliers = DB::table('suppliers')->select()->get();
        return view('admin.editshipment',compact('shipment','safes','suppliers'));
    }
    
    public function updateshipment(Request $req){
        $req->validate(['name'=>"required",]);
        DB::table('shipments')->where('id',$_POST['id'])->update([
            "shipment_items" => $_POST['name'],'safes_id'=>$_POST['safes'],'supplier_id'=>$_POST['supplier'],'admin_id'=>Auth::guard('admin')->id()]);
        Session::flash("storesuccess","Shipments updated");
        return redirect("admin/shipments");
    
    }

}
