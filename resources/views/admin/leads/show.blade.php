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
                <div class="col-md-4">
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

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Interested In</th>
                                            <td>{{ $lead->interest_in }}</td>
                                            <th>Installation Location</th>
                                            <td>{{ $lead->installation_location }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surface Orientation</th>
                                            <td>{{ $lead->surface_orientation }}</td>
                                            <th>Ownership Status</th>
                                            <td>{{ $lead->ownership_status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surface Age</th>
                                            <td>{{ $lead->Surface_age }}</td>
                                            <th>Power Consumption</th>
                                            <td>{{ $lead->power_consumption }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sunny Area (sqm)</th>
                                            <td>{{ $lead->sunny_area_sqm }}</td>
                                            <th>Storage Interest</th>
                                            <td>{{ $lead->storage_interest }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surface Inclination</th>
                                            <td>{{ $lead->surface_inclination }}</td>
                                            <th>Purchase Type</th>
                                            <td>{{ $lead->purchase_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Additional Interests</th>
                                            <td>{{ $lead->additional_interests }}</td>
                                            <th>Additional Information</th>
                                            <td>{{ $lead->additional_information }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>{{ $lead->date }}</td>
                                            <th>Status</th>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $lead->status == 'New' ? 'primary' : ($lead->status == 'In Progress' ? 'warning' : 'success') }}">{{ $lead->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
