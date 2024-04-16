<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:3',
        ]);

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'Admin') {
                return redirect(route('admin'));
            } elseif (Auth::user()->role == 'User') {
                return redirect(route('user'));
            }
        } else {
            return redirect()->back()->with('error-message', 'Invalid Email or Password');
        }
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'username' => 'required|min:3',
            'role' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:3',
        ]);

        $user['password'] = Hash::make($user['password']);
        $user['role'] = 'User';

        User::create($user);
        return redirect(route('register'))->with('success-message', 'Register Success');
    }

    public function deleteAccount(string $id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect(route('admin'))->with('delete-message', 'Delete Success');
    }

    public function updateAccount(Request $request, string $id)
    {
        $users = User::findorfail($id);
        $users->update($request->all());

        return redirect(route('admin'))->with('update-message', 'Update Success');
    }

    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function admin()
    {
        $users = User::all();
        return view('page.admin.dashboard', compact('users'));
    }
    public function user()
    {
        return view('page.users.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
