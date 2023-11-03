<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    function dashboard_func(){
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $user_class_DB= session()->get('user_class').'db';
        $class_name= str_replace('_', '-', $user_class);

        $user_about= DB::table($user_class_DB)
            ->select('registrationNo', 'Name', 'photo')
            ->where('registrationNo', $user_regno)
            ->first();
        return view('dashboard-page', compact('user_about', 'class_name'));
    }
    function dashboard_frontUI_func(){
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $user_class_DB= session()->get('user_class').'db';
        $class_attendance= $user_class.'_attendence';
        $class_result= $user_class.'result';
        $class_name= str_replace('_', '-', $user_class);

        $query=  DB::table($user_class_DB)
        ->select("$user_class_DB.Sno", "$user_class_DB.Name", "$user_class_DB.photo", "$user_class_DB.fatherName", "$user_class_DB.Email", "$user_class_DB.phoneNo",
                "$user_class_DB.ClassRegistration", "$class_result.exam_type", "$class_result.net_result_percent")
        ->leftJoin("$class_result", "$class_result.student_regno", "=", "$user_class_DB.registrationNo")
        ->where("$user_class_DB.registrationNo","=", $user_regno)
        ->where("$class_result.exam_type", "=", "half-yearly")
        ->get();    

        $total_att_sub= DB::table('sub_teacher')
            ->select('sub_teacher.sub_name', 'teachersdb.Name', 'teachersdb.photo')
            ->leftJoin('teachersdb', 'teachersdb.registrationNo', '=', 'sub_teacher.regno_teach')
            ->where('sub_teacher.classNameSub', $class_name)
            ->distinct()
            ->get()
        ;
        
        $message= DB::table('teachersdb')
                ->select('teachersdb.messageBox', 'teachersdb.photo')
                ->get();

        $attendance_subject = DB::table($class_attendance)
        ->select(
            "$class_attendance.sub_name",
            DB::raw("COUNT($class_attendance.sub_name) AS sub"),
            DB::raw("SUM(CASE WHEN $class_attendance.attendence_status = 'P' THEN 1 ELSE 0 END) AS pre"),
            DB::raw("ROUND((SUM(CASE WHEN $class_attendance.attendence_status = 'P' THEN 1 ELSE 0 END) * 100) / COUNT($class_attendance.sub_name), 1) AS percent"),
            "teachersdb.Name",
            "teachersdb.photo"
        )
            ->leftJoin("teachersdb", "teachersdb.registrationNo", "=", "$class_attendance.registrNo_teacher")
            ->where("$class_attendance.registrationNo", $user_regno)
            ->groupBy("$class_attendance.sub_name")
            ->get();

            // dump($attendance_subject);

        $present_user=0;
        $net_class_held=0;
        foreach($attendance_subject as $at){
            $present_user += $at->pre;
            $net_class_held += $at->sub;
        }
        $net_att=  number_format((($present_user * 100) / $net_class_held), 2);
        session()->put('net_attendance', $net_att);

        return view('big-component-files/user-front-page', compact('message', 'query', 'attendance_subject', 'class_name', 'net_att', 'total_att_sub'));
    }
    function dashboard_academic_reg_func(Request $request){
        $user_regno= session()->get('user_reg_no');
        $user_class= session()->get('user_class');
        $user_class_DB= session()->get('user_class').'db';
        $class_result= $user_class.'result';
        $class_name= str_replace('_', '-', $user_class);

        $user_data = DB::table('allclassdb')
            ->select('allclassdb.className', 'teachersdb.*')
            ->leftJoin('teachersdb', 'teachersdb.registrationNo', '=', 'allclassdb.class_teacher')
            ->where(function($query) use($class_name) {
                $query->where('allclassdb.className', '=', $class_name)
                    ->orWhere('allclassdb.className', '=', 'Admin');
            })
            ->get()
        ;

        $student_detail= DB::table($user_class_DB)
            ->select("$user_class_DB.Sno", "$user_class_DB.Name", "$user_class_DB.photo", "$user_class_DB.fatherName", "$user_class_DB.Email", "$user_class_DB.phoneNo",
                    "$user_class_DB.ClassRegistration", "$user_class_DB.total_fees", "$user_class_DB.feesSubmitted", "$class_result.exam_type", "$class_result.net_result_percent")
            ->leftJoin("$class_result", "$class_result.student_regno", "=", "$user_class_DB.registrationNo")
            ->where("$user_class_DB.registrationNo","=", $user_regno)
            ->where("$class_result.exam_type", "=", "half-yearly")
            ->get()
        ;

        $url='';
        $errorMessage= '';
        if($request->datavalues == 'AcademicRegistration'){
            $url= 'small-files/academic-reg';
        }
        elseif($request->datavalues == 'myProfile'){
            $url= 'small-files/user-profile';
        }
        elseif($request->datavalues == 'TimeTable'){
            $time_table_user = DB::table('new_time_tables')
                ->where('class_name', $class_name)
                ->get();
            $week_day =  date('l');
            return view('big-component-files/time-table-page', compact('time_table_user', 'class_name', 'week_day'));
        }
        elseif($request->datavalues == 'MyAdvisor'){
            $url= 'small-files/advisor-profile';
        }
        elseif($request->datavalues == 'MyPrincipal'){
            $url= 'small-files/principal-profile';
        }
        elseif($request->datavalues == 'AcademicFees'){
            $url= 'small-files/acad-fees-detail';
        }
        elseif($request->datavalues == 'BusFees'){
            $url= 'small-files/transport-fees';
        }
        if(!empty($url)){
            return view($url, compact('user_data', 'class_name', 'student_detail'));
        }
        else{
            $errorMessage = 'Error Occured!';
            $url= 'small-files/show-alert-message';
            return view($url, compact('errorMessage'));
        }
    }
    function password_change_func(){
        $user_regno= session()->get('user_reg_no');
        return view('big-component-files/password-change-page', compact('user_regno'));
    }
    function password_change_check_function(Request $request){
        $errorMessage ='';
        $validator = Validator::make($request->all(),[
            'oldPassword'=>'required',
            'newPassword'=>'required|min:5',
            'confirmPassword'=> 'required|min:5|same:newPassword',
        ]);
        if ($validator->fails()) {
            $err= $validator->errors();
            return view('small-files/show-alert-message', compact('errorMessage'))->with('err', $err);
        }
        else{  
            $confirm_pass= $request->confirmPassword;
            $old_pass=$request->oldPassword;
            $user_regno= session()->get('user_reg_no');
            $user_class_DB= session()->get('user_class').'db';

            $user_detail= DB::table($user_class_DB)
                ->select('password')
                ->where('registrationNo', $user_regno)
                ->first();
            if ($user_detail->password == $old_pass) {
                $update= DB::table($user_class_DB)
                    ->where('registrationNo', $user_regno)
                    ->update(['password' => $confirm_pass]);
                $success = 'Password updated successfully.';
                return response()->json($success);
            }
            else{
                $errorMessage= 'Enter correct old password.';
                return view('small-files/show-alert-message', compact('errorMessage'));
            }
        }
    }
    function user_logout_func(){
        session()->forget(['user_reg_no', 'user_class', 'lastActivity']);
        return '/';
    }
}
