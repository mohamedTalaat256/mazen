<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $account = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.account.index', compact('account'));
    }


    public function updateAccount(Request $request)
    {
        $data = array();

        if($request->password and $request->confirm_password ){

            if($request->password == $request->confirm_password){
                $data['password'] = Hash::make($request->password) ;
                $data['name'] = $request->name;
                $data['email'] = $request->email;

                Admin::where('id', Auth::guard('admin')->user()->id)->update($data);
                return redirect()->route('account')->with('success-msg', 'account updated success.' );
            }else{
                return redirect()->route('account')->with('success-msg', 'passwords not match.' );
            }
        }else{
            $data['name'] = $request->name;
            $data['email'] = $request->email;

            Admin::where('id', Auth::guard('admin')->user()->id)->update($data);

            return redirect()->route('account')->with('success-msg', 'account updated success.' );
        }
    }
}
