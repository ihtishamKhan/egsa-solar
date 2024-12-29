@extends('layouts.master')

@section('title')
    Lead Notes
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Leads
        @endslot
        @slot('title')
            Lead Notes
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
                            data-bs-target="#addNote">Add Note</a>
                    </div>

                    <div id="addNote" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('leads.addNotes', $lead->uuid) }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="note" class="form-label required">Note</label>
                                                    <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" rows="5">{{ old('note') }}</textarea>

                                                    @error('note')
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
                        @if ($lead->notes->count() > 0)
                            @foreach ($lead->notes as $note)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card"
                                            style="border-top: 4px solid #4991fe; box-shadow: 0px 4px 12px 2px rgb(0 0 0 / 14%)">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <div class="conversation-name"
                                                            style="font-size: 16px; font-weight: 500; color: rgb(43, 113, 244);">
                                                            {{ $note->createdBy->name }}
                                                        </div>
                                                        <p class="mb-0">{{ $note->note }}</p>

                                                        <small
                                                            class="text-muted mt-2">{{ $note->created_at->diffForHumans() }}</small>

                                                        {{-- <div class="mt-2">
                                                            <a href="" class="text-danger">Delete</a>

                                                            <a href="" class="text-primary">Edit</a>


                                                        </div> --}}

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <p>No notes found</p>
                            </div>
                        @endif
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
                $('#addNote').modal('show');
            @endif
        });
    </script>
@endsection
