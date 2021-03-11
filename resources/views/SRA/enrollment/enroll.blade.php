@extends('layouts.app')

@section('content')

<div class="container mt-30 mb-80">
    <h5 class="heading-20"><span class="font-weight-bold">Enrollment Assessment Form</span> (School Year: {{ $school_year }})</h5>
    <hr>

    {{-- Student Details --}}
    <div class="row mt-4">
        <div class="col">
            <p>Name: <span class="details">{{ $student->firstname." ".$student->middlename." ".$student->lastname }}</span></p>
        </div>
        <div class="col-sm-3">
            <p>Grade Level: <span class="details">{{ $grade_level->grade_level }}</span></p>
        </div>
        <div class="col-sm-3">
            <p>Student Type: <span class="details">@if($student->student_type == '0') Old @else New @endif</span></p>
        </div>
    </div>

    <hr>

    {{-- Tuition Fee Details --}}
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Tuition Fees</th>
                <th scope="col">Miscellaneous Fees</th>
                <th scope="col">Others Fees</th>
                <th scope="col">TOTAL FEES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{ $grade_level->tuition_fee }}</td>
                <td>{{ $grade_level->misc_fee }}</td>
                <td>{{ $grade_level->others_fee }}</td>
                <td class="table-total">₱ {{ $grade_level->total_due }}</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

    <hr>

    <form action="{{ route('enroll.store') }}" method="POST">
        {{ csrf_field() }}

        {{-- Terms of Payment --}}
        <div class="form-inline">
            <label class="my-1 mr-2 heading-16 required" for="mop">Terms of Payment: </label>
            <select class="custom-select my-1 mr-sm-2" id="mop" name="mode_of_payment">
                <option selected>Choose Term of Payment</option>
                <option value="full">Full Payment</option>
                <option value="semestral">Installment (Semestral)</option>
                <option value="quarterly">Installment (Quarterly)</option>
                <option value="monthly">Installment (Monthly)</option>
            </select>
        </div>
        {{-- <h6 class="heading-16">Terms of Payment</h6> --}}

        <hr>

        {{-- Full Breakdown --}}
        <div class="row full-breakdown">
            <div class="col-sm-12">
                <h6 class="heading-16 details">Full Payment (UPON ENROLLMENT)
                <span class="note">* Cash Basis 5% discount (tuition fee only)</span></h6>
            </div>

            <div class="col-sm-12 mt-3">
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
                <td>{{ number_format($grade_level->getTuitionDiscount(), 2) }}</td>
                <td>{{ $grade_level->misc_fee }}</td>
                <td>{{ $grade_level->others_fee }}</td>
                <td class="table-total">₱ {{ number_format($grade_level->getTuitionDiscount() + $convert_misc + $convert_others, 2) }}</td>
                </tr>
            </tbody>
            </table>
            </div>
        </div>

        {{-- Semestral Breakdown --}}
        <div class="row semestral-breakdown">
            <div class="col-sm-12">
                <h6 class="heading-16 details">Semestral
                <span class="note">* Due Date: OCTOBER 5</span></h6>
            </div>

            <div class="col-sm-12 mt-3">
            <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                <th scope="col" colspan="2" class="text-center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="semestral_1" name="installment_opt" class="custom-control-input" value="semestral_1">
                        <label class="custom-control-label" for="semestral_1">OPTION 1</label>
                    </div>
                </th>
                <th scope="col" colspan="2" class="text-center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="semestral_2" name="installment_opt" class="custom-control-input" value="semestral_2">
                        <label class="custom-control-label" for="semestral_2">OPTION 2</label>
                    </div>
                </th>
                </tr>
                <tr>
                    <th class="text-center">Upon Enrollment</th>
                    <th class="text-center">2nd Sem</th>
                    <th class="text-center">Upon Enrollment</th>
                    <th class="text-center">2nd Sem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="text-center table-total">{{ $grade_level->semestral_1 }}</td>
                <td class="text-center">{{ number_format($grade_level->getSemestralBal('semestral_1'), 2) }}</td>
                <td class="text-center table-total">{{ $grade_level->semestral_2 }}</td>
                <td class="text-center">{{ number_format($grade_level->getSemestralBal('semestral_2'), 2) }}</td>
                </tr>
            </tbody>
            </table>
            </div>
        </div>

        {{-- Quarterly Breakdown --}}
        <div class="row quarterly-breakdown">
            <div class="col-sm-12">
                <h6 class="heading-16 details">Quarterly
                <span class="note">* Due Date: 5-Aug, 5-Oct, 5-Dec, 5-Feb</span></h6>
            </div>

            <div class="col-sm-12 mt-3">
                <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="quarterly_1" name="installment_opt" class="custom-control-input" value="quarterly_1">
                            <label class="custom-control-label" for="quarterly_1">OPTION 1</label>
                        </div>
                    </div>
                    </th>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="quarterly_2" name="installment_opt" class="custom-control-input" value="quarterly_2">
                            <label class="custom-control-label" for="quarterly_2">OPTION 2</label>
                        </div>
                    </th>
                    </tr>
                    <tr>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per quarter</th>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per quarter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="text-center table-total">{{ $grade_level->quarterly_1 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getQuarterlyBal('quarterly_1'), 2) }}</td>
                    <td class="text-center table-total">{{ $grade_level->quarterly_2 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getQuarterlyBal('quarterly_2'), 2) }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="col-sm-12 mt-3">
                <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="quarterly_3" name="installment_opt" class="custom-control-input" value="quarterly_3">
                            <label class="custom-control-label" for="quarterly_3">OPTION 3</label>
                        </div>
                    </th>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="quarterly_4" name="installment_opt" class="custom-control-input" value="quarterly_4">
                            <label class="custom-control-label" for="quarterly_4">OPTION 4</label>
                        </div>
                    </th>
                    </tr>
                    <tr>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per quarter</th>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per quarter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="text-center table-total">{{ $grade_level->quarterly_3 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getQuarterlyBal('quarterly_3'), 2) }}</td>
                    <td class="text-center table-total">{{ $grade_level->quarterly_4 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getQuarterlyBal('quarterly_4'), 2) }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

        {{-- Monthly Breakdown --}}
        <div class="row monthly-breakdown">
            <div class="col-sm-12">
                <h6 class="heading-16 details">Monthly
                <span class="note">* Due Date: Every 5th of the month</span></h6>
            </div>

            <div class="col-sm-12 mt-3">
                <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="monthly_1" name="installment_opt" class="custom-control-input" value="monthly_1">
                            <label class="custom-control-label" for="monthly_1">OPTION 1</label>
                        </div>
                    </th>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="monthly_2" name="installment_opt" class="custom-control-input" value="monthly_2">
                            <label class="custom-control-label" for="monthly_2">OPTION 2</label>
                        </div>
                    </th>
                    </tr>
                    <tr>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per month</th>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per month</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="text-center table-total">{{ $grade_level->quarterly_1 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getMonthlyBal('monthly_1'), 2) }}</td>
                    <td class="text-center table-total">{{ $grade_level->quarterly_2 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getMonthlyBal('monthly_2'), 2) }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="col-sm-12 mt-3">
                <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="monthly_3" name="installment_opt" class="custom-control-input" value="monthly_3">
                            <label class="custom-control-label" for="monthly_3">OPTION 3</label>
                        </div>  
                    </th>
                    <th scope="col" colspan="2" class="text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="monthly_4" name="installment_opt" class="custom-control-input" value="monthly_4">
                            <label class="custom-control-label" for="monthly_4">OPTION 4</label>
                        </div>
                    </th>
                    </tr>
                    <tr>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per month</th>
                        <th class="text-center">Upon Enrollment</th>
                        <th class="text-center">Per month</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="text-center table-total">{{ $grade_level->quarterly_3 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getMonthlyBal('monthly_3'), 2) }}</td>
                    <td class="text-center table-total">{{ $grade_level->quarterly_4 }}</td>
                    <td class="text-center">{{ number_format($grade_level->getMonthlyBal('monthly_4'), 2) }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="agree_terms" name="agree_terms" value="YES">
            <label class="custom-control-label required" for="agree_terms">I hereby acknowledge that I have <a href="#" id="payment_policy">read and understood the above instructions</a>, promise and pledge to abide by and comply with the regulations governing this institutions.</label>
        </div>

        <div class="row mb-5">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>

@endsection

@push('addscripts')
    <script src="{{ asset('js/enrollment.js')}}"></script>
    <script src="{{ asset('js/modal.js')}}"></script>
@endpush