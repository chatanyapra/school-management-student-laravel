<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultReceiptController extends Controller
{
    function result_receipt_function(){
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $user_class_DB= session()->get('user_class').'db';
        $class_name= str_replace('_', '-', $user_class);

        $user_about= DB::table($user_class_DB)
            ->select('Sno','registrationNo', 'Name', 'photo', 'phoneNo', 'fatherName', 'Email', 'total_fees', 'feesSubmitted')
            ->where('registrationNo', $user_regno)
            ->first();
        dump($user_about);
        return view('big-component-files/registration-receipt', compact('user_about', 'user_class'));
    }
}
