
@foreach ($user_data as $faculty)
    @if ($loop->iteration == 2)
        <div class="MyadvisorMain">
            <header>
                <span style="padding-left: 20px;" class="material-symbols-sharp hideBox">person</span>
                <h5> My Principal Details </h5>
            </header>
            <div class="myadvisorBox1">
                <img src='{{URL::asset("$faculty->photo")}}' width="170" height="150" alt="Advisor Image">
                <div class="divmyadvisorBox1">
                    <span style="display: flex; font-size: 16px;"><span style="font-size: 24px;" class="material-symbols-sharp">person</span>{{$faculty->Name}}</span>
                    <span style="display: flex; font-size: 16px;"><span style="font-size: 22px;" class="material-symbols-sharp">Mail</span>{{$faculty->Email}}</span>
                    <span style="display: flex; font-size: 16px;"><span style="font-size: 22px;" class="material-symbols-sharp">phone_in_talk</span>{{$faculty->phoneNo}}</span>
                </div>
            </div>
        </div>
    @endif
@endforeach