<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @php
        $result = 0;
    @endphp
@foreach ($query as $detail)
    <div class="contentBoxTop">
        <div class="contentTop1">
            <span><span>Student Name: </span><span style="color: rgb(65, 78, 223); word-break: break-all;">{{ $detail->Name }}</span></span>
            <span><span>Father's Name: </span><span style="color: rgb(65, 78, 223);  word-break: break-all;">{{ $detail->fatherName }}</span></span>
        </div>
        <div class="contentTop1">
            <span><span>Class: </span><span style="color: rgb(65, 78, 223); text-transform: capitalize;">{{$class_name}}</span></span>
            <span><span>Class Rollno: </span><span style="color: rgb(65, 78, 223);">{{ $detail->Sno }}</span></span>
        </div>
        <div class="contentTop1">
            <span><span>Email: </span><span style="color: rgb(65, 78, 223); word-break: break-all;">{{ $detail->Email }}</span></span>
            <span><span>Phone No: </span><span
                    style="color: rgb(65, 78, 223); word-break: break-all;">{{ $detail->phoneNo }}</span></span>
        </div>
    </div>
    <div class="contentBoxTop">
        <div class="studentDetailBox">
            <span>
                <h2>{{number_format($net_att, 0)}}%</h2>
                <div class="progress" style="height: 7px; background-color: rgb(230, 224, 224); border-radius: 20px;">
                    <div class="progress-bar" style="width:{{number_format($net_att, 0)}}%; height: 7px;"></div>
                </div>
            </span>
            <h4>Attendence</h4>
        </div>
@endforeach
        <div class="studentDetailBox">
            <span>
                <h2>{{$result_user ? $result_user : 0 }}%</h2>
                <div class="progress" style="height: 7px; background-color: rgb(230, 224, 224); border-radius: 20px;">
                    <div class="progress-bar" style="width:{{$result_user ? $result_user : 0 }}%; height: 7px;"></div>
                </div>
            </span>
            <span><h4>Result Percent</h4><small  class="result_percent">Half-yearly</small></span>
        </div>
        <div class="studentDetailBox">
            <span>
                <h2>40%</h2>
                <div class="progress" style="height: 7px; background-color: rgb(230, 224, 224); border-radius: 20px;">
                    <div class="progress-bar" style="width:40%; height: 7px;"></div>
                </div>
            </span>
            <h4>Test Result</h4>
        </div>
    </div>

    <div class="tableOfAddtendenceBlock">
        <div class="containerMainAttandance" style="width: 95%; min-height: 250px; justify-content:space-between;">
                <h4 class="pt-2">Attendence</h4>
            <table class="mt-2">
                @php
                    $arr= array();
                    $num= 0;
                @endphp
                @if (!empty($total_att_sub)) 
                    @foreach ($total_att_sub as $net_sub)
                        @foreach ($attendance_subject as $att_took)  
                            @if ($net_sub->sub_name == $att_took->sub_name)
                            @php array_push($arr, $att_took->sub_name) @endphp
                            <tr>
                                <td class="subjectOfBar">{{$att_took->sub_name}}</td>
                                <td class="progressBarClass">
                                    <div class="progress">
                                        <div class="progress-bar" title="Physics" data-bs-toggle="popover" data-bs-trigger="hover"
                                        data-bs-placement="top" data-bs-content="chatanya" style="width:{{$att_took->percent}}%">{{$att_took->percent}}%</div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @endforeach
                @endif
                    @foreach ($total_att_sub as $net_sub)
                        @if(!in_array($net_sub->sub_name, $arr))
                            <tr>
                                <td class="subjectOfBar">{{$net_sub->sub_name}}</td>
                                <td class="progressBarClass">
                                    <div class="progress">
                                        <div class="progress-bar" title="Physics" data-bs-toggle="popover" data-bs-trigger="hover"
                                        data-bs-placement="top" data-bs-content="chatanya" style="width:0%">0%</div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                <tr>
                    <td class="subjectOfBarLast"></td>
                    <td class="progressBarLast"></td>
                </tr>
                <tr>
                    <td class="subjectOfBarLast"></td>
                    <td class="progressBarLast2">0
                        <span>
                            <p>20</p>
                        </span>
                        <span>
                            <p>40</p>
                        </span>
                        <span>
                            <p>60</p>
                        </span>
                        <span>
                            <p>80</p>
                        </span>
                        <span>
                            <p>100</p>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="containerMainAttandance" style="width: 95%;">
            <div class="messageInformationBox" style="width: 90%;">
                <header>
                    <h4>Messages</h4><span></span>
                </header>
                <div>
                @foreach ($message as $teacher_message)
                    @if (!empty($teacher_message->messageBox))    
                        <div class="messageBox">
                            <span class="messageBoxImage"><img src="{{URL::asset("$teacher_message->photo")}}" width="88px"
                                height="80px" alt="image"></span>
                                <span class="messageBoxContent"><span style="float: left;">&#128172; </span>
                                {{$teacher_message->messageBox}}
                            </span>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ----------created a div block of teacher of studemts------------------ -->
    <Header
        style="text-align: center; color: blue; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
        <h4>Academic Details</h4>
    </Header>
@foreach ($attendance_subject as $att_took)  
    <div class="allTeacherInfoContain1">
        <span class="allInfoInternalBox1">
            <span style="display: flex;"><img src="{{$att_took->photo}}" width="60px" height="50px"
                    style="border-radius: 50%; margin-right: 20px;" alt="Teacher">
                <span><b>{{$att_took->Name}}</b><br> {{$att_took->sub_name}}</span>
            </span>
        </span>
        <span class="allInfoInternalBox2">
            <span style="min-width: 240px;">
                <h5>{{number_format($att_took->percent, 0)}} %</h5>
                <div class="progress" style="height: 7px; background-color: rgb(230, 224, 224); border-radius: 20px;">
                    <div class="progress-bar" style="width:{{number_format($att_took->percent, 0)}}%; height: 7px; background-color:red"></div>
                </div>
            </span>
            <span class="smallBoxAttend">
                <span style="padding-left:14px;">
                    <p>Held: <span style="background-color: black;">{{$att_took->sub}}</span></p>
                </span>
                <span style="padding-left:14px;">
                    <p>Attend: <span style="background-color: #00cc00;">{{$att_took->pre}}</span></p>
                </span>
                <span style="padding-left:14px;">
                    <p>Leave: <span style="background-color: #ff0000;">{{($att_took->sub - $att_took->pre)}}</span></p>
                </span>
            </span>
            <button type="button" style="display: block; min-width: 50px;" onclick="buttonAboutYouFunc(this)">More</button>
        </span>
    </div>
@endforeach
@foreach ($total_att_sub as $net_sub)
    @if(!in_array($net_sub->sub_name, $arr))
        <div class="allTeacherInfoContain1">
            <span class="allInfoInternalBox1">
                <span style="display: flex;"><img src="{{$net_sub->photo}}" width="60px" height="50px"
                        style="border-radius: 50%; margin-right: 20px;" alt="Teacher">
                    <span><b>{{$net_sub->Name}}</b><br> {{$net_sub->sub_name}}</span>
                </span>
            </span>
            <span class="allInfoInternalBox2">
                <span style="min-width: 240px;">
                    <h5>0%</h5>
                    <div class="progress" style="height: 7px; background-color: rgb(230, 224, 224); border-radius: 20px;">
                        <div class="progress-bar" style="width:0%; height: 7px; background-color:red"></div>
                    </div>
                </span>
                <span class="smallBoxAttend">
                    <span style="padding-left:14px;">
                        <p>Held: <span style="background-color: black;">0</span></p>
                    </span>
                    <span style="padding-left:14px;">
                        <p>Attend: <span style="background-color: #00cc00;">0</span></p>
                    </span>
                    <span style="padding-left:14px;">
                        <p>Leave: <span style="background-color: #ff0000;">0</span></p>
                    </span>
                </span>
                <button type="submit" onclick="buttonAboutYouFunc(this)"
                    style="display: block; min-width: 50px;">More</button>
            </span>
        </div>
    @endif
@endforeach

    {{-- <script src="{{URL::asset('js-container/dashboardPage.js')}}"></script> --}}
    <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    var numSym = 1;

    function buttonAboutYouFunc(event) {
        event.classList.toggle('toggleColorOfSeeButton');
        if (event.innerHTML == 'See Less') {
            event.innerHTML = 'More';
        } else {
            event.innerHTML = 'See Less';
        }
    }
    </script>

<?php
    //         }
    //         else{
    //             echo "<script>window.location.replace('newSch.php')</script>";
    //         }
    //     }
    // }
    // else{
    //     echo "<script>window.location.replace('newSch.php')</script>";
    // }
?>
</body>

</html>