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
                                    <h5 class="heading-20">Enrollees List</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">School Year</th>
                                        <th scope="col">Terms of Payment</th>
                                        <th scope="col">Paid Upon Enrollment</th>
                                        <th scope="col">Installment Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @if($enrollees)
                                {{-- {{ var_dump($enrollees)}} --}}
                                <tbody>
                                    @foreach($enrollees as $enrollee)
                                    <tr>
                                        <td>{{ $enrollee->student_id }}</td>
                                        <td>{{ $enrollee->getLastName($enrollee->student_id) }}</td>
                                        <td>{{ $enrollee->getFirstName($enrollee->student_id) }}</td>
                                        <td>{{ $enrollee->getMiddleName($enrollee->student_id) }}</td>
                                        <td>{{ $enrollee->school_year }}</td>
                                        <td>{{ ucfirst($enrollee->terms_of_payment) }}</td>
                                        <td>{{ $enrollee->paid_upon_enrollment }}</td>
                                        <td>{{ number_format((float)$enrollee->installment_amount, 2) }}</td>
                                        <td>
                                            <div class="row">
                                                {{-- <button class="btn btn-warning btn-sm"><i class="icon-pencil"></i></button> --}}
                                                <a href="/admin-student/{{$enrollee->student_id}}" class="btn btn-success btn-sm">Student</a>
                                                <form action="{{ route('admin-enrollees.delete', ['admin_enrollee' => $enrollee->id]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="icon-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection