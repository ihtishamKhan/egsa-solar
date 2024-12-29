@extends('layouts.master')

@section('title')
    Create Project
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Projects
        @endslot
        @slot('title')
            Create Project
        @endslot
    @endcomponent

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label required">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Project Title"
                                        value="{{ old('title') }}">

                                    @error('title')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label required">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" placeholder="Project Location"
                                        value="{{ old('location') }}">

                                    @error('location')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="client" class="form-label">Client</label>
                                    <input type="text" class="form-control @error('client') is-invalid @enderror"
                                        id="client" name="client" placeholder="Client Name" value="{{ old('client') }}">
                                    {{-- <select class="form-select @error('client') is-invalid @enderror" id="client"
                                        name="client">
                                        <option value="">Select Client</option>

                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                @if (old('client') == $client->id) selected @endif>
                                                {{ $client->name }}
                                        @endforeach
                                    </select> --}}

                                    @error('client')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="start-date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start-date" name="start_date" value="{{ old('start_date') }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="due-date" class="form-label">Due Date</label>
                                    <input type="date" class="form-control @error('due_date') is-invalid @enderror"
                                        id="due-date" name="due_date" value="{{ old('due_date') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="budget" class="form-label">Budget</label>
                                    <input type="number" class="form-control @error('budget') is-invalid @enderror"
                                        id="budget" name="budget" value="{{ old('budget') }}">

                                    @error('budget')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3">{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection
@section('script')
@endsection
