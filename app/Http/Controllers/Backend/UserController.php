<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserView()
    {
        // $allData = User::all();
        $data['allData'] = User::where('user_type', 'Admin')->get();
        return view('backend.user.view_user', $data);
    }


    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'full_name' => 'required',
        ]);

        $data = new User();
        $random = "0JAK2LBM3NCO4PDQ5RES6TFU7VGW8XHY9ZI";
        $code = substr(str_shuffle($random), 0, 8);
        $data->user_type = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();

        $notification = array(
            'message' => 'Pengguna Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id)
    {
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();

        $notification = array(
            'message' => 'Pengguna Berhasil Diubah!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Pengguna Berhasil Dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }
}
