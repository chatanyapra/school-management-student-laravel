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
    
@foreach ($user_about as $item)
    
    <div class="registrationStatusMain">
        <span style="text-decoration-line: underline; font-size: 20px;">Registration Receipt</span>
        <header style="text-align: center; margin-bottom: 5px;">
            <span>
                <h1 style="margin: 10px;">My Dream School Of Technology</h1>
                Affiliated to C.B.S.E Board, New Delhi
                <br>Near: home, Front Of Balajipuram. <br>City: Mathura UttarPradesh <br>
                Contact No'- 9924888550, 8574857400 <br>
                Email Id- <span style="text-decoration: underline;">patanahi@gmail.com</span>
            </span>
            <img src="websiteImages\admission-image.jpg" width="150" height="160" alt="Image">
        </header>
        <table>
            <tr><td colspan="2" style="text-align: right; padding: 10px 1px 25px 3px;">Date: ___/___/_______(dd/mm/yyyy)</td></tr>
            <tr>
                <td>Student Name: {{$item->Name}} </td>
                <td>Roll no: {{$item->Sno}}</td>
            </tr>
            <tr>
                <td style="text-transform: capitalize;">Class: {{$class_name}}</td>
                <td>Email Id: {{$item->Email}}</td>
            </tr>
            <tr>
                <td>Date Of Birth: 07/02/2004</td>
                <td>Gender: Male</td>
            </tr>
            <tr>
                <td>Father's Name: {{$item->fatherName}}</td>
                <td>Phone no: {{$item->phone}}</td>
            </tr>
            <tr><td colspan="2" style="text-align: left; padding: 10px 1px 25px 3px;">Address in detail: .......................................................................................................................................................</td></tr>
        </table>
        <table class="table2"style="border: 1px solid black; margin-bottom: 40px; ">
            <tr>
                <th style="border: 1px solid black; text-align: center; width: 70px;">S no'</th>
                <th style="border: 1px solid black; text-align: center;">Particulars</th>
                <th style="border: 1px solid black; text-align: center;">Actual Amount</th>
                <th style="border: 1px solid black; text-align: center;">Paid Amount</th>
            </tr>
            <tr>
                <td style="text-align: center;">1</td>
                <td>Admission Fees</td>
                <td>99999</td>
                <td>0</td>
            </tr>
            <tr >
                <td style="text-align: center;">2</td>
                <td>Tution Fees</td>
                <td>22222</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">3</td>
                <td>Exam Fees</td>
                <td>55555</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">4</td>
                <td>Transport Fees</td>
                <td>55555</td>
                <td>0</td>
            </tr>
            <tr>
                <td style="text-align: center;">4</td>
                <td>Fine</td>
                <td>55555</td>
                <td>0</td>
            </tr>
            <!-- ----temporary height----- -->
            <tr style="height: 80px;">
                <td style="text-align: center;"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"></td>
                <th style="border: 1px solid black; padding: 6px 0;">Total</th>
                <th style="border: 1px solid black;">8800</th>
                <th style="border: 1px solid black;">6018</th>
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