<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;

class ResultReceiptController extends Controller
{
    function result_receipt_function(){
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $user_class_DB= session()->get('user_class').'db';
        $class_name= str_replace('_', '-', $user_class);
        $now = Carbon::now();
        $formattedDate = $now->format('d-m-Y');
        $user_about= DB::table($user_class_DB)
            ->where('registrationNo', $user_regno)
            ->get();
        return view('big-component-files/registration-receipt', compact('user_about', 'class_name', 'formattedDate'));
    }
    function exam_result_function(){
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $class_result= session()->get('user_class').'result';
        $user_class_DB= session()->get('user_class').'db';
        $class_name= str_replace('_', '-', $user_class);

        $otherController = new DashboardController;

        // Call the method from the other controller
        $query = $otherController->user_info_function();
        $result_user = $otherController->result_function();

        $total_att= session()->get('net_attendance');
        return view('big-component-files/student-result', compact('query', 'class_name', 'total_att', 'result_user'));
    }
}
