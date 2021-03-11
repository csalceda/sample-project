@extends('layouts.admin_layout')

@section('content')

<div id="student_list" class="block mt-20 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="student_display" class="block mb-80">
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item"><a href="/admin-students">Students List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $student->firstname." ".$student->middlename." ".$student->lastname }}</li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20 font-weight-bold">Student Profile</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Student Number: <span class="details">{{ $student->id }}</span></p>
                            </div>
                            @if($student->lrn == "null")
                                <div class="col">
                                    <p>LRN: <span class="details">{{ $student->lrn }}</span></p>
                                </div>
                            @endif
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Name: <span class="details">{{ $student->firstname." ".$student->middlename." ".$student->lastname }}</span></p>
                            </div>
                             <div class="col-sm-3">
                                <p>Grade Level: <span class="details">{{ $grade->getGradeLevel() }}</span></p>
                            </div>
                            <div class="col-sm-3">
                                <p>Student Type: <span class="details">@if($student->student_type == '0') Old @else New @endif</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Address: <span class="details">{{ $student->street_address }}</span></p>
                            </div>
                            <div class="col">
                                <p>Barangay: <span class="details">{{ $student->barangay }}</span></p>
                            </div>
                            <div class="col">
                                <p>City: <span class="details">{{ $student->city }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Birthday: <span class="details">{{ date("F j, Y", strtotime($student->birthday)) }}</span></p>
                            </div>
                            <div class="col">
                                <p>Age: <span class="details">{{ $student->age }}</span></p>
                            </div>
                            <div class="col">
                                <p>Place of Birth: <span class="details">{{ $student->birthplace }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Nationality: <span class="details">{{ $student->nationality }}</span></p>
                            </div>
                            <div class="col">
                                <p>Religion: <span class="details">{{ $student->religion }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Last School Attended: <span class="details">{{ $student->previous_school }}</span></p>
                            </div>
                            <div class="col">
                                <p>Grade Level: <span class="details">{{ $student->previous_grade_level }}</span></p>
                            </div>
                            <div class="col">
                                <p>School Year Attended: <span class="details">{{ $student->previous_school_year }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>School Address: <span class="details"></span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20 font-weight-bold">Credentials Submitted</h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                            @if($credentials)
                                @foreach($credentials as $credential)
                                    <ul>
                                        @if($credential != null)
                                            <li>{{ $credential }}</li>
                                        @endif
                                    </ul>
                                @endforeach
                            @else
                            <ul>
                                <li>None</li>
                            </ul>
                            @endif

                        <hr>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20 font-weight-bold">Father's Information</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Father's Name: <span class="details">{{ $student->father }}</span></p>
                            </div>
                            <div class="col">
                                <p>Father's Occupation: <span class="details">{{ $student->father_occupation }}</span></p>
                            </div>
                            <div class="col">
                                <p>Telephone No.: <span class="details">{{ $student->father_tel }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Cellphone No.: <span class="details">{{ $student->father_cellphone }}</span></p>
                            </div>
                            <div class="col">
                                <p>Email: <span class="details"><a href="mailto:{{$student->father_email}}">{{ $student->father_email }}</a></span></p>
                            </div>
                            <div class="col">
                                <p>Business/Employment Address: <span class="details">{{ $student->father_busadd }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20 font-weight-bold">Mother's Information</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Mother's Name: <span class="details">{{ $student->mother }}</span></p>
                            </div>
                            <div class="col">
                                <p>Mother's Occupation: <span class="details">{{ $student->mother_occupation }}</span></p>
                            </div>
                            <div class="col">
                                <p>Telephone No.: <span class="details">{{ $student->mother_tel }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Cellphone No.: <span class="details">{{ $student->mother_cellphone }}</span></p>
                            </div>
                            <div class="col">
                            <p>Email: <span class="details"><a href="mailto:{{$student->mother_email}}">{{ $student->mother_email }}</a></span></p>
                            </div>
                            <div class="col">
                                <p>Business/Employment Address: <span class="details">{{ $student->mother_busadd }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20 font-weight-bold">Guardian's Information</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Guardian's Name: <span class="details">{{ $student->guardian }}</span></p>
                            </div>
                            <div class="col">
                                <p>Guardian's Occupation: <span class="details">{{ $student->guardian_occupation }}</span></p>
                            </div>
                            <div class="col">
                                <p>Telephone No.: <span class="details">{{ $student->guardian_tel }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Cellphone No.: <span class="details">{{ $student->guardian_cellphone }}</span></p>
                            </div>
                            <div class="col">
                            <p>Email: <span class="details"><a href="mailto:{{$student->guardian_email}}">{{ $student->guardian_email }}</a></span></p>
                            </div>
                            <div class="col">
                                <p>Business/Employment Address: <span class="details">{{ $student->guardian_busadd }}</span></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row float-right">
                            <div class="col">
                                <a href="/admin-student/{{$student->id}}/edit" class="btn btn-warning">Edit</a>
                                <a href="javascript:history.back()" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Go Back</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection