
@foreach ($student_detail as $item)
    <div class="topContainContact"><h3>Personal Details</h3></div>
    <div class="mainDivOfContactInfo">
        <section class="containContact-info">
            <span class="ribbon3">My Details</span>
            <div class="containContact-first">
                <span style="text-transform: capitalize;"><strong>Name: </strong><span>{{$item->Name}}</span></span>
                <span>DOB: <span>00/00/0000</span></span>
                <span style="text-transform: capitalize;"><strong>Gender: </strong><span>male</span></span>
                <span style="text-transform: capitalize;"><strong>Class: </strong><span>{{substr($class_name, -1);}} </span></span>
            </div>
            <div class="containContact-sec">
                <span>Aadhar No: <span>485458484484848</span></span>
                <span>Email: <span>{{$item->Email}}</span></span>
                <span>Contact No: <span>{{$item->phoneNo}}</span></span>
            </div>
        </section>
        
        <section class="containContact-info">
            <span class="ribbon3">Parents Details</span>
            <div class="containContact-first">
                <span style="text-transform: capitalize;"><strong>Father's Name: </strong><span>{{$item->fatherName}}</span></span>
                <span>Father's Email: <span>..........@gmail.com</span></span>
                <span style="text-transform: capitalize;"><strong>Father's Occupation: </strong><span>male</span></span>
            </div>
            <div class="containContact-sec">
                <span>Contact No (Parent): <span>{{$item->phoneNo}}</span></span>
                <span style="text-transform: capitalize;"><strong>Mother's Name: </strong><span>______________</span></span>
                <span>Mother's Email: <span>..........@gmail.com</span></span>
            </div>
        </section>
    </div>
    @break
@endforeach
