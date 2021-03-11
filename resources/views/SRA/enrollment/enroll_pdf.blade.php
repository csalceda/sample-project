<style>
    div {
        display: block;
    }
    .heading-20 {
        font: normal 20px/1.5;
        color: #3644d9;
        text-align: center;
        margin-bottom: 5px;
    }
    .sub-heading {
        text-align: center;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    .sub-heading-20 {
        font: bold 20px/1.5;
        text-align: center;
        margin-top: 15px;
    }
    .label {
        font-weight: bold;
    }
    .info {
        text-transform: uppercase;
    }
    .details-left {
        display: inline-block;
        margin-left: 10px;
        padding-right: 150px;
    }
    .details-right {
        display: inline-block;
        padding-left: 100px;
        padding-top: 60px;
    }
    .left {
        float: left;
    }
    .right {
        float: right;
    }
    span {
        display: inline-block
    }
    .text {
        text-align: center;
        font: normal 15px/1.5;
    }
</style>

<h6 class="heading-20"> St. Rose Academy, Inc. </h6>
<p class="sub-heading"> Life Homes Subdivision Rosario, Pasig City, Philippines </p>
<p class="sub-heading"> Tel no. 6566181/CP no. 09065208491 </p>
<p class="sub-heading-20"> School Year: {{ $school_year }} </p>
<p class="text"><b> Date Registered:</b> {{ $today }} </p>

{{-- Student Information --}}
<div class="row">
    @if($student->lrn)
        <span class="details-left"><span class="label"> Student No.: </span> {{ $student->lrn }}</span>
    @endif
</div>
<br>

<div class="row">
    <span class="details-left"><span class="label"> Name: </span> {{ $student->firstname." ".$student->middlename." ".$student->lastname }} </span>
</div>
<br>
<div class="row">
    @if($student->grade_level)
        <span class="details-left"><span class="label"> Grade Level: </span> {{ $grade_info->getGradelevel() }} </span>
    @endif
</div>
<br>
<div class="row">
    @if($student->type == '1')
    <span class="details-left"><span class="label"> Student Type: </span> NEW </span>
    @else
    <span class="details-left"><span class="label"> Student Type: </span> OLD </span>
    @endif
</div>

<hr style="margin-top: 15px; margin-bottom: -10px;">

{{-- <div class="row" style="margin-top: 40px;">
    <p>Types of Fees</p>
    <p><b>Tuition Fee:</b> {{ $grade_info->tuition_fee }}</p>
    <p><b>Miscellaneous Fee:</b> {{ $grade_info->misc_fee }}</p>
    <p><b>Other Fee:</b> {{ $grade_info->others_fee }}</p>
    <hr>
    <p><b>Total Due:</b> {{ $grade_info->total_due }}</p>
</div> --}}

<div class="row" style="margin-top: 25px;">
    <h3 style="text-align: center; margin-bottom: 20px;">Types of Fees for {{ $grade_info->grade_level }}</h3>
    <table class="bordered"> <!-- only added this -->
        <tr class="font-12">
            <th style="width: 150px">Tuition</th>
            <th style="width: 150px">Misc</th>
            <th style="width: 150px">Others</th>
            <th style="width: 150px">Total</th>
        </tr>
        <tr>
            <td style="width: 150px; text-align: center;">{{ $grade_info->tuition_fee }}</td>
            <td style="width: 150px; text-align: center;">{{ $grade_info->misc_fee }}</td>
            <td style="width: 150px; text-align: center;">{{ $grade_info->others_fee }}</td>
            <td style="width: 150px; text-align: center; color: green;">{{ $grade_info->total_due }}</td>
        </tr>
    </table>

<hr>

<div class="row" style="margin-top: 25px;">
    @if($enrollment->terms_of_payment == "full")
        <p style="text-transform: capitalize;"><b>Terms of Payment:</b> {{ $enrollment->terms_of_payment }}</p>
        <p>Cash Basis 5% discount (tuition fee only)</p>
        <table class="bordered" style="margin-bottom: 20px;"> <!-- only added this -->
            <tr class="font-12">
                <th style="width: 150px">Tuition</th>
                <th style="width: 150px">Misc</th>
                <th style="width: 150px">Others</th>
                <th style="width: 150px">Total</th>
            </tr>
            <tr>
                <td style="width: 150px; text-align: center;">{{ number_format($grade_info->getTuitionDiscount(), 2) }}</td>
                <td style="width: 150px; text-align: center;">{{ $grade_info->misc_fee }}</td>
                <td style="width: 150px; text-align: center;">{{ $grade_info->others_fee }}</td>
                <td style="width: 150px; text-align: center; color: green; font-weight: bolder;">Php {{ number_format($grade_info->getTuitionDiscount() + $convert_misc + $convert_others, 2) }}</td>
            </tr>
        </table>
        <hr>
    @else
        <p style="text-transform: capitalize;"><b>Terms of Payment:</b> {{ $enrollment->terms_of_payment }}</p>
        @if($enrollment->terms_of_payment == 'semestral')
            <p>Installment Payment will be due on <b>OCTOBER 5</b></p>
        @elseif($enrollment->terms_of_payment == 'quarterly')
            <p>Installment Payments will be due on <b>AUGUST 5, OCTOBER 5, DECEMBER 5, FEBRUARY 5</b></p>
        @elseif($enrollment->terms_of_payment == 'monthly')
            <p>Installment Payments will be due every <b>5TH of the month.</b></p>
        @endif
        <table class="bordered" style="margin-bottom: 20px;"> <!-- only added this -->
            <tr class="font-12">
                <th style="width: 300px">Paid Upon Enrollment</th>
                <th style="width: 300px">Installment Amount</th>
            </tr>
            <tr>
                <td style="width: 300px; text-align: center; color: green; font-weight: bolder;">Php {{ number_format($upon_enrollment, 2) }}</td>
                <td style="width: 300px; text-align: center;">Php {{ number_format($installment_amt, 2) }}</td>
            </tr>
        </table>
        <hr>
    @endif
    {{-- <p><b>Terms of Payment:</b> {{ $enrollment->terms_of_payment }}</p>
    <p><b>Miscellaneous Fee:</b> {{ $grade_info->misc_fee }}</p>
    <p><b>Other Fee:</b> {{ $grade_info->others_fee }}</p>
    <hr>
    <p><b>Total Due:</b> {{ $grade_info->total_due }}</p> --}}
</div>

<div class="row" style="margin-top: 10px; margin-bottom: 10px;">
    <h3 style="font-weight: bold;">Please pay this amount:  <span style="color: green; margin-left: 100px;">Php {{ number_format($upon_enrollment, 2) }}</span></h3>
</div>
<hr>
<div class="row" style="margin-top: 25px;">
    <p>* Please keep this copy as a proof of Student Registration.</p>
</div>
</div>