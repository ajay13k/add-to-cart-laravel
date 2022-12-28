<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class User_Controller extends Controller
{
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('user', $user);
            if ($request->session()->get('user')['role'] == 1) {
                return redirect('/admin/producttable');

            } else {
                return redirect('/product');

            }
        } else {

            return "username or password is not matched";
        }
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function createregister(Request $request)
    {

        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/');
        // $user = User::where(['email' => $request->email])->first();
        // if ($user && Hash::check($request->password, $user->password)) {
        //     $request->session()->put('user', $user);
        //     return redirect('/product');

        // } else {

        //     return "username or password is not matched";
        // }

    }

    public function logout(Request $request)
    {
        session()->forget('user');
        $request->session()->flush('message', "Logout Successfully");
        return redirect('/');

    }
}
