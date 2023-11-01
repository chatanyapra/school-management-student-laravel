<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    function attendance_user_func(Request $request){
        $user_class= session()->get('user_class');
        $class_name= str_replace('_', '-', $user_class);

        $request->datavalues == 'attendence';
        $attendance_subjects=  DB::table('sub_teacher')
            ->select('sub_name')
            ->where('classNameSub', $class_name)
            ->get();
        // dump($attendance_subjects);
        return view('big-component-files/attendance-page', compact('attendance_subjects'));
    }
    function select_attendance_subject(Request $request){
        $subject=  $request->subject_name;
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $user_class_DB= session()->get('user_class').'db';
        $class_attendance= $user_class.'_attendence';

        $request->datavalues == 'attendence';
        $attendance_of_subject=  DB::table($class_attendance)
            ->select('attendence_date', 'attendence_status')
            ->where('registrationNo', $user_regno)
            ->where('sub_name', $subject)
            ->get();
        // dump($attendance_of_subject);
        return view('small-files/attendance-show-table', compact('attendance_of_subject'));
    }
}
