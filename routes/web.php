<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('user/index');
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    route::get('index', [\App\Http\Controllers\Admin::class, 'index']);
    route::get('categories', [\App\Http\Controllers\Admin::class, 'categories']);
    route::get('addcategory', [\App\Http\Controllers\Admin::class, 'addcategory']);
    route::post('storecategory', [\App\Http\Controllers\Admin::class, 'storecategory']);
    route::get('editcategory/{id}', [\App\Http\Controllers\Admin::class, 'editcategory']);
    route::post('updatecategory', [\App\Http\Controllers\Admin::class, 'updatecategory']);
    route::post('search_category', [\App\Http\Controllers\Admin::class, 'autocompleteSearch']);
    route::get('suppliers', [\App\Http\Controllers\Admin::class, 'suppliers']);
    route::get('addsupplier', [\App\Http\Controllers\Admin::class, 'addsupplier']);
    route::post('storesupplier', [\App\Http\Controllers\Admin::class, 'storesupplier']);
    route::get('editsupplier/{id}', [\App\Http\Controllers\Admin::class, 'editsupplier']);
    route::post('updatesupplier', [\App\Http\Controllers\Admin::class, 'updatesupplier']);
    route::post('search_supplier', [\App\Http\Controllers\Admin::class, 'Search_supplier']);
    route::get('products', [\App\Http\Controllers\ProductController::class, 'products']);
    route::get('addproduct', [\App\Http\Controllers\ProductController::class, 'addproduct']);
    route::post('storeproduct', [\App\Http\Controllers\ProductController::class, 'storeproduct']);
    route::get('deleteproduct/{id}', [\App\Http\Controllers\ProductController::class, 'deleteproduct']);
    route::get('editproduct/{id}', [\App\Http\Controllers\ProductController::class, 'editproduct']);
    route::get('shipments', [\App\Http\Controllers\shipmentscontroller::class, 'Shipment']);
    route::get('showshipment/{id}', [\App\Http\Controllers\shipmentscontroller::class, 'showshipment']);
    route::get('addshipment', [\App\Http\Controllers\shipmentscontroller::class, 'addshipment']);
    route::post('storeshipment', [\App\Http\Controllers\shipmentscontroller::class, 'storeshipment']);
    route::get('addproduct_shipment', [\App\Http\Controllers\shipmentscontroller::class, 'addproduct']);
    route::post('storeproduct_ship', [\App\Http\Controllers\shipmentscontroller::class, 'storeproduct_ship']);
    route::get('makeshipment', [\App\Http\Controllers\shipmentscontroller::class, 'makeshipment']);
    route::get('selectproduct/{id}', [\App\Http\Controllers\shipmentscontroller::class, 'selectshipment']);
    route::post('store_selected_shipment', [\App\Http\Controllers\shipmentscontroller::class, 'store_selected_shipment']);
    route::get('approveshipment', [\App\Http\Controllers\shipmentscontroller::class, "approveshipment"]);
    route::get('showshipment', [\App\Http\Controllers\shipmentscontroller::class, "showshipment"]);
    route::get('deleteshipment_item/{id}', [\App\Http\Controllers\shipmentscontroller::class, 'deleteshipment_item']);
    route::get('showsupplier/{id}', [\App\Http\Controllers\Admin::class, "showsupplier"]);
    route::get('complements', [\App\Http\Controllers\Admin::class, 'complements']);
    route::get('safes', [\App\Http\Controllers\Admin::class, 'safes']);
    route::get('addsafe', [\App\Http\Controllers\Admin::class, 'addsafe']);
    route::post('storesafe', [\App\Http\Controllers\Admin::class, 'storesafe']);
    route::get('makecio', [\App\Http\Controllers\Admin::class, 'makecio']);
    route::post('storecio', [\App\Http\Controllers\Admin::class, 'storecio']);
    route::get("logout", [\App\Http\Controllers\Auth_Admin::class, "logout"]);
    route::get('shortageproduct', [\App\Http\Controllers\ProductController::class, 'shortageproduct']);
    route::get('showadmin', [\App\Http\Controllers\Admin::class, 'showadmin']);
    route::get('addadmin', [\App\Http\Controllers\Admin::class, 'addadmin']);
    route::post('storeadmin', [\App\Http\Controllers\Admin::class, 'storeadmin']);
    route::get('deleteshipment/{id}', [\App\Http\Controllers\shipmentscontroller::class, 'deleteshipment']);
    route::get('editshipment/{id}', [\App\Http\Controllers\shipmentscontroller::class, 'editshipment']);
    route::post('updateshipment', [\App\Http\Controllers\shipmentscontroller::class, 'updateshipment']);
    route::post('searchcategory', [\App\Http\Controllers\Admin::class, "searchcategory"]);
    route::post('searchproduct', [\App\Http\Controllers\ProductController::class, "searchproduct"]);
    route::post('searchsupplier', [\App\Http\Controllers\Admin::class, "searchsupplier"]);
    route::post('searchshipment', [\App\Http\Controllers\shipmentscontroller::class, "searchshipment"]);
    route::post('searchsafe', [\App\Http\Controllers\Admin::class, "searchsafe"]);
    route::get('showorders', [\App\Http\Controllers\Admin::class, 'showorders']);
    route::post('searchorders', [\App\Http\Controllers\Admin::class, "searchorders"]);
    route::get('showorderdetails/{id}', [\App\Http\Controllers\Admin::class, 'showorderdetails']);
    route::get('approve/{id}', [\App\Http\Controllers\Admin::class, 'approve']);
    route::get('cencel/{id}', [\App\Http\Controllers\Admin::class, 'cencel']);
    route::get('showusers', [\App\Http\Controllers\Admin::class, 'showusers']);
    route::get('deleteuser/{id}', [\App\Http\Controllers\Admin::class, 'deleteuser']);
    route::post('searchuser', [\App\Http\Controllers\Admin::class, "searchuser"]);
});
route::get("adminlogin", [\App\Http\Controllers\Auth_Admin::class, 'login']);
route::post("loginrequest", [\App\Http\Controllers\Auth_Admin::class, 'loginrequest']);

Route::prefix('user')->group(function () {
    route::get("index", [\App\Http\Controllers\UserController::class, "index"]);
    route::get("showproducts", [\App\Http\Controllers\UserController::class, "showproducts"]);
    route::get("category/{id}", [\App\Http\Controllers\UserController::class, "category"]);
    route::get("product/{id}", [\App\Http\Controllers\UserController::class, "product"]);
    route::post('pricebetween', [\App\Http\Controllers\UserController::class, "pricebetween"]);
    route::post("addcart", [\App\Http\Controllers\CartControlers::class, "addcart"]);
    route::get('cart', [\App\Http\Controllers\CartControlers::class, "showCart"])->middleware('auth');
    route::get('profile', [\App\Http\Controllers\UserController::class, "profile"]);
    route::get('deletecart/{id}', [\App\Http\Controllers\CartControlers::class, "deletecart"]);
    route::get('logout', [\App\Http\Controllers\UserController::class, 'logout']);
    route::post('checkout', [\App\Http\Controllers\OrderController::class, 'checkOut']);
    route::post('Search', [\App\Http\Controllers\UserController::class, "searchproduct"]);
    route::post('storecomplements', [\App\Http\Controllers\UserController::class, "storecomplements"]);
});
route::get("adduser", [\App\Http\Controllers\UserController::class, 'adduser']);
route::post("storeusers", [\App\Http\Controllers\UserController::class, "storeuser"]);

route::get('userlogin', [\App\Http\Controllers\User_Auth::class, 'userlogin']);
route::post('userrequest', [\App\Http\Controllers\User_Auth::class, "userrequest"]);
route::get("layout/user-layout", [\App\Http\Controllers\UserController::class, "choosecategory"]);

route::get('/create-cashe', function () {
    return Cache::put('code', 5468, 60);
});

route::get('/download', function () {
    // return Cache::get('code');

    $fileName = 'users.csv';
    $users = User::all();

    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $columns = array('id', 'name', 'email');

    $callback = function () use ($users, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($users as $user) {
            $row['id']  = $user->id;
            $row['name']    = $user->name;
            $row['email']    = $user->email;

            fputcsv($file, array($row['id'], $row['name'], $row['email']));
        }

        fclose($file);
    };
    return response()->stream($callback, 200, $headers);


    // return response()->streamDownload(function () use ($callback) {
    // echo $callback;
    // }, $fileName);
});
