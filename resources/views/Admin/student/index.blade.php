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
                                <li class="breadcrumb-item active" aria-current="page">Students List</li>
                            </ol>
                        </nav>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20">Students List</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Student Type</th>
                                    <th scope="col">LRN</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>@if($student->student_type == '1') New @else Old @endif</td>
                                    <td>{{ $student->lrn }}</td>
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->firstname }}</td>
                                    <td>{{ $student->middlename }}</td>
                                    <td>
                                        <div class="row">
                                            {{-- <button class="btn btn-warning btn-sm"><i class="icon-pencil"></i></button> --}}
                                            <a href="/admin-student/{{$student->id}}" class="btn btn-success btn-sm"><i class="icon-eye"></i></a>
                                            <a href="/admin-student/{{$student->id}}/edit" class="btn btn-warning btn-sm ml-1"><i class="icon-pencil"></i></a>
                                            <form action="{{ route('student.delete', ['student' => $student->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="icon-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection