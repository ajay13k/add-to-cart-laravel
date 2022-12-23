<?php
namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\FlareClient\View;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = product::all();
        return view('producttable', $result);
    }

    public function addproduct()
    {

        return view('addproduct');
    }
    public function createproduct(Request $request)
    {
        $product = new product();
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->category = $request->post('category');
        $image = $request->file('image');
        $ext = $image->extension();
        $image_name = time() . '.' . $ext;
        $image->storeAs('/public/media', $image_name);
        $product->image = $image_name;
        $product->discription = $request->post('discription');
        $product->save();
        return redirect('/producttable');

    }

    public function deleteproduct($id)
    {
        product::destroy($id);
        return redirect('/producttable');

    }

    public function updateproduct($id)
    {
        $result['data'] = product::find($id);
        return View('editproduct', $result);


    }

    public function editproduct(Request $request)
    {
        $data = product::find($request->id);

        $data->name = $request->name;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->discription = $request->discription;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media', $image_name);
            $data->image = $image_name;


        }


        // $data->image = $request->image;
        $data->save();
        $request->session()->flush('message', "product update successfully");
        return redirect('/producttable');

    }


    public function product()
    {
        $result['product'] = product::all();
        return view('product', $result);
    }

    public function detail($id)
    {
        $result['product'] = product::find($id);
        return view('detail', $result);

    }
    public function search(Request $request)
    {
        $result['product'] = product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('/search', $result);
    }

    public function cart(Request $request)
    {

        if ($request->session()->has('user')) {
            $cart = new cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/product');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function cartList(Request $request)
    {

        $userId = Session::get('user')['id'];
        $result['product'] = DB::table('carts')->join('products', 'carts.product_id', 'products.id')
            ->select('products.*', 'carts.id as cart_id')->where('carts.user_id', $userId)->get();

        return View('cartlist', $result);

    }

    public function cartremove($id)
    {
        // $result=   product::find($id);
        // $result->delete();
        cart::destroy($id);
        return redirect('/cartList');

    }

    public function order()
    {

        $userId = Session::get('user')['id'];
        $result['product'] = DB::table('carts')->join('products', 'carts.product_id', 'products.id')
            ->where('carts.user_id', $userId)->sum('products.price');

        return View('order', $result);

    }

    public function orderplace(Request $request)
    {
        $userId = Session::get('user')['id'];

        $allcart = cart::where('user_id', $userId)->get();
        foreach ($allcart as $cart) {
            $order = new order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $request->post('address');
            $order->status = 'pending';
            $order->payment_method = $request->post('payment');
            $order->payment_status = 'pending';
            $order->save();
        }
        cart::where('user_id', $userId)->delete();
        return redirect('/product');

    }





}
