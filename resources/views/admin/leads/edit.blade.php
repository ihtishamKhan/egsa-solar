@extends('layouts.master')

@section('title')
    Create Lead
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Leads
        @endslot
        @slot('title')
            Update Lead
        @endslot
    @endcomponent

    @include('layouts.alerts.messages')


    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-4">Form Grid Layout</h4> --}}

                    <form method="POST" action="{{ route('leads.update', $lead->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label required">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Lead title" value="{{$lead->title}}">

                                    @error('title')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label required">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="firstName" name="first_name" placeholder="Enter first name" value="{{$lead->first_name}}">

                                    @error('first_name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label required">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="firstName" name="last_name" placeholder="Enter last name" value="{{$lead->last_name}}">

                                    @error('last_name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contactNumber" class="form-label required">Contact Number</label>
                                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                                        id="contactNumber" name="contact_number" placeholder="Contact number" value="{{$lead->contact_number}}">

                                    @error('contact_number')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="additionalNumber" class="form-label">Additional Number</label>
                                    <input type="text"
                                        class="form-control @error('additional_number') is-invalid @enderror"
                                        id="additionalNumber" name="additional_number" placeholder="Additional number" value="{{$lead->additional_number}}">

                                    @error('additional_number')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="leadStatus" class="form-label">Status</label>
                                    <select id="leadStatus" name="status" class="form-select" @readonly(true) >
                                        <option value="">Select Status</option>
                                        <option value="Fresh" {{ $lead->status == "Fresh" ? 'selected' : '' }}>Fresh
                                        </option>
                                        <option value="Site Survey Done"
                                        {{ $lead->status == "Site Survey Done" ? 'selected' : '' }}>Site Survey Done
                                        </option>
                                        <option value="Engineering Design"
                                        {{ $lead->status == "Engineering Design" ? 'selected' : '' }}>Engineering Design
                                        </option>
                                        <option value="Proposal Sent" value='selected'
                                        {{ $lead->status == "Proposal Sent" ? 'selected' : '' }}>
                                            Proposal Sent
                                        </option>
                                        <option value="Commercials Finalized" select
                                            {{ $lead->status == 'Commercials Finalized' ? 'selected' : '' }}>
                                            Commercials Finalized
                                        </option>
                                        <option value="PO Received" {{ $lead->status == 'PO Received' ? 'selected' : '' }}>
                                            PO Received
                                        </option>
                                        <option value="Cold" {{ $lead->status == 'Cold' ? 'selected' : '' }}>Cold
                                        </option>
                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="assignTo" class="form-label">Assign to</label>
                                    <select id="assignTo" name="assign_to" class="form-select">
                                        <option value="{{ null }}">Choose</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"  {{ $lead->assigned_to === $employee->id ? 'selected' : '' }}
                                                >{{ $employee->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
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
