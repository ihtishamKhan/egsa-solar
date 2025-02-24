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

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $lead->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company</th>
                                            <td>{{ $lead->company }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number</th>
                                            <td>{{ $lead->contact_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Additional Number</th>
                                            <td>{{ $lead->additional_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $lead->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Street</th>
                                            <td>{{ $lead->street_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td>{{ $lead->postal_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{ $lead->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>Latitude</th>
                                            <td>{{ $lead->latitude }}</td>
                                        </tr>
                                        <tr>
                                            <th>Longitude</th>
                                            <td>{{ $lead->longitude }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="leadStatus" class="form-label">Status</label>
                                <select class="form-select" id="leadStatus" name="status">
                                    <option value="">Select Status</option>
                                    <option value="Fresh" {{ $lead->status == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                                    <option value="Site Survey Done"
                                        {{ $lead->status == 'Site Survey Done' ? 'selected' : '' }}>Site Survey Done
                                    </option>
                                    <option value="Engineering Design"
                                        {{ $lead->status == 'Engineering Design' ? 'selected' : '' }}>Engineering Design
                                    </option>
                                    <option value="Proposal Sent" {{ $lead->status == 'Proposal Sent' ? 'selected' : '' }}>
                                        Proposal Sent
                                    </option>
                                    <option value="Commercials Finalized"
                                        {{ $lead->status == 'Commercials Finalized' ? 'selected' : '' }}>
                                        Commercials Finalized
                                    </option>
                                    <option value="PO Received" {{ $lead->status == 'PO Received' ? 'selected' : '' }}>
                                        PO Received
                                    </option>
                                    <option value="Cold" {{ $lead->status == 'Cold' ? 'selected' : '' }}>Cold</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nextAction" class="form-label">Next Action</label>
                                <select class="form-select" id="nextAction" name="next_action">
                                    <option value="">Select Next Action</option>
                                    <option value="Site Survey"
                                        {{ $lead->next_action == 'Site Survey' ? 'selected' : '' }}>
                                        Site Survey
                                    </option>
                                    <option value="Engineering Design"
                                        {{ $lead->next_action == 'Engineering Design' ? 'selected' : '' }}>
                                        Engineering Design
                                    </option>
                                    <option value="Proposal" {{ $lead->next_action == 'Proposal' ? 'selected' : '' }}>
                                        Proposal
                                    </option>
                                    <option value="Commercials"
                                        {{ $lead->next_action == 'Commercials' ? 'selected' : '' }}>
                                        Commercials
                                    </option>
                                    <option value="PO" {{ $lead->next_action == 'PO' ? 'selected' : '' }}>PO</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nextActionDate" class="form-label">Next Action Date</label>
                                <input type="date" class="form-control" id="nextActionDate" name="next_action_date"
                                    value="{{ $lead->next_action_date }}">
                            </div>

                            <div class="mb-3">
                                <label for="nextActionOwner" class="form-label">Next Action Owner</label>
                                <select class="form-select" id="nextActionOwner" name="next_action_owner">
                                    <option value="">Select Next Action Owner</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $lead->next_action_owner == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
