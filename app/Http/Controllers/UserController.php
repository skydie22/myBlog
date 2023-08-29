<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $profile = User::all();

        return view('admin.profile.index', compact('profile'));
    }


    public function update(Request $request , $id)
    {
        $profile = User::findOrFail($id);
        $profile->update([
            'name' => $request->name,
            'username' => $request->username,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->back();

    }

    public function destroy($id)
    {
        $profile = User::findOrFail($id);
        $profile->delete();

        return redirect()->back();
    }
}
