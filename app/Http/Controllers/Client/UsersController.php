<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('Client.Users.login');
        } else if ($request->isMethod('post')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->role == 'admin') {
                    return redirect()->intended(route('admin.home'));
                } else {
                    if (!empty($_POST['remember'])) {
                        setcookie('email', $_POST['email'], time() + 3600);
                        setcookie('password', $_POST['password'], time() + 3600);
                    } else {
                        setcookie('email', '');
                        setcookie('password', '');
                    }
                    return redirect()->intended(route('home'));
                }
            }
            return back()->with('error', 'Email or password is incorrect');
        }
    }
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('Client.Users.register');
        } else if ($request->isMethod('post')) {
            $request->validate([
                'name' => [
                    'required',
                    'regex:/^[\pL\s]+$/u'
                ],
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'phone' => 'required|numeric|digits:10',
                'address' => 'required'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => 'user'
            ]);
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
