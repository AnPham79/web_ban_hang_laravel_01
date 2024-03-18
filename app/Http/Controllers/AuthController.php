<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('Auth.login');
    }

    public function process_login(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();

            if (Hash::check($request->get('password'), $user->password)) {
                session()->put('id', $user->id);
                session()->put('name', $user->name);
                session()->put('avartar', $user->avatar);
                session()->put('email', $user->email);
                session()->put('password', $user->password);
                session()->put('phone', $user->phone);
                session()->put('address', $user->address);
                session()->put('role', $user->role);

                if (session()->get('role') == 2 || session()->get('role') == 3) {
                    return redirect()->route('Product.index');
                } else {
                    return redirect()->route('index');
                }
                
            } else {
                return redirect()->route('login')->with('loginError', 'Email hoặc mật khẩu không trùng khớp');
            }
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('loginError', 'Email hoặc mật khẩu không trùng khớp');
        }
    }

    public function register() {

    }

    public function process_register() {

    }
    
    public function logout()
    {
        session()->flush();

        return redirect()->route('index');
    }
}
