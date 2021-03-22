<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request->session()->has('ADMIN_LOGIN'))
        {
          return redirect('admin/dashboard');
        }
        else
        {
            $request->session()->flash('error','Access Denied');
            return view('admin/login');
        }
        return view('admin/login');
    }

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');
        //$result=Admin::where(['email'=>$email,'password'=>$password])->get();
        $result=Admin::where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($request->post('password'),$result->password))
            {
                $request->session()->put('ADMIN_LOGIN','true');
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else
            {
                $request->session()->flash('error','Please Enter Correct Password');
                return redirect('admin');
            }
        }
        else
        {
            $request->session()->flash('error','Please Enter Valid Login Details');
            return redirect('admin');
        }
    }  

    //Dashboard
     public function dashboard()
    {
        return view('admin/dashboard');
    }

    //    public function updatepassword()
    // {
    //     $r=Admin::find(1);
    //     $r->password=Hash::make('1234');
    //     $r->save();
    // }
 
}
