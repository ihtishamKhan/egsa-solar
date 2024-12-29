@extends('layouts.master')

@section('title')
    Expenses List
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Expenses
        @endslot
        @slot('title')
            Expenses List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">
                    <div class="text-end mx-3">
                        <a class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#add-expense">Add Expense</a>
                    </div>

                    {{-- add expense --}}
                    <div id="add-expense" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('projects.expenses.store', $project->slug) }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label required">Description</label>
                                                    <textarea name="description" class="form-control @error('category') is-invalid @enderror" id="description"
                                                        cols="30" rows="2" required>{{ old('description') }}</textarea>

                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label required">Amount</label>
                                                    <input name="amount" type="number"
                                                        class="form-control @error('amount') is-invalid @enderror"
                                                        id="amount" value="{{ old('amount') }}" required>

                                                    @error('amount')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="date" class="form-label required">Date</label>
                                                    <input name="date" type="date"
                                                        class="form-control @error('date') is-invalid @enderror"
                                                        id="date" value="{{ old('date') }}" required>

                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($project->expenses as $expense)
                                <tr>
                                    <td>{{ $expense->description }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->date->format('d M, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
