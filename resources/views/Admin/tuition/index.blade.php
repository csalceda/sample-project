@extends('layouts.admin_layout')

@section('content')

    {{-- Admin --}}
<div id="tuition" class="block mt-20 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="tuition_display" class="block mb-80">
                    <div class="container">
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tuition Fees Details</li>
                            </ol>
                        </nav>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-10 col-12">
                                    <h5 class="heading-20">Tuition Fees Details</h5>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <a href="/admin-tuition/create" class="btn btn-primary pull-right">Add<i class="icon-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Grade Level</th>
                                <th scope="col">Tuition Fee</th>
                                <th scope="col">Miscellaneous Fee</th>
                                <th scope="col">Others Fee</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tuition_details as $tuition_detail)
                                    <tr>
                                        <th scope="row">{{ $tuition_detail->grade_level }}</th>
                                        <td>{{ $tuition_detail->tuition_fee }}</td>
                                        <td>{{ $tuition_detail->misc_fee }}</td>
                                        <td>{{ $tuition_detail->others_fee }}</td>
                                        <td class="text-success font-weight-bold">{{ $tuition_detail->total_due }}</td>
                                        <td>
                                            <div class="row">
                                                {{-- <button class="btn btn-warning btn-sm"><i class="icon-pencil"></i></button> --}}
                                                <a href="/admin-tuition/{{$tuition_detail->id}}/edit" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                                <form action="{{ route('tuition.delete', ['tuition' => $tuition_detail->id]) }}" method="post">
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