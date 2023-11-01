
<div class="selectSubAttendence">
    <select id="selectSubject" class="form-select w-50 my-4" aria-label="Default select example" onchange="selectedSubject(this.value)">
        <option selected>Choose Subject</option>
        @foreach ($attendance_subjects as $item)
            <option value="{{$item->sub_name}}"> {{$item->sub_name}} </option>
        @endforeach

    </select>
    <span id="subjectName" style="margin: auto 0; font-weight: bold; color: #21b200;">English</span>
</div>
<div class="attendenceMainSec" id="show-attendance-Box">

</div>