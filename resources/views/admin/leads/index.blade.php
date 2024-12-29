@extends('layouts.master')

@section('title')
    Leads List
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Leads
        @endslot
        @slot('title')
            Leads List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">

                    @hasrole('Super Admin|Employee')
                        <div class="text-end">
                            <a class="btn btn-primary btn-sm text-light" href="{{ route('leads.create') }}">Add Leads</a>
                        </div>

                        <div class="text-end mx-2">
                            <a class="btn btn-info btn-sm text-light" data-bs-toggle="modal"
                                data-bs-target="#importLeads">Import
                                Leads</a>
                        </div>

                        {{-- import lead --}}
                        <div id="importLeads" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Import Leads</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('leads.import') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="file" class="form-label required">Upload File</label>
                                                        <input type="file" name="file"
                                                            class="form-control @error('file') is-invalid @enderror"
                                                            id="file" required>

                                                        @error('file')
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
                                                class="btn btn-primary waves-effect waves-light">Import</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endhasrole
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($leads as $lead)
                                <tr>
                                    <td>{{ $lead->title }}</td>
                                    <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                    <td>{{ $lead->contact_number }}</td>
                                    <td>
                                        @if ($lead->assignedTo)
                                            {{ $lead->assignedTo->name }}
                                        @else
                                            <span class="text-danger">No User</span>
                                        @endif
                                    </td>
                                    <td>{{ $lead->status }}</td>
                                    <td>
                                        <a href="{{ route('leads.show', $lead->uuid) }}">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-eye btn-action"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('leads.edit', $lead->uuid) }}">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit btn-action"></i>
                                            </button>
                                        </a>
                                    </td>
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
