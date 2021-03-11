@extends('layouts.admin_layout')

@section('content')

<div id="messages" class="block mt-20 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="student_display" class="block mb-80">
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Messages</li>
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
                                    <h5 class="heading-20">Messages</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sender</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Received</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}">
                                            {{ $contact->email }}
                                        </a>
                                    </td>
                                    <td>{{ substr($contact->message, 0, 25)."..." }}</td>
                                    <td>{{date("F j, Y h:i:sa", strtotime($contact->created_at))}}</td>
                                    <td>
                                        <div class="row">
                                            {{-- <button class="btn btn-warning btn-sm"><i class="icon-pencil"></i></button> --}}
                                            <a href="/admin-contact/{{$contact->id}}" class="btn btn-success btn-sm"><i class="icon-eye"></i></a>
                                            <form action="{{ route('admin-contact.delete', ['admin_contact' => $contact->id]) }}" method="post">
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