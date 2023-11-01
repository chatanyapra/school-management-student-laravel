@foreach ($student_detail as $user_fees)
    <div class="MyadvisorMain">
        <header>
            <span style="padding-left: 20px;" class="material-symbols-sharp hideBox">currency_rupee</span>
            <h5> My Fees Details </h5>
        </header>
        <div class="myFeesBox">
            <div>Academic</div>
            <span><strong>Net Fees </strong><span><strong>{{$user_fees->total_fees + 2000}}</strong></span></span>
            <span>Practical Fees<span> 2000</span></span>
            <span>Monthly Fees<span>{{$user_fees->total_fees / 12}}</span></span>
            <span>Bus Fees<span>None</span></span>
            <span>Fine <span>00</span></span>
            <span>Paid<span>{{$user_fees->feesSubmitted}}</span></span>
            <span class="balanceClassSpan">Balance <span>{{$user_fees->total_fees - $user_fees->feesSubmitted}}</span></span>
        </div>
    </div>
@endforeach