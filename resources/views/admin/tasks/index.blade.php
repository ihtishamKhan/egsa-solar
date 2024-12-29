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
            List
        @endslot
    @endcomponent

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="mdi mdi-block-helper me-2"></i>
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">

                    <div class="text-end mx-3">
                        <a class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#add-task">Add Task</a>
                    </div>

                    {{-- add task --}}
                    <div id="add-task" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('tasks.store') }}" method="post">
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
                                                    <label for="duedate" class="form-label required">Due Date</label>
                                                    <input type="date" name="duedate"
                                                        class="form-control @error('duedate') is-invalid @enderror"
                                                        id="duedate" value="{{ old('duedate') }}">

                                                    @error('duedate')
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
                                                    <select name="assigned_to"
                                                        class="form-select @error('assigned_to') is-invalid @enderror"
                                                        id="assign-to" required>
                                                        <option value="">Select Employee</option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->id }}">{{ $employee->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('assigned_to')
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

                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Assigned To</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->assignedTo->name }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    {{-- priority and status column should be in bootstrap bubble with respect to colors --}}
                                    <td>
                                        @if ($task->priority == 'low')
                                            <span class="badge bg-success">Low</span>
                                        @elseif ($task->priority == 'medium')
                                            <span class="badge bg-warning">Medium</span>
                                        @else
                                            <span class="badge bg-danger">High</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($task->status == 'created')
                                            <span class="badge bg-warning">Created</span>
                                        @elseif ($task->status == 'in-progress')
                                            <span class="badge bg-info">In Progress</span>
                                        @else
                                            <span class="badge bg-success">Completed</span>
                                        @endif
                                    </td>
                                    <td>{{ $task->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-task-{{ $task->id }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @hasrole('Admin')
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-task-{{ $task->id }}"
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

                                {{-- view task popup --}}
                                <div id="view-task-{{ $task->id }}" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">View Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <p><strong>Assigned To:</strong>
                                                                {{ $task->assignedTo->name }}</p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Title:</strong> {{ $task->title }}
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Description:</strong>
                                                                {{ $task->description }}</p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Priority:</strong>
                                                                @if ($task->priority == 'low')
                                                                    <span class="badge bg-success">Low</span>
                                                                @elseif ($task->priority == 'medium')
                                                                    <span class="badge bg-warning">Medium</span>
                                                                @else
                                                                    <span class="badge bg-danger">High</span>
                                                                @endif
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Status:</strong>
                                                                @if ($task->status == 'created')
                                                                    <span class="badge bg-warning">Created</span>
                                                                @elseif ($task->status == 'in-progress')
                                                                    <span class="badge bg-info">In Progress</span>
                                                                @else
                                                                    <span class="badge bg-success">Completed</span>
                                                                @endif
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Created At:</strong>
                                                                {{ $task->created_at->format('d M Y') }}</p>
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
                                {{-- end view task popup --}}

                                {{-- edit task popup --}}
                                <div id="edit-task-{{ $task->id }}" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Edit Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('tasks.update', $task->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="title"
                                                                    class="form-label required">Title</label>
                                                                <input type="text" name="title"
                                                                    class="form-control @error('title') is-invalid @enderror"
                                                                    id="title" value="{{ $task->title }}">

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
                                                                    cols="30" rows="2" required>{{ $task->description }}</textarea>

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
                                                                        {{ $task->priority == 'low' ? 'selected' : '' }}>
                                                                        Low</option>
                                                                    <option value="medium"
                                                                        {{ $task->priority == 'medium' ? 'selected' : '' }}>
                                                                        Medium</option>
                                                                    <option value="high"
                                                                        {{ $task->priority == 'high' ? 'selected' : '' }}>
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
                                                                        {{ $task->status == 'created' ? 'selected' : '' }}>
                                                                        Created</option>
                                                                    <option value="in-progress"
                                                                        {{ $task->status == 'in-progress' ? 'selected' : '' }}>
                                                                        In Progress</option>
                                                                    <option value="completed"
                                                                        {{ $task->status == 'completed' ? 'selected' : '' }}>
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
                                                                    @foreach ($employees as $employee)
                                                                        <option value="{{ $employee->id }}"
                                                                            {{ $task->user_id == $employee->id ? 'selected' : '' }}>
                                                                            {{ $employee->name }}
                                                                        </option>
                                                                    @endforeach
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
