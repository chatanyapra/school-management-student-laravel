<div class="timeTableMain">
    <table class="timeTableCont1">
        <th colspan="9">Time Table</th>
        <tr>
            <th>Days</th>
            <th>I</th>
            <th>II</th>
            <th>III</th>
            <th>IV</th>
            <th>V</th>
            <th>VI</th>
            <th>VII</th>
            <th>VIII</th>
        </tr>
        <tr class="{{$week_day == 'Monday' ? 'time_table_class_anim' : 'none'}}">
            <th>Monday</th>
            @foreach ($time_table_user as $table_item)  
                @if ($table_item->Monday == 'None')
                    <td style="box-shadow: 0px 0px 10px 2px rgb(255, 68, 68) inset">{{$table_item->Monday}}</td>
                @else
                    <td>{{$table_item->Monday}}</td>
                @endif          
            @endforeach
        </tr>
        <tr class="{{$week_day == 'Tuesday' ? 'time_table_class_anim' : 'none'}}">
            <th>Tuesday</th>
            @foreach ($time_table_user as $table_item)            
                @if ($table_item->Tuesday == 'None')
                    <td style="box-shadow: 0px 0px 10px 2px rgb(255, 68, 68) inset">{{$table_item->Tuesday}}</td>
                @else
                    <td>{{$table_item->Tuesday}}</td>
                @endif  
            @endforeach
        </tr>
        <tr class="{{$week_day == 'Wednesday' ? 'time_table_class_anim' : 'none'}}">
            <th>Wednesday</th>
            @foreach ($time_table_user as $table_item)            
                 @if ($table_item->Wednesday == 'None')
                    <td style="box-shadow: 0px 0px 10px 2px rgb(255, 68, 68) inset">{{$table_item->Wednesday}}</td>
                @else
                    <td>{{$table_item->Wednesday}}</td>
                @endif  
            @endforeach
        </tr>
        <tr class="{{$week_day == 'Thursday' ? 'time_table_class_anim' : 'none'}}">
            <th>Thursday</th>
            @foreach ($time_table_user as $table_item)            
                @if ($table_item->Thursday == 'None')
                    <td style="box-shadow: 0px 0px 10px 2px rgb(255, 68, 68) inset">{{$table_item->Thursday}}</td>
                @else
                    <td>{{$table_item->Thursday}}</td>
                @endif 
            @endforeach
        </tr>
        <tr class="{{$week_day == 'Friday' ? 'time_table_class_anim' : 'none'}}">
            <th>Friday</th>
            @foreach ($time_table_user as $table_item)            
                @if ($table_item->Friday == 'None')
                    <td style="box-shadow: 0px 0px 10px 2px rgb(255, 68, 68) inset">{{$table_item->Friday}}</td>
                @else
                    <td>{{$table_item->Friday}}</td>
                @endif 
            @endforeach
        </tr>
        <tr class="{{$week_day == 'Saturday' ? 'time_table_class_anim' : 'none'}}">
            <th>Saturday</th>
            @foreach ($time_table_user as $table_item)            
                @if ($table_item->Saturday == 'None')
                    <td style="box-shadow: 0px 0px 10px 2px rgb(255, 68, 68) inset">{{$table_item->Saturday}}</td>
                @else
                    <td>{{$table_item->Saturday}}</td>
                @endif 
            @endforeach
        </tr>
    </table>
</div>