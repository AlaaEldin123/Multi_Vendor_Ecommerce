<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function VendorDashboard(){

        return view('vendor.vendor_dashboard');
    }


    public function AdminLogin(){
        return view('admin.admin_login');
    } // End Mehtod 

}
