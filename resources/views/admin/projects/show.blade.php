@extends('layouts.master')

@section('title')
    Project Details
@endsection

@section('css')
    <style>
        .d-flex span:first-child {
            width: 190px;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Projects
        @endslot
        @slot('title')
            Project Details
        @endslot
    @endcomponent

    {{-- @include('layouts.project-menu') --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15">{{ $project->title }}</h5>
                        </div>
                    </div>

                    <h6 class="font-size-16 mt-4 font-weight-8">Project Description:</h6>

                    <p class="text-muted">{!! $project->description !!}</p>

                    <div class="row task-dates">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                <p class="text-muted mb-0">
                                    {{ Carbon\Carbon::parse($project->start_date)->format('d M, Y') }}</p>
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date
                                </h5>
                                <p class="text-muted mb-0">
                                    {{ $project->end_date ? Carbon\Carbon::parse($project->end_date)->format('d M, Y') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row task-dates">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-user me-1 text-primary"></i> Client name</h5>
                                <p class="text-muted mb-0">
                                    {{ $project->client_name }}
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-dollar me-1 text-primary"></i> Budget
                                </h5>
                                <p class="text-muted mb-0">
                                    {{ $project->budget ? '$' . number_format($project->budget, 2) : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row task-dates">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-map me-1 text-primary"></i> Location</h5>
                                <p class="text-muted mb-0">
                                    {{ $project->location }}
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-info-circle me-1 text-primary"></i> Status
                                </h5>
                                <p class="text-muted mb-0">
                                    @if ($project->status == 'planning')
                                        <span class="badge bg-success">Planning</span>
                                    @elseif ($project->status == 'in_progress')
                                        <span class="badge bg-primary">In Progress</span>
                                    @elseif ($project->status == 'not_started')
                                        <span class="badge bg-warning">Not Started</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
@endsection
