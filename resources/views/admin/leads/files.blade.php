@extends('layouts.master')

@section('title')
    Lead Details
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Leads
        @endslot
        @slot('title')
            Lead Details
        @endslot
    @endcomponent

    @include('layouts.leads-menu')
    @include('layouts.alerts.messages')

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="d-flex justify-content-end align-items-center p-2">
                    <div class="text-end mx-3">
                        <a class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#addFiles">Add Files</a>
                    </div>

                    <div id="addFiles" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Files</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('leads.addFiles', $lead->uuid) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="files" class="form-label required">Upload Files</label>
                                                    <input type="file" name="files[]"
                                                        class="form-control @error('files') is-invalid @enderror"
                                                        id="files" value="{{ old('files') }}">

                                                    @error('files')
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Size</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lead->files as $file)
                                        <tr>
                                            <td>{{ $file->filename }}</td>
                                            <td>{{ $file->size }}</td>
                                            <td>{{ $file->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ $fileService->getFileUrl($file) }}"
                                                    class="btn btn-primary btn-sm text-light"
                                                    download="{{ $file->filename }}">
                                                    <i class="fas fa-download"></i>
                                                </a>

                                                {{-- <a href="{{ route('leads.deleteFile', $file->uuid) }}"
                                                    class="btn btn-danger btn-sm text-light">Delete</a> --}}
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
@section('script')
    <script>
        $(document).ready(function() {
            // if validation error exists
            @if ($errors->any())
                $('#addFiles').modal('show');
            @endif
        });
    </script>
@endsection
