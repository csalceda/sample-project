@extends('layouts.app')

@section('content')

<div id="enroll_success" class="block mt-30 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">

                <h5 class="heading-20"><i class="icon-ok-circled text-success mr-2"></i> Student Registration Success!</h5>
                <hr>

                <p><span class="details">{{ $student->firstname." ".$student->middlename." ".$student->lastname }}</span> has been successfully registered as a <span class="details">{{ $grade_info->getGradeLevel() }}</span> student for School Year <span class="details">{{ $school_year }}</span>. Below are the tuition fee details and the mode of payment that you chose. </p>

                <hr>

                {{-- Tuition Breakdown --}}
                <div class="row">
                    <div class="col">
                        <h6 class="heading-16 font-weight-bold">Type of Fees</h6>
                        <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Tuition Fees</th>
                            <th scope="col">Miscellaneous Fees</th>
                            <th scope="col">Others Fees</th>
                            <th scope="col">TOTAL FEES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>{{ $grade_info->tuition_fee }}</td>
                            <td>{{ $grade_info->misc_fee }}</td>
                            <td>{{ $grade_info->others_fee }}</td>
                            <td class="table-total">₱ {{ $grade_info->total_due }}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>

                {{-- Mode of Payment --}}
                <div class="row">
                    <div class="col">
                        <h6 class="heading-16 font-weight-bold">Mode of Payment</h6>
                        @if($mode_of_payment == "full")
                            <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" colspan="4" class="text-center">
                                        Full Payment
                                        <p class="note mt-2 mb-0">Cash Basis 5% discount (tuition fee only)</p>
                                    </th>
                                </tr>
                                <tr>
                                <th scope="col">Tuition Fees</th>
                                <th scope="col">Miscellaneous Fees</th>
                                <th scope="col">Others Fees</th>
                                <th scope="col">TOTAL FEES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ number_format($grade_info->getTuitionDiscount(), 2) }}</td>
                                <td>{{ $grade_info->misc_fee }}</td>
                                <td>{{ $grade_info->others_fee }}</td>
                                <td class="table-total">₱ {{ number_format($grade_info->getTuitionDiscount() + $convert_misc + $convert_others, 2) }}</td>
                                </tr>
                            </tbody>
                            </table>
                        @else
                            <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    @if($mode_of_payment == "semestral")    
                                        <th scope="col" colspan="2" class="text-center">
                                            Semestral Installment
                                            <p class="note mt-2 mb-0">Due Date: 5th October</p>
                                        </th>
                                    @elseif($mode_of_payment == "quarterly")
                                        <th scope="col" colspan="2" class="text-center">
                                            Quarterly Installment
                                            <p class="note mt-2 mb-0">Due Dates: 5th August | 5th October | 5th December | 5th February</p>
                                        </th>
                                    @elseif($mode_of_payment == "monthly")
                                        <th scope="col" colspan="2" class="text-center">
                                            Monthly Installment
                                            <p class="note mt-2 mb-0">Every 5th day of the Month</p>
                                        </th>
                                    @endif
                                </tr>
                                <tr>
                                    <th class="text-center">Upon Enrollment</th>
                                    @if($mode_of_payment == "semestral")    
                                        <th class="text-center">2nd Sem</th>
                                    @elseif($mode_of_payment == "quarterly")
                                        <th class="text-center">Per Quarter</th>
                                    @elseif($mode_of_payment == "monthly")
                                        <th class="text-center">Per Month</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center table-total">{{ $enrollment_info->paid_upon_enrollment }}</td>
                                    <td class="text-center">{{ number_format($enrollment_info->installment_amount, 2) }}</td>
                                </tr>
                            </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <hr>
                <p class="font-italic font-weight-bold">Note: ENROLMENT IS OFFICIAL ONLY UPON RECEIPT OF PAYMENT AND SUBJECT TO THE PARENT-PUPIL HANDBOOK SECTION ON SCHEDULE AND REFUND OF FEES.</p>

                {{-- Buttons --}}
                <div class="row float-right mt-2">
                    <div class="col">
                        {{-- <button type="submit" class="btn btn-warning">View PDF</button> --}}
                        <a href="/pdf" class="btn btn-warning" target="_blank">View PDF</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-dark btn btn-success">
                            Done
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection