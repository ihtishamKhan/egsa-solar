<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'details'])->role('Employee')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {        
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $user->assignRole('Employee');

        $userDetail = new UserDetail();
        $userDetail->user_id = $user->id;
        $userDetail->phone = $request->phone;
        $userDetail->dob = $request->dob;
        $userDetail->gender = $request->gender;
        $userDetail->join_date = $request->join_date;
        $userDetail->address = $request->address;
        $userDetail->city = $request->city;
        $userDetail->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');

    }
}
