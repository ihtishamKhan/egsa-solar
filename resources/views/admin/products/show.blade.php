@extends('layouts.master')

@section('title')
    Show Product
@endsection

@section('css')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Products
        @endslot
        @slot('title')
            Show Product
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">

                    @hasrole('Super A')
                        <div class="text-end mx-2">
                            <a class="btn btn-primary btn-sm text-light" data-bs-toggle="modal" data-bs-target="#addProduct">Add
                                Product
                            </a>
                        </div>

                        {{-- add product --}}
                        <div id="addProduct" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                {{-- name --}}
                                <p class="mb-2"><strong>Name:</strong> {{ $product->name }}</p>
                                {{-- description --}}
                                <p class="mb-2"><strong>Description:</strong> {{ $product->description }}</p>
                                {{-- price --}}
                                <p class="mb-2"><strong>Price:</strong> {{ $product->price }}</p>
                                {{-- quantity --}}
                                <p class="mb-2"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h5>Activity</h5>
                            <div>
                                @foreach ($product->getActivityFeed() as $activity)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card"
                                                style="border-top: 4px solid {{ $activity['type'] == 'in' ? 'green' : 'red' }}; box-shadow: 0px 4px 12px 2px rgb(0 0 0 / 14%)">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <div class="conversation-name"
                                                                style="font-size: 16px; font-weight: 500; color: rgb(43, 113, 244);">
                                                                {{ $activity['user'] }}
                                                            </div>
                                                            <p class="mb-0"><strong>Reason: </strong>
                                                                {{ $activity['reason'] }}
                                                            </p>
                                                            {{-- <p><strong>Price: </strong> {{ $activity['price'] }}</p> --}}
                                                            <p class="mb-0"><strong>Quantity: </strong>
                                                                {{ $activity['quantity'] }}
                                                            </p>
                                                            <p class="mb-0"><strong>Notes:
                                                                </strong>{{ $activity['notes'] }}
                                                            </p>

                                                            <small class="text-muted mt-2">
                                                                {{ $activity['date'] }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
@endsection
