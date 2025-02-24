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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('leads.siteSurveyUpdate', $lead->uuid) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="interestedIn" class="form-label">Interested In</label>
                                            <input type="text" class="form-control" id="interestedIn" name="interest_in"
                                                value="{{ $lead->interest_in }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InstallationLocation" class="form-label">Installation
                                                Location</label>
                                            <input type="text" class="form-control" id="InstallationLocation"
                                                name="installation_location" value="{{ $lead->installation_location }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceOrientation" class="form-label">Surface
                                                Orientation</label>
                                            <input type="text" class="form-control" id="surfaceOrientation"
                                                name="surface_orientation" value="{{ $lead->surface_orientation }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ownershipStatus" class="form-label">Ownership Status</label>
                                            <input type="text" class="form-control" id="ownershipStatus"
                                                name="ownership_status" value="{{ $lead->ownership_status }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceOrientation" class="form-label">Surface
                                                Orientation</label>
                                            <input type="text" class="form-control" id="surfaceOrientation"
                                                name="surface_orientation" value="{{ $lead->surface_orientation }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ownershipStatus" class="form-label">Ownership Status</label>
                                            <input type="text" class="form-control" id="ownershipStatus"
                                                name="ownership_status" value="{{ $lead->ownership_status }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceAge" class="form-label">Surface Age</label>
                                            <input type="text" class="form-control" id="surfaceAge" name="surface_age"
                                                value="{{ $lead->surface_age }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="powerConsumption" class="form-label">Power
                                                Consumption</label>
                                            <input type="text" class="form-control" id="powerConsumption"
                                                name="power_consumption" value="{{ $lead->power_consumption }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sunnyArea" class="form-label">Sunny Area (sqm)</label>
                                            <input type="text" class="form-control" id="sunnyArea" name="sunny_area_sqm"
                                                value="{{ $lead->sunny_area_sqm }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="storageInterest" class="form-label">Storage Interest</label>
                                            <input type="text" class="form-control" id="storageInterest"
                                                name="storage_interest" value="{{ $lead->storage_interest }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceInclination" class="form-label">Surface
                                                Inclination</label>
                                            <input type="text" class="form-control" id="surfaceInclination"
                                                name="surface_inclination" value="{{ $lead->surface_inclination }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="purchaseType" class="form-label">Purchase Type</label>
                                            <input type="text" class="form-control" id="purchaseType"
                                                name="purchase_type" value="{{ $lead->purchase_type }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="additionalInterests" class="form-label">Additional
                                                Interests</label>
                                            <input type="text" class="form-control" id="additionalInterests"
                                                name="additional_interests" value="{{ $lead->additional_interests }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="additionalInformation" class="form-label">Additional
                                                Information</label>
                                            <input type="text" class="form-control" id="additionalInformation"
                                                name="additional_information"
                                                value="{{ $lead->additional_information }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                value="{{ $lead->date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
