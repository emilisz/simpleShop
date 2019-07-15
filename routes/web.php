<?php
use App\Product;
use App\Tax;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::post('/rating', function (Request $request) {

  $product = Product::find($request->id);

    $rating = new willvincent\Rateable\Rating;
    $rating->rating = $request->rating;
    $check = $product->ratings()->save($rating);


      return response()->json(['success'=>'Rating is successfully added']);
        // request()->validate([
        // 'name' => 'required',
        // 'email' => 'required|email|unique:users',
        // 'mobile_number' => 'required|unique:users'
        // ]);
         
        // $data = $request->all();
        // $product = Product::find($request->id);

   //  $rating = new willvincent\Rateable\Rating;
   //  $rating->rating = $request->rating;
   //  $rating->user_id = 2;


   // $check = $product->ratings()->save($rating);
   //      // $check = Contact::insert($data);
   //      $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
   //      if($check){ 
   //      $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
   //      }
   //      return Response()->json($arr);



    // dd($request->all());
    // $product = Product::find($request->id);

    // $rating = new willvincent\Rateable\Rating;
    // $rating->rating = $request->rating;
    // $rating->user_id = 2;


    // $product->ratings()->save($rating);

    // return redirect()->back();
});

Route::get('/admin', function () {
    $allProducts = Product::all();
    $tax = Tax::first();
    return view('admin.index', compact('allProducts','tax'));
})->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('products', 'ProductController');
Route::resource('taxes', 'TaxController');

Route::delete('products/{id}', ['as'=>'products.destroy','uses'=>'ProductController@destroy']);

Route::delete('delete-multiple-products', ['as'=>'products.multiple-delete','uses'=>'ProductController@deleteMultiple']);


Route::get('/logout', 'Auth\LoginController@logout');
