<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $student_detail= DB::table($user_class_DB)
                        ->select("$user_class_DB.Sno", "$user_class_DB.Name", "$user_class_DB.photo", "$user_class_DB.fatherName", "$user_class_DB.Email", "$user_class_DB.phoneNo",
                                    "$user_class_DB.ClassRegistration", "$user_class_DB.total_fees", "$user_class_DB.feesSubmitted", "$class_result.*")
                            ->leftJoin("$class_result", "$class_result.student_regno", "=", "$user_class_DB.registrationNo")
                            ->where("$user_class_DB.registrationNo","=", $user_regno)
                            ->where("$class_result.exam_type", "=", "half-yearly")
                            ->get()
                        ;
            $total_att= session()->get('net_attendance');
        return view('big-component-files/student-result', compact('student_detail', 'class_name', 'total_att'));
    }
}
