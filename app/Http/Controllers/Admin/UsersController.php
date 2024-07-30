<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|numeric',
        ]);
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        return redirect()->route('admin.users.index');
    }
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        return view('admin.users.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|numeric',
        ]);
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        return redirect()->route('admin.users.index', compact('user'));
    }
}
