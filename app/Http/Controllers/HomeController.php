<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->userType== 'user'){
                return view('pages.index');
            }
            else{
                return view('admin.index');
            }
        }

        else{
            return redirect()->back();
        }
    }
}
