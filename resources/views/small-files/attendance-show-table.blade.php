    <table class="attendenceTableBox">
        <tr style="text-align: center;">
            <td style="border: none;" >S.no</td>
            <td style="width: 40%; border: none;">Date</td>
            <td style="border: none;" >Attendence</td>
        </tr>
@php $i=1; @endphp
@foreach ($attendance_of_subject as $data)

    <tr style="text-align: center; border-bottom: 0.5px solid black;">
        <td style="border: none;" >{{$i}}</td>
        <td style="width: 40%; border: none;">{{$data->attendence_date}}</td>
        <td style="border: none;">
            <span style="padding: 2px 15px; border-radius: 15px; color: white; background-color: {{$data->attendence_status == 'P' ? 'green' : 'red'}};"> {{$data->attendence_status}} </span>
        </td>
    </tr>
    @php $i++; @endphp
@endforeach
    </table>