@foreach ($student_detail as $item)
    <div class="mainInternalDivOfReg">
        <div class="internalBoxStatus">
            <blockquote>Activity <span style="color: blue;">Registration</span></blockquote>
            <blockquote>Status <span style="color: rgb(12, 210, 26);">You Are {{$item->ClassRegistration}}</span></blockquote>
        </div>
    </div>
@endforeach