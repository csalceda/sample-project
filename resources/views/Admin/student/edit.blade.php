@extends('layouts.admin_layout')

@section('content')

<div id="student" class="block mt-20 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="student" class="block mb-80">
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item"><a href="/admin-students">Students List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <form method="POST" action="{{route('student.update', ['student' => $student->id])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                        <h5 class="heading-20">Edit Profile Information</h5>
                                        <hr>

                                        <div class="form-row">
                                            <div class="form-group mb-1">
                                                <label for="student_type" class="required">{{ __('Student Type')}}</label>
                                                <div class="col-md-4 mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="student_type" id="old" value="0">
                                                        <label class="form-check-label">Old</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="student_type" id="new" value="1">
                                                        <label class="form-check-label">New</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="grade" class="required">{{ __('Grade Level')}}</label>
                                                <select name="grade" id="grade" class="form-control">
                                                    @if($tuition_fees)
                                                        @foreach($tuition_fees as $tuition_fee)
                                                            <option value="{{ $tuition_fee->id }}">{{ $tuition_fee->grade_level }}</option>
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
                                            <input type="number" class="form-control lrn_input" name="lrn" id="lrn" placeholder="{{ $student->lrn }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="firstname" class="required">First name</label>
                                                <input type="text" class="form-control" name="firstname" placeholder="{{ $student->firstname }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="middlename" class="required">Middle name</label>
                                                <input type="text" class="form-control" name="middlename" placeholder="{{ $student->middlename }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="lastname" class="required">Last name</label>
                                                <input type="text" class="form-control" name="lastname" placeholder="{{ $student->lastname }}">
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <h5 class="heading-20">More Information</h5>
                                        <hr>

                                        <div class="form-row mt-3">
                                            <div class="col-md-4 mb-1">
                                                <label for="sreet_address" class="required">Address</label>
                                                <input type="text" class="form-control" name="street_address" placeholder="{{ $student->street_address }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="barangay" class="required">Barangay</label>
                                                <input type="text" class="form-control" name="barangay" placeholder="{{ $student->barangay }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="city" class="required">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="{{ $student->city }}">
                                            </div>
                                        </div>

                                        <div class="form-row mt-3">
                                            <div class="col-md-4 mb-1">
                                                <label for="birthplace" class="required">Place of Birth</label>
                                                <input type="text" class="form-control" name="birthplace" placeholder="{{ $student->birthplace }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="birthday" class="required">Date of Birth</label>
                                                <input type="date" class="form-control" name="birthday">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="gender" class="required">Sex</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row mt-3">
                                            <div class="col-md-6 mb-1">
                                                <label for="nationality">Nationality</label>
                                                <input type="text" class="form-control" name="nationality" placeholder="{{ $student->nationality }}">
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <label for="religion">Religion</label>
                                                <input type="text" class="form-control" name="religion" placeholder="{{ $student->religion }}">
                                            </div>
                                        </div>

                                        <div class="form-row mt-3">
                                            <div class="col-md-4 mb-1">
                                                <label for="prev_school">Last School Attended</label>
                                                <input type="text" class="form-control" name="prev_school" placeholder="{{ $student->previous_school }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="prev_grade_level">Grade Level</label>
                                                <input type="text" class="form-control" name="prev_grade_level" placeholder="{{ $student->previous_grade_level }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="prev_school_yr" class="required">School Year</label>
                                                <input type="text" class="form-control" name="prev_school_yr" placeholder="{{ $student->previous_school_year }}">
                                            </div>
                                        </div>

                                        <div class="form-row mt-3 mb-4">
                                            <div class="col mb-1">
                                                <label for="prev_school_add">{{ __('School Address')}}</label>
                                                <input type="text" class="form-control" name="prev_school_add" placeholder="{{ $student->previous_school_address }}">
                                            </div>
                                        </div>

                                        <hr>
                                        <h5 class="heading-20">Father's Information</h5>
                                        <hr>

                                        <div class="form-row mt-3">
                                            <div class="col-md-4 mb-1">
                                                <label for="father">Father's Name</label>
                                                <input type="text" class="form-control" name="father" placeholder="{{ $student->father }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="father_occupation">Occupation</label>
                                                <input type="text" class="form-control" name="father_occupation" placeholder="{{ $student->father_occupation }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="father_tel_no">Telephone Number</label>
                                                <input type="text" class="form-control" name="father_tel" placeholder="{{ $student->father_tel }}">
                                            </div>
                                        </div>

                                        <div class="form-row mt-3 mb-4">
                                            <div class="col-md-4 mb-1">
                                                <label for="father_cp">Cellphone Number</label>
                                                <input type="text" class="form-control" name="father_cp" placeholder="{{ $student->father_cellphone }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="father_email">E-Mail</label>
                                                <input type="email" class="form-control" name="father_email" placeholder="{{ $student->father_email }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="father_busadd">Business/Employment Address</label>
                                                <input type="text" class="form-control" name="father_busadd" placeholder="{{ $student->father_occupation_address }}">
                                            </div>
                                        </div>

                                        <hr>
                                        <h5 class="heading-20">Mother's Information</h5>
                                        <hr>

                                        <div class="form-row mt-3">
                                            <div class="col-md-4 mb-1">
                                                <label for="mother">Mother's Name</label>
                                                <input type="text" class="form-control" name="mother" placeholder="{{ $student->mother }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="mother_occupation">Occupation</label>
                                                <input type="text" class="form-control" name="mother_occupation" placeholder="{{ $student->mother_occupation }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="mother_tel">Telephone Number</label>
                                                <input type="text" class="form-control" name="mother_tel" placeholder="{{ $student->mother_tel }}">
                                            </div>
                                        </div>

                                        <div class="form-row mt-3 mb-4">
                                            <div class="col-md-4 mb-1">
                                                <label for="mother_cp">Cellphone Number</label>
                                                <input type="text" class="form-control" name="mother_cp" placeholder="{{ $student->mother_cellphone }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="mother_email">E-Mail</label>
                                                <input type="email" class="form-control" name="mother_email" placeholder="{{ $student->mother_email }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="mother_busadd">Business/Employment Address</label>
                                                <input type="text" class="form-control" name="mother_busadd" placeholder="{{ $student->mother_occupation_address }}">
                                            </div>
                                        </div>

                                        <hr>
                                        <h5 class="heading-20">Guardian's Information</h5>
                                        <hr>

                                        <div class="form-row mt-3">
                                            <div class="col-md-4 mb-1">
                                                <label for="guardian">Guardian's Name</label>
                                                <input type="text" class="form-control" name="guardian" placeholder="{{ $student->guardian }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="guardian_occupation">Occupation</label>
                                                <input type="text" class="form-control" name="guardian_occupation" placeholder="{{ $student->guardian_occupation }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="guardian_tel">Telephone Number</label>
                                                <input type="text" class="form-control" name="guardian_tel" placeholder="{{ $student->guardian_tel }}">
                                            </div>
                                        </div>

                                        <div class="form-row mt-3 mb-4">
                                            <div class="col-md-4 mb-1">
                                                <label for="guardian_cp">Cellphone Number</label>
                                                <input type="text" class="form-control" name="guardian_cp" placeholder="{{ $student->guardian_cellphone }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="guardian_email">E-Mail</label>
                                                <input type="email" class="form-control" name="guardian_email" placeholder="{{ $student->guardian_email }}">
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label for="guardian_busadd">Business/Employment Address</label>
                                                <input type="text" class="form-control" name="guardian_busadd" placeholder="{{ $student->guardian_occupation_address }}">
                                            </div>
                                        </div>

                                        <div class="row float-right">
                                            <div class="col">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <a href="javascript:history.back()" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Go Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>

@endsection