<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankForRegister;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function process_login(loginRequest $request)
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
                return redirect()->route('login')->withErrors(['error' => 'Email hoặc mật khẩu không trùng khớp']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors(['error' => 'Email hoặc mật khẩu không trùng khớp']);
        }
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function process_register(UserRequest $request)
    {
        $data = new User;
        // // $data->password = Hash::make($request->password);
        // sử dụng cái này để mã hóa pass thây vì hash
        $data->fill($request->except('_token'));
        $data->password = bcrypt($request->password);

        Mail::to($request->email)->send(new ThankForRegister($request->name));
        $data->save();

        return redirect()->route('login');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('index');
    }
}
