@extends('layouts.master')

@section('title')
    Jobs
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Jobs
        @endslot
        @slot('title')
            Job List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">

                    @hasrole('Admin')
                        {{-- <div class="text-end mx-3">
                            <a class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#add-lead">Add Lead</a>
                        </div> --}}

                        {{-- add lead --}}
                        <div id="add-lead" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Add Lead</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('jobs.store') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label required">Title</label>
                                                        <input type="text" name="title"
                                                            class="form-control @error('title') is-invalid @enderror"
                                                            id="title" value="{{ old('title') }}">

                                                        @error('title')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

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
                                                        <label for="priority" class="form-label required">Priority</label>
                                                        <select name="priority"
                                                            class="form-select @error('priority') is-invalid @enderror"
                                                            id="priority" required>
                                                            <option value="">Select Priority</option>
                                                            <option value="low">Low</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="high">High</option>
                                                        </select>

                                                        @error('priority')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="assign-to" class="form-label required">Assign To</label>
                                                        <select name="employee_id"
                                                            class="form-select @error('employee_id') is-invalid @enderror"
                                                            id="assign-to" required>
                                                            <option value="">Select Employee</option>

                                                        </select>

                                                        @error('employee_id')
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
                    @endhasrole

                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Taken By</th>
                                <th>Title</th>
                                <th>Client</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->takenBy ? $job->takenBy->name : '' }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->client_name }}</td>
                                    <td>
                                        <div class="d-inline-block text-truncate" style="max-width: 150px;"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ $job->description }}">
                                            {{ $job->description }}
                                        </div>
                                    </td>


                                    <td>
                                        @if ($job->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($job->status == 'released')
                                            <span class="badge bg-primary">Released</span>
                                        @elseif ($job->status == 'taken')
                                            <span class="badge bg-info">Taken</span>
                                        @else
                                            <span class="badge bg-success">Completed</span>
                                        @endif
                                    </td>
                                    <td>{{ $job->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-job-{{ $job->id }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @hasrole('Admin')
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-job-{{ $job->id }}"
                                                class="btn
                                            btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endhasrole
                                        {{-- <form action="#" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>

                                {{-- view job popup --}}
                                <div id="view-job-{{ $job->id }}" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">View Job</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <p><strong>Taken By:</strong>
                                                                {{ $job->taken_by->name ?? '' }}
                                                        </div>

                                                        <div>
                                                            <p><strong>Job Main:</strong>
                                                                {{ $job->work_main }}
                                                        </div>

                                                        <div>
                                                            <p><strong>Job Sub:</strong>
                                                                {{ $job->work_sub }}
                                                        </div>


                                                        <div>
                                                            <p><strong>Title:</strong> {{ $job->title }}
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Description:</strong>
                                                                {{ $job->description }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Status:</strong>
                                                                @if ($job->status == 'pending')
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @elseif($job->status == 'released')
                                                                    <span class="badge bg-primary">Released</span>
                                                                @elseif ($job->status == 'taken')
                                                                    <span class="badge bg-info">Taken</span>
                                                                @else
                                                                    <span class="badge bg-success">Completed</span>
                                                                @endif
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Created At:</strong>
                                                                {{ $job->created_at->format('d M Y') }}</p>
                                                        </div>

                                                        <hr>

                                                        <h4>Client Details</h4>

                                                        <div>
                                                            <p class="m-0"><strong>Name:</strong>
                                                                {{ $job->client_name }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Email:</strong>
                                                                {{ $job->client_email }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Phone:</strong>
                                                                {{ $job->client_phone }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Address:</strong>
                                                                {{ $job->client_address }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>City:</strong>
                                                                {{ $job->client_city }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Postal Code:</strong>
                                                                {{ $job->client_postal_code }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- end view job popup --}}

                                {{-- edit job popup --}}
                                <div id="edit-job-{{ $job->id }}" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Edit Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('jobs.update', $job->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="skills" class="form-label required">Skills
                                                                    Required</label>

                                                                {{-- help text  --}}
                                                                <div class="form-text">Please enter skills required for
                                                                    this job separated by comma
                                                                </div>
                                                                {{-- in value convert again to comma separated --}}
                                                                <input type="text" name="skills"
                                                                    class="form-control @error('skills') is-invalid @enderror"
                                                                    id="skills" value="">
                                                                @error('skills')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="title"
                                                                    class="form-label required">Title</label>
                                                                <input type="text" name="title"
                                                                    class="form-control @error('title') is-invalid @enderror"
                                                                    id="title" value="{{ $job->title }}">

                                                                @error('title')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="description"
                                                                    class="form-label required">Description</label>
                                                                <textarea name="description" class="form-control @error('category') is-invalid @enderror" id="description"
                                                                    cols="30" rows="2" required>{{ $job->description }}</textarea>

                                                                @error('description')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="priority"
                                                                    class="form-label required">Priority</label>
                                                                <select name="priority"
                                                                    class="form-select @error('priority') is-invalid @enderror"
                                                                    id="priority" required>
                                                                    <option value="">Select Priority</option>
                                                                    <option value="low"
                                                                        {{ $job->priority == 'low' ? 'selected' : '' }}>
                                                                        Low</option>
                                                                    <option value="medium"
                                                                        {{ $job->priority == 'medium' ? 'selected' : '' }}>
                                                                        Medium</option>
                                                                    <option value="high"
                                                                        {{ $job->priority == 'high' ? 'selected' : '' }}>
                                                                        High</option>
                                                                </select>

                                                                @error('priority')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="task-status"
                                                                    class="form-label required">Status</label>
                                                                <select name="status"
                                                                    class="form-select @error('status') is-invalid @enderror"
                                                                    id="task-status" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="created"
                                                                        {{ $job->status == 'created' ? 'selected' : '' }}>
                                                                        Created</option>
                                                                    <option value="in-progress"
                                                                        {{ $job->status == 'in-progress' ? 'selected' : '' }}>
                                                                        In Progress</option>
                                                                    <option value="completed"
                                                                        {{ $job->status == 'completed' ? 'selected' : '' }}>
                                                                        Completed</option>
                                                                </select>

                                                                @error('status')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="assign-to" class="form-label required">Assign
                                                                    To</label>
                                                                <select name="employee_id"
                                                                    class="form-select @error('employee_id') is-invalid @enderror"
                                                                    id="assign-to" required>
                                                                    <option value="">Select Employee</option>
                                                                </select>

                                                                @error('employee_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> --}}
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
                                {{-- end edit task popup --}}
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            @if ($errors->any())
                $('#add-expense').modal('show');
            @endif
        });
    </script>
@endsection
