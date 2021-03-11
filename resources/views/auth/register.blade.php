@extends('layouts.app')

@section('content')
<div class="container mt-30 pb-50">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Register --}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h5 class="heading-20">Student Registration</h5>
        <hr>

        <div class="form-row">
            <div class="form-group mb-1">
                <label for="student_type" class="required">{{ __('Student Type')}}</label>
                <div class="col mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="student_type" id="old" value="0">
                        <label class="form-check-label" for="old">Old</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="student_type" id="new" value="1">
                        <label class="form-check-label" for="new">New</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <label for="grade" class="required">{{ __('Grade Level')}}</label>
                <select name="grade" id="grade" class="form-control" required>
                    @if($tuition_fees)
                        @foreach($tuition_fees as $tuition_fee)
                            <option value="{{ $tuition_fee->id }}" {{ old('grade') == $tuition_fee->id ? 'selected' : '' }}>{{ $tuition_fee->grade_level }}</option>
                        {{-- <option value="Kindergarten">Kindergarten</option>
                        <option value="Preparatory">Preparatory</option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option> --}}
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4 mb-1">
                <label for="lrn" class="required lrn_input">LRN</label>
                <input type="number" class="form-control lrn_input" name="lrn" id="lrn" value="{{ old('lrn') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="firstname" class="required">First name</label>
                <input type="text" class="form-control" name="firstname" placeholder="First name" value="{{ old('firstname') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="middlename" class="required">Middle name</label>
                <input type="text" class="form-control" name="middlename" placeholder="Last name" value="{{ old('middlename') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="lastname" class="required">Last name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last name" value="{{ old('lastname') }}" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <hr>
        <h5 class="heading-20">Credentials Submitted</h5>
        <hr> 
        
        <div class="form-row mx-auto">
            <div class="col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="birth_cert" name="birth_cert" value="Birth Certificate">
                    <label class="form-check-label font-weight-bold" for="birth_cert">Birth Certificate</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="form_138" name="form_138" value="Form 138">
                    <label class="form-check-label font-weight-bold" for="form_138">Form 138 - Report Card</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="form_137" name="form_137" value="Form 137" >
                    <label class="form-check-label font-weight-bold" for="form_137">Form 137 - Permanent Record</label>
                </div>
            </div>
        </div>

        <div class="form-row mx-auto">
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="good_moral" name="good_moral" value="Good Moral" >
                    <label class="form-check-label font-weight-bold" for="good_moral">Certificate of Good Moral Character</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="id_pic" name="id_pic" value="ID Pictures" >
                    <label class="form-check-label font-weight-bold" for="id_pic">2 X 2 COLORED ID PIC. 2 pcs w/ White Background</label>
                </div>
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col">
                <label for="others">Others (please specify):</label>
                <input type="text" class="form-control" name="other_req">
            </div>
        </div>
        
        <hr>
        <h5 class="heading-20">More Information</h5>
        <hr>

        <div class="form-row mt-3">
            <div class="col-md-4 mb-1">
                <label for="sreet_address" class="required">Address</label>
                <input type="text" class="form-control" name="street_address" placeholder="123 Main St." value="{{ old('street_address') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="barangay" class="required">Barangay</label>
                <input type="text" class="form-control" name="barangay" placeholder="Barangay" value="{{ old('barangay') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="city" class="required">City</label>
                <input type="text" class="form-control" name="city" placeholder="City" value="{{ old('city') }}">
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-md-4 mb-1">
                <label for="birthplace" class="required">Place of Birth</label>
                <input type="text" class="form-control" name="birthplace" placeholder="Place of Birth" value="{{ old('birthplace') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="birthday" class="required">Date of Birth</label>
                <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="gender" class="required">Sex</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="male" {{ old('gender') == "male" ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == "female" ? 'selected' : '' }}>Female</option>
                </select>
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-md-6 mb-1">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control" name="nationality" placeholder="Nationality" value="{{ old('nationality') }}">
            </div>
            <div class="col-md-6 mb-1">
                <label for="religion">Religion</label>
                <input type="text" class="form-control" name="religion" placeholder="Religion" value="{{ old('religion') }}">
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-md-4 mb-1">
                <label for="prev_school">Last School Attended</label>
                <input type="text" class="form-control" name="prev_school" placeholder="Previous School" value="{{ old('prev_school') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="prev_grade_level">Grade Level</label>
                <input type="text" class="form-control" name="prev_grade_level" placeholder="Previous Grade Level" value="{{ old('prev_garde_level') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="prev_school_yr" class="required">School Year</label>
                <input type="text" class="form-control" name="prev_school_yr" placeholder="School Year" value="{{ old('prev_school_yr') }}">
            </div>
        </div>

        <div class="form-row mt-3 mb-4">
            <div class="col mb-1">
                <label for="prev_school_add">{{ __('School Address')}}</label>
                <input type="text" class="form-control" name="prev_school_add" placeholder="Previous School Address" value="{{ old('prev_school_add') }}">
            </div>
        </div>

        <hr>
        <h5 class="heading-20">Father's Information</h5>
        <small>* Please leave the form blank if not applicable.</small>
        <hr>

        <div class="form-row mt-3">
            <div class="col-md-4 mb-1">
                <label for="father">Father's Name</label>
                <input type="text" class="form-control" name="father" placeholder="Father's Name" value="{{ old('father') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="father_occupation">Occupation</label>
                <input type="text" class="form-control" name="father_occupation" placeholder="Father's Occupation" value="{{ old('father_occupation') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="father_tel_no">Telephone Number</label>
                <input type="text" class="form-control" name="father_tel" placeholder="Telephone Number" value="{{ old('father_tel') }}">
            </div>
        </div>

        <div class="form-row mt-3 mb-4">
            <div class="col-md-4 mb-1">
                <label for="father_cp">Cellphone Number</label>
                <input type="text" class="form-control" name="father_cp" placeholder="09XXXXXXXXX" value="{{ old('father_cp') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="father_email">E-Mail</label>
                <input type="email" class="form-control" name="father_email" placeholder="Father's Email" value="{{ old('father_email') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="father_busadd">Business/Employment Address</label>
                <input type="text" class="form-control" name="father_busadd" placeholder="Business Address" value="{{ old('father_busadd') }}">
            </div>
        </div>

        <hr>
        <h5 class="heading-20">Mother's Information</h5>
        <small>* Please leave the form blank if not applicable.</small>
        <hr>

        <div class="form-row mt-3">
            <div class="col-md-4 mb-1">
                <label for="mother">Mother's Name</label>
                <input type="text" class="form-control" name="mother" placeholder="Mother's Name" value="{{ old('mother') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="mother_occupation">Occupation</label>
                <input type="text" class="form-control" name="mother_occupation" placeholder="Mother's Occupation" value="{{ old('mother_occupation') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="mother_tel">Telephone Number</label>
                <input type="text" class="form-control" name="mother_tel" placeholder="Telephone Number" value="{{ old('mother_tel') }}">
            </div>
        </div>

        <div class="form-row mt-3 mb-4">
            <div class="col-md-4 mb-1">
                <label for="mother_cp">Cellphone Number</label>
                <input type="text" class="form-control" name="mother_cp" placeholder="09XXXXXXXXX" value="{{ old('mother_cp') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="mother_email">E-Mail</label>
                <input type="email" class="form-control" name="mother_email" placeholder="Mother's Email" value="{{ old('mother_email') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="mother_busadd">Business/Employment Address</label>
                <input type="text" class="form-control" name="mother_busadd" placeholder="Business Address" value="{{ old('mother_busadd') }}">
            </div>
        </div>

        <hr>
        <h5 class="heading-20">Guardian's Information</h5>
        <small>* Please leave the form blank if not applicable.</small>
        <hr>

        <div class="form-row mt-3">
            <div class="col-md-4 mb-1">
                <label for="guardian">Guardian's Name</label>
                <input type="text" class="form-control" name="guardian" placeholder="Guardian's Name" value="{{ old('guardian') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="guardian_occupation">Occupation</label>
                <input type="text" class="form-control" name="guardian_occupation" placeholder="Guardian's Occupation" value="{{ old('guardian_occupation') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="guardian_tel">Telephone Number</label>
                <input type="text" class="form-control" name="guardian_tel" placeholder="Telephone Number" value="{{ old('guardian_tel') }}">
            </div>
        </div>

        <div class="form-row mt-3 mb-4">
            <div class="col-md-4 mb-1">
                <label for="guardian_cp">Cellphone Number</label>
                <input type="text" class="form-control" name="guardian_cp" placeholder="09XXXXXXXXX" value="{{ old('guardian_cp') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="guardian_email">E-Mail</label>
                <input type="email" class="form-control" name="guardian_email" placeholder="Guardian's Email" value="{{ old('guardian_email') }}">
            </div>
            <div class="col-md-4 mb-1">
                <label for="guardian_busadd">Business/Employment Address</label>
                <input type="text" class="form-control" name="guardian_busadd" placeholder="Business Address" value="{{ old('guardian_busadd') }}">
            </div>
        </div>

        <div class="form-row mt-3 mb-4">
            <div class="col">
                * By clicking Register, you agree to our <a href="#" id="info_terms">Terms and have read our Student Information Policy.</a>
            </div>
        </div>

        {{-- First Row --}}
        {{-- <div class="row">
            <label for="student_type" class="required mr-3">{{ __('Student Type')}}</label>
            <label for="old" class="mr-3"><input class="student_type" type="radio" name="student_type" id="old" value="0">Old</label>
            <label for="new"><input class="student_type" type="radio" name="student_type" id="new" value="1">New</label>

            <div class="col">
                <label for="grade" class="required">{{ __('Grade Level') }}</label>
                <select name="grade" id="grade" class="form-control" required>
                    <option value="nursery">Nursery</option>
                    <option value="kindergarten">Kindergarten</option>
                    <option value="preparatory">Preparatory</option>
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                    <option value="4">Grade 4</option>
                    <option value="5">Grade 5</option>
                    <option value="6">Grade 6</option>
                </select>
            </div>
        </div>--}}

        <div class="form-group row mb-0">
            <div class="col-md-6 pull-right">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('addscripts')
    <script src="{{ asset('js/register.js')}}"></script>
    <script src="{{ asset('js/modal.js')}}"></script>
@endpush