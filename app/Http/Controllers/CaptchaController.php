<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    private $arrAllComb='';
    // reloadCaptchaOfPhp();
    function captchaReload(){
        $arrayString= [1,'A','B','C','D','E',3,8,
        'F','G','H','I',4,7,'J','K','L','M','N','O','P',5,6,'Q','R','S','T',2,'U','V','W',9,0,'X','Y','Z'];
        $arrChap1= $arrayString[rand(0,35)];
        $arrChap2= $arrayString[rand(0,35)];
        $arrChap3= $arrayString[rand(0,35)];
        $arrChap4= $arrayString[rand(0,35)];
        $arrAllComb= $arrChap1.$arrChap2.$arrChap3.$arrChap4;
        session()->put('captchaCode', $arrAllComb);
        echo $arrAllComb;
    }
    function login_user_func(Request $request){
        $errorMessage= '';
        $validator = Validator::make($request->all(),[
            'captcha'=>'required',
            'studentClass'=>'required',
            'registrationNo'=>'required|min:5',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            $err= $validator->errors();
            return view('small-files/show-alert-message', compact('errorMessage'))->with('err', $err);
        }
        else{
            if(session()->has('captchaCode')){
                $captchaCode= session()->get('captchaCode');
                $capCode= $request->captcha;
                if ($captchaCode == $capCode) {
                    #login code here--------->>>
                    $user_reg_no= $request->registrationNo;
                    $user_class= $request->studentClass;
                    $user_pass= $request->password;
                    $table= $user_class.'db';
                    if(DB::table($table)->where('registrationNo', '=', $user_reg_no)->where('password', '=', $user_pass)->exists()){
                        session()->put('user_reg_no', $user_reg_no);
                        session()->put('user_class', $user_class);
                        Session::put('lastActivity', time());
                        echo "<script type = 'text/javascript'> window.location.replace('/dashboard-home-page')</script>";
                    }
                    else{
                        $errorMessage= "Sorry! Regular Student Login-Id And Password Mismatched...";
                        return view('small-files/show-alert-message', compact('errorMessage'));
                    }
                }
                else{
                    session()->forget('captchaCode');
                    $errorMessage= 'Enter correct captcha';
                    return view('small-files/show-alert-message', compact('errorMessage'));
                }
            }
        }
    }
}