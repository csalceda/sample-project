@extends('layouts.admin_layout')

@section('content')

<div id="add_tuition" class="block mt-20 mb-80">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item"><a href="/admin-tuition">Tuition Fees Details</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Tuition Fees Details</li>
                </ol>
            </nav>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {{-- <div class="row">
                <div class="col-sm-10 col-12">
                    <h5 class="heading-20"><i class="icon-plus"></i> Add Tuition Details </h5>
                </div>
                <div class="col-sm-2 col-12">
                    <button type="button" class="btn btn-primary pull-right"  class="btn btn-primary">Add <i class="icon-plus"></i></button>
                </div>
            </div> --}}
            
            <h5 class="heading-20"><i class="icon-plus"></i> Add Tuition Details </h5>
            <hr>

            {{-- Add Tuition Form --}}

            <form action="{{route('tuition.store')}}" method="post">
                {{ csrf_field() }}
                <div class="container mt-30">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="grade" class="required">{{ __('Grade Level') }}</label>

                                <div class="col">
                                    <select name="grade" id="grade" class="form-control" required>
                                        <option value="Nursery">Nursery</option>
                                        <option value="Kinder I">Kinder I</option>
                                        <option value="Kinder II">Kinder II</option>
                                        <option value="Grade 1">Grade 1</option>
                                        <option value="Grade 2">Grade 2</option>
                                        <option value="Grade 3">Grade 3</option>
                                        <option value="Grade 4">Grade 4</option>
                                        <option value="Grade 5">Grade 5</option>
                                        <option value="Grade 6">Grade 6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="total_fee" class="required">{{ __('Total Fee')}}</label>

                                <div class="col">
                                    <input type="text" class="form-control total_amount" name="total_fee" id="total_fee" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tuition_fee" class="col-md-4 col-form-label text-md-right required">{{ __('Tuition Fee')}}</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control tuition" step="any" name="tuition_fee" id="tuition_fee" placeholder="Tuition Fee" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="misc_fee" class="col-md-4 col-form-label text-md-right required">{{ __('Miscellaneous Fee')}}</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control tuition" step="any" name="misc_fee" id="misc_fee" placeholder="Miscellaneous Fee" required>
                        </div>
                    </div>

                    <div class="form-group row mb-50">
                        <label for="others_fee" class="col-md-4 col-form-label text-md-right required">{{ __('Others Fee')}}</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control tuition" step="any" name="others_fee" id="others_fee" placeholder="Others Fee" required>
                        </div>
                    </div>
                    
                    <hr>
                    {{-- Payment Options --}}
                    <h5 class="heading-20 ">Payment Options <span class="note">(Enter amount to be paid upon enrollment)</span></h5>
                    <hr>
                    <div class="container">
                        {{-- Semestral --}}
                        <div class="row">
                            <p class="details">Installment (Semestral)</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="sem_1">Option 1</label>
                                    <div class="col">
                                        <input type="number" name="semestral_1" id="semestral_1" step="any" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="sem_2">Option 2</label>
                                    <div class="col">
                                        <input type="number" name="semestral_2" id="semestral_2" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Quarterly --}}
                        <div class="row mt-30">
                            <p class="details">Installment (Quarterly)</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="quarterly_1">Option 1</label>
                                    <div class="col">
                                        <input type="number" name="quarterly_1" id="quarterly_1" step="any" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="quarterly_2">Option 2</label>
                                    <div class="col">
                                        <input type="number" name="quarterly_2" id="quarterly_2" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="quarterly_3">Option 3</label>
                                    <div class="col">
                                        <input type="number" name="quarterly_3" id="quarterly_3" step="any" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="quarterly_4">Option 4</label>
                                    <div class="col">
                                        <input type="number" name="quarterly_4" id="quarterly_4" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Monthly --}}
                        <div class="row mt-30">
                            <p class="details">Installment (Monthly)</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="monthly_1">Option 1</label>
                                    <div class="col">
                                        <input type="number" name="monthly_1" id="monthly_1" step="any" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="monthly_2">Option 2</label>
                                    <div class="col">
                                        <input type="number" name="monthly_2" id="monthly_2" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="monthly_3">Option 3</label>
                                    <div class="col">
                                        <input type="number" name="monthly_3" id="monthly_3" step="any" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="monthly_4">Option 4</label>
                                    <div class="col">
                                        <input type="number" name="monthly_4" id="monthly_4" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row float-right">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="javascript:history.back()" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Go Back</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@push('addscripts')
    <script src="{{ asset('js/add_tuition.js')}}"></script>
@endpush