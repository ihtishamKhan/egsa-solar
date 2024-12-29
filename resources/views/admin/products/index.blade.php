@extends('layouts.master')

@section('title')
    Products List
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Products
        @endslot
        @slot('title')
            Products List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">

                    @hasrole('Super Admin|Employee')
                        <div class="text-end mx-2">
                            <a class="btn btn-primary btn-sm text-light" data-bs-toggle="modal" data-bs-target="#addProduct">Add
                                Product
                            </a>
                        </div>

                        {{-- add product --}}
                        <div id="addProduct" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Add Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label required">Name</label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" required>

                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label required">Description</label>
                                                        <input type="text" name="description"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            id="description" required>

                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label required">Price</label>
                                                        <input type="number" name="price"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            id="price" required>

                                                        @error('price')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label required">Quantity</label>
                                                        <input type="number" name="initial_quantity"
                                                            class="form-control @error('initial_quantity') is-invalid @enderror"
                                                            id="quantity" required>

                                                        @error('initial_quantity')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="notes" class="form-label required">Notes</label>
                                                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" required></textarea>

                                                        @error('notes')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endhasrole
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-eye btn-action"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit btn-action"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
