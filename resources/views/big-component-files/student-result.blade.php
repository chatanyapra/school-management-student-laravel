<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Receipt</title>
    <link rel="stylesheet" href="{{URL::asset('css-container/registrationReceipt.css')}}" />
</head>
<body>
    <button type="submit" id="downloadReceipt" style="display: block;" onclick="download();">Download</button>
    
    
    <div class="registrationStatusMain">
        <span style="text-decoration-line: underline; font-size: 20px;">Exam Result</span>
        <header style="text-align: center; margin-bottom: 5px; height: 150px;">
            <span>
                <h1 style="margin: 10px;">My Dream School Of Technology</h1>
                Affiliated to C.B.S.E Board, New Delhi
                <br>Near: home, Front Of Balajipuram. <br>City: Mathura UttarPradesh <br>
                Contact No'- 9924888550, 8574857400 <br>
                Email Id- <span style="text-decoration: underline;">patanahi@gmail.com</span>
            </span>
            <img src="websiteImages\admission-image.jpg" width="160" height="160" alt="Image">
        </header>
    @foreach ($query as $user_info)
        
    <div class="profile_container">
        <strong style="font-size: 22px; padding-top: 7px; margin-left:40%; position: absolute; top: 0;"> Student Profile </strong>
        <div class="student_detail">
                <table style="width: 130px;">
                    <tr>
                        </tr><tr><td>Student Name: </td></tr>
                        <tr><td>Roll no: </td></tr>
    
                        <tr><td>Class: </td></tr>
                        <tr><td>Attendence: </td></tr>
    
                        <tr><td>Father's Name: </td></tr>
                        <tr><td>Phone no: </td></tr>
                            
                        <tr><td colspan="2" style="text-align: left; padding: 10px 1px 25px 3px;">Address in detail: </td></tr>
                    </tr>
                </table>
                <table style="width: 370px; text-transform: capitalize;">
                    <tr>
                        <tr><td>{{$user_info->Name}}</td></tr>
                        <tr><td>{{$user_info->Sno}}</td></tr>
    
                        <tr><td > {{$class_name}}</td></tr>
                        <tr><td>{{number_format($total_att, 2)}} %</td></tr>
    
                        <tr><td>{{$user_info->fatherName}} </td></tr>
                        <tr><td>{{$user_info->phoneNo}}</td></tr>
                            
                        <tr><td colspan="2" style="text-align: left; padding: 10px 1px 25px 3px;">Address in detail: </td></tr>
                    </tr>
                </table>
            </div>
            <div class="student_image">
                <img src="" alt="student image">
            </div>
        </div>
        <table class="table2"style="border: 1px solid black; margin-bottom: 40px; ">
            <tr>
                <th style="border: 1px solid black; text-align: center; width: 70px;">S no'</th>
                <th style="border: 1px solid black; text-align: center;">Subject</th>
                <th style="border: 1px solid black; text-align: center;">Total Marks</th>
                <th style="border: 1px solid black; text-align: center;">Obtained</th>
                <th style="border: 1px solid black; text-align: center;">Grade</th>
            </tr>
            <tr>
                <td style="text-align: center;">1</td>
                <td>English</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr >
                <td style="text-align: center;">2</td>
                <td>Mathematics</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">3</td>
                <td>Science</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">4</td>
                <td>Social Science</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">5</td>
                <td>Hindi</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">6</td>
                <td>Moral</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">7</td>
                <td>Sanskrit</td>
                <td>50</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"></td>
                <th style="border: 1px solid black; padding: 6px 0;">Total -</th>
                <th style="border: 1px solid black;">0000</th>
                <th style="border: 1px solid black;">0000</th>
                <th style="border: 1px solid black;">0000</th>
            </tr>
        </table>
    </div>
    @endforeach
    <script>
        function download(){ 
            var downloadReceipt= document.getElementById('downloadReceipt');
            downloadReceipt.style.display ="none";
            window.print();
            window.close();
        }
    </script>
</body>
</html>