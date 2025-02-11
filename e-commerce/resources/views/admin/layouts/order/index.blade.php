<style>
    /* Success Alert */
    .alert-success {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Error Alert */
    .alert-error {
        background-color: #f44336;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Info Alert */
    .alert-info {
        background-color: #2196F3;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }
</style>
@extends('admin.master')
@section('content')
<div class="cotainer-fluid mt-3">
    @if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert-success">
        <!-- Success message or content goes here -->
        {{ session('success') }}
    </div>
    @endif
</div>

<div class="container">
    <div class="col-12 mt-5">
        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createorderModal">
            Create order
        </button>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Progress Table</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        @if(count($orders) > 0)
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">order Name</th>
                                    <th scope="col">Quanity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                                    <td>{{ $order->order ? $order->order->name : 'N/A' }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3">
                                                <form action="{{ route('order.updatestatus', ['id' => $order->id]) }}"
                                                    method="POST">
                                                    @csrf <!-- Include this to add a CSRF token for security -->
                                                    <button type="submit" class="btn btn-info text-light"
                                                        data-toggle="modal"
                                                        data-target="#showorderModal{{ $order->id }}">
                                                        <i class="fa fa-truck text-warning"></i> Delivery
                                                    </button>
                                                </form>

                                            </li>
                                            <li class="mr-3">
                                                <button class="btn btn-light text-primary" data-toggle="modal"
                                                    data-target="#showEditModal{{ $order->id }}">

                                                    <i class="fa fa-edit"></i></a>
                                                </button>
                                            <li>
                                                <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                                        <i class="ti-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="text-center">order not found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create order Modal -->
<div class="modal fade" id="createorderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Category Form -->

            </div>
        </div>
    </div>
</div>
<!-- Show order Modal -->

<!-- Edit order Modal -->
---for edit -----
@foreach ($orders as $order)
<div class="modal fade" id="showEditModal{{ $order->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Category Form -->
                <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST"
                    id="createCategoryForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group ">
                        <label for="name">Customer Name</label>
                        <select class="form-control" id="name" name="name" required>
                            @foreach ($names as $name)
                            <option value="{{ $name->id }}">{{ $name->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="name">Product Name</label>
                        <select class="form-control" id="product_name" name="product_name" required>
                            @foreach ($product_names as $product_name)
                            <option value="{{ $product_name->id }}">{{ $product_name->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="small_description">small_description</label>
                            <input type="text" class="form-control" id="small_description" name="small_description"
                                value="{{ $order->small_description }}" required>

                        </div>
                        <div class="col-md-6">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{$order->description}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$order->meta_title}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="original_price">original_price</label>
                            <input type="number" class="form-control" id="original_price" name="original_price"
                                value="{{$order->original_price}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="selling_price">selling_price</label>
                            <input type="number" class="form-control" id="selling_price" name="selling_price"
                                value="{{$order->selling_price}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="qty_stock">qty_stock</label>
                            <input type="number" class="form-control" id="qty_stock" name="qty_stock"
                                value="{{$order->qty_stock}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="images[]" id="inputGroupFile02"
                                    multiple>
                                <label class="custom-file-label" for="inputGroupFile02">Choose files</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>

                        </div>

                        <div id="uploaded-images">
                            <!-- Display uploaded images here -->
                        </div>

                        {{-- ----Show Images--- --}}
                        @if (!empty($order->images))
                        @php
                        $imageNames = @unserialize($order->images);
                        @endphp
                        @if ($imageNames !== false)
                        <div class="order-images">
                            @foreach ($imageNames as $imageName)
                            <img src="{{ asset('images/' . $imageName) }}" alt="{{ $order->name }}" width="100px"
                                height="100px" class="order-image">
                            @endforeach
                        </div>
                        @else
                        <p>No valid images found.</p>
                        @endif
                        @else
                        <p>No images available.</p>
                        @endif

                    </div>



                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tax">tax</label>
                            <input type="text" class="form-control" id="tax" name="tax" value="{{$order->tax}}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$order->meta_title}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$order->meta_title}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                value="{{$order->meta_keywords}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="status">status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="trending">trending</label>
                            <select class="form-control" id="trending" name="trending" required>
                                <option value="1">Popular</option>
                                <option value="0">Simple</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="meta_description">meta_description</label>
                        <input type="text" class="form-control" id="meta_description" name="meta_description"
                            value="{{$order->meta_description}}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- JavaScript to handle image preview (no changes needed here) -->
<script>
    // Add an event listener to the file input
    document.getElementById('inputGroupFile02').addEventListener('change', function (e) {
        // Get the selected files
        const files = e.target.files;

        // Clear the previously displayed images
        document.getElementById('uploaded-images').innerHTML = '';

        // Display the selected images
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const listItem = document.createElement('div');
            const image = document.createElement('img');
            image.src = URL.createObjectURL(file); // Create a URL for the image
            image.style.maxWidth = '100px'; // Set maximum width for display
            image.style.maxHeight = '100px'; // Set maximum height for display
            listItem.appendChild(image);
            document.getElementById('uploaded-images').appendChild(listItem);
        }
    });
</script>
@endsection