@extends('admin.master')
@section('content')
<div class="cotainer-fluid mt-3">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <!-- Success message or content goes here -->
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
    @endif

</div>



<div class="col-12 mt-5">
    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCategoryModal">
        Create Category
    </button>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Table Default</h4>
            <div class="data-tables">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show <select
                                        name="dataTable_length" aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="dataTable" class="text-center dataTable no-footer dtr-inline collapsed"
                                role="grid" aria-describedby="dataTable_info" style="width: 1148px;">
                                <thead class="bg-light text-capitalize">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 144px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 282px;"
                                            aria-label="Position: activate to sort column ascending">Position</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 122px;"
                                            aria-label="Office: activate to sort column ascending">Office</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 72px;"
                                            aria-label="Age: activate to sort column ascending">Age</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 138px;"
                                            aria-label="Start Date: activate to sort column ascending">Action</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 120px; display: none;"
                                            aria-label="salary: activate to sort column ascending">salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr role="row" class="even">


                                        <td tabindex="0" class="sorting_1" style="">{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td>{{ $category->popular }}</td>
                                        {{-- <td>{{ $category->meta_title }}</td> --}}
                                        <td>
                                            {{-- ---Show button and modal trigger--- --}}
                                            <button class="btn btn-primary edit-category" data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}" data-toggle="modal"
                                                data-target="#showCategoryModal{{ $category->id }}"><i
                                                    class="fa fa-table"></i>Show</button>
                                            <!-- Edit Button and Modal Trigger -->
                                            <button class="btn btn-primary edit-category" data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}" data-toggle="modal"
                                                data-target="#editCategoryModal{{ $category->id }}"><i
                                                    class="fa fa-edit"></i>Edit</button>
                                            <!-- Delete Button and Modal Trigger -->
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger m-2"
                                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete
                                                    <i class="fa fa-trash"></i></button>
                                            </form>



                                        </td>
                        </div>
                    </div>
                </div>
            </div>
            </td>
            </tr>
            <!-- Edit Category Modal -->
            <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- Modal content goes here -->
                <!-- ... (modal structure) ... -->
                <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Create Category Form -->

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $category->name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{ $category->slug }}" required>
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
                                        <label for="popular">popular</label>
                                        <select class="form-control" id="popular" name="popular" required>
                                            <option value="1">Popular</option>
                                            <option value="0">Simple</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="meta_title">meta_title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            value="{{ $category->meta_title }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="meta_keywords">meta_keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                            value="{{ $category->meta_keywords }}" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $category->description }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="meta_descrip">meta_descrip</label>
                                    <input type="text" class="form-control" id="meta_descrip" name="meta_descrip"
                                        value="{{ $category->meta_descrip }}" required>
                                </div>
                                <!-- Add other category fields here -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>


            </div>
            {{-- popup modal for showing --}}
            <div class="modal fade" id="showCategoryModal{{ $category->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- Modal content goes here -->
                <!-- ... (modal structure) ... -->

                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Show Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Create Category Form -->

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $category->name }}"  disabled required>
                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $category->slug }}" disabled required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                   
                                    <div>
                                        @if ($category->status = 1)
                                        <p style="font-size: 16px;" class="btn text-danger">status: Active</p>
                                        @elseif ($category->status = 0)
                                        <p style="font-size: 16px;" class="btn text-primary">status: Inactive</p>
                                        @else
                                        <p> Unknown</p>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    
                                    <div>
                                        @if ($category->popular = 1)
                                        <p style="font-size: 16px;" class="btn text-info">popular: Popular</p>
                                        @elseif ($category->popular = 0)
                                        <p style="font-size: 16px;" class="btn text-primary">popular: Simple</p>
                                        @else
                                        <p> Unknown</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="meta_title">meta_title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ $category->meta_title }}" disabled required>
                                </div>
                                <div class="col-md-6">
                                    <label for="meta_keywords">meta_keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        value="{{ $category->meta_keywords }}" disabled required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $category->description }}" disabled required>
                            </div>
                            <div class="form-group">
                                <label for="meta_descrip">meta_descrip</label>
                                <input type="text" class="form-control" id="meta_descrip" name="meta_descrip"
                                    value="{{ $category->meta_descrip }}" disabled required>
                            </div>
                            <!-- Add other category fields here -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>

                        </div>
                    </div>
                </div>

                </form>
            </div>


            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 11
                entries</div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#"
                            aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1"
                            tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2"
                            tabindex="0" class="page-link">2</a></li>
                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable"
                            data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<div class="container">


   

</div>

<script>
    $('table[data-form="deleteForm"]').on('click', '.form-delete', function (e) {
        e.preventDefault();
        var $form = $(this);
        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        })
            .on('click', '#delete-btn', function () {
                $form.submit();
            });
    });
</script>
@endsection