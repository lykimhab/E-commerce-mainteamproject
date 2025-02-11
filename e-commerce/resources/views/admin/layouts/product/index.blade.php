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
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createProductModal">
            Create Product
        </button>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Progress Table</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        @if(count($products) > 0)
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty_Stock</th>
                                    <th scope="col">Selling_Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->qty_stock }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3">
                                                <!-- Add the data-toggle and data-target attributes to trigger the modal -->
                                                <button class="btn btn-light text-warning" data-toggle="modal"
                                                    data-target="#showProductModal{{ $product->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </li>
                                            <li class="mr-3">
                                                <button class="btn btn-light text-primary" data-toggle="modal"
                                                    data-target="#showEditModal{{ $product->id }}">

                                                    <i class="fa fa-edit"></i></a>
                                                </button>
                                            <li>
                                                <form action="{{ route('product.destroy', $product->id) }}"
                                                    method="POST" class="d-inline">
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
                        <p class="text-center">Product not found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create Product Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Category Form -->
                <form action="{{ route('product.store') }}" method="POST" id="createCategoryForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="small_description">small_description</label>
                            <input type="text" class="form-control" id="small_description" name="small_description"
                                value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description" value=""
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="original_price">original_price</label>
                            <input type="number" class="form-control" id="original_price" name="original_price"
                                required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="selling_price">selling_price</label>
                            <input type="number" class="form-control" id="selling_price" name="selling_price" required>
                        </div>
                        <div class="col-md-6">
                            <label for="qty_stock">qty_stock</label>
                            <input type="number" class="form-control" id="qty_stock" name="qty_stock" required>
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
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tax">tax</label>
                            <input type="text" class="form-control" id="tax" name="tax" required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" required>
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
                        <input type="text" class="form-control" id="meta_description" name="meta_description">
                    </div>
                    <!-- Add other category fields here -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Show Product Modal -->
@foreach ($products as $product)
<div class="modal fade" id="showProductModal{{ $product->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Category Form -->
                <form action="{{ route('product.store') }}" method="POST" id="createCategoryForm">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"
                                disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Category</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{$product->category->name}}" disabled required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="small_description">small_description</label>
                            <input type="text" class="form-control" id="small_description" name="small_description"
                                value="{{ $product->small_description }}" disabled required>

                        </div>
                        <div class="col-md-6">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{$product->description}}" disabled required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$product->meta_title}}" disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="original_price">original_price</label>
                            <input type="number" class="form-control" id="original_price" name="original_price"
                                value="{{$product->original_price}}" disabled required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="selling_price">selling_price</label>
                            <input type="number" class="form-control" id="selling_price" name="selling_price"
                                value="{{$product->selling_price}}" disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="qty_stock">qty_stock</label>
                            <input type="number" class="form-control" id="qty_stock" name="qty_stock"
                                value="{{$product->qty_stock}}" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{-- ----Show Images--- --}}
                        @if (!empty($product->images))
                        @php
                        $imageNames = @unserialize($product->images);
                        @endphp
                        @if ($imageNames !== false)
                        <div class="product-images">
                            @foreach ($imageNames as $imageName)
                            <img src="{{ asset('images/' . $imageName) }}" alt="{{ $product->name }}" width="100px"
                                height="100px" class="product-image">
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
                            <input type="text" class="form-control" id="tax" name="tax" value="{{$product->tax}}"
                                disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$product->meta_title}}" disabled required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$product->meta_title}}" disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                value="{{$product->meta_keywords}}" disabled required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div>
                                @if ($product->status = 1)
                                <p style="font-size: 16px;" class="btn text-danger">status: Active</p>
                                @elseif ($product->status = 0)
                                <p style="font-size: 16px;" class="btn text-primary">status: Inactive</p>
                                @else
                                <p> Unknown</p>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div>
                                @if ($product->trending = 1)
                                <p style="font-size: 16px;" class="btn text-info">trending: Popular </p>
                                @elseif ($product->trending = 0)
                                <p style="font-size: 16px;" class="btn text-primary">trending: Simple</p>
                                @else
                                <p> Unknown</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="meta_description">meta_description</label>
                        <input type="text" class="form-control" id="meta_description" name="meta_description"
                            value="{{$product->meta_description}}" disabled>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Edit Product Modal -->
@foreach ($products as $product)
<div class="modal fade" id="showEditModal{{ $product->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Category Form -->
                <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST"
                    id="createCategoryForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="small_description">small_description</label>
                            <input type="text" class="form-control" id="small_description" name="small_description"
                                value="{{ $product->small_description }}" required>

                        </div>
                        <div class="col-md-6">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{$product->description}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$product->meta_title}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="original_price">original_price</label>
                            <input type="number" class="form-control" id="original_price" name="original_price"
                                value="{{$product->original_price}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="selling_price">selling_price</label>
                            <input type="number" class="form-control" id="selling_price" name="selling_price"
                                value="{{$product->selling_price}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="qty_stock">qty_stock</label>
                            <input type="number" class="form-control" id="qty_stock" name="qty_stock"
                                value="{{$product->qty_stock}}" required>
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
                        @if (!empty($product->images))
                        @php
                        $imageNames = @unserialize($product->images);
                        @endphp
                        @if ($imageNames !== false)
                        <div class="product-images">
                            @foreach ($imageNames as $imageName)
                            <img src="{{ asset('images/' . $imageName) }}" alt="{{ $product->name }}" width="100px"
                                height="100px" class="product-image">
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
                            <input type="text" class="form-control" id="tax" name="tax" value="{{$product->tax}}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$product->meta_title}}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{$product->meta_title}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                value="{{$product->meta_keywords}}" required>
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
                            value="{{$product->meta_description}}">
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