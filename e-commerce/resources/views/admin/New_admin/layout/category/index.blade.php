@extends('admin.New_admin.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">eCommerce /</span> Category List
  </h4>
  <div class="app-ecommerce-category over">
    <!-- Category List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="card-header d-flex rounded-0 flex-wrap py-md-0">
            <div class="me-5 ms-n2">
              <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search"
                    class="form-control" placeholder="Search Category" aria-controls="DataTables_Table_0"></label></div>
            </div>
            <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
              <div
                class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0 gap-3 pt-0">
                <div class="dataTables_length mt-0 mt-md-3" id="DataTables_Table_0_length"><label><select
                      name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                      <option value="7">7</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                      <option value="70">70</option>
                      <option value="100">100</option>
                    </select></label></div>
                <div class="dt-buttons"> <button
                    class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary me-3" tabindex="0"
                    aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                    aria-expanded="false"><span><i class="mdi mdi-export-variant me-1"></i> <span
                        class="d-none d-sm-inline-block">Export</span></span><span
                      class="dt-down-arrow">▼</span></button> <button class="dt-button add-new btn btn-primary"
                    tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasEcommerceCategoryList"><span><i
                        class="mdi mdi-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add
                        Category</span></span></button> </div>
              </div>
            </div>
          </div>
          <table class="datatables-category-list table dataTable no-footer dtr-column" id="DataTables_Table_0"
            aria-describedby="DataTables_Table_0_info" style="width: 1229px;">
            <thead class="table-light">
              <tr>
                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                  style="width: 0px; display: none;" aria-label=""></th>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1"
                  style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 609px;" aria-label="Categories: activate to sort column ascending"
                  aria-sort="descending">Categories</th>
                <th class="text-nowrap text-sm-end sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                  colspan="1" style="width: 169px;"
                  aria-label="Total Products &amp;nbsp;: activate to sort column ascending">Total Products &nbsp;</th>
                <th class="text-nowrap text-sm-end sorting_disabled" rowspan="1" colspan="1" style="width: 140px;"
                  aria-label="Total Earning">Total Earning</th>
                <th class="text-lg-center sorting_disabled" rowspan="1" colspan="1" style="width: 85px;"
                  aria-label="Actions">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-16.png" alt="Product-8"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Travel</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Choose from wide range of travel accessories from
                        popular brands</small></div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">4186</div>
                </td>
                <td>
                  <div class="text-sm-end">$7912.99</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
              <tr class="even">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-1.png" alt="Product-1"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Smart Phone</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Choose from wide range of smartphones from popular
                        brands</small></div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">1947</div>
                </td>
                <td>
                  <div class="text-sm-end">$99129</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
              <tr class="odd">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-4.png" alt="Product-4"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Shoes</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Explore the latest shoes from Top brands</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">4940</div>
                </td>
                <td>
                  <div class="text-sm-end">$3612.98</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
              <tr class="even">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-22.png" alt="Product-10"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Jewellery</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Choose from wide range of Jewellery from popular
                        brands</small></div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">4186</div>
                </td>
                <td>
                  <div class="text-sm-end">$7912.99</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
              <tr class="odd">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-10.png" alt="Product-7"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Home Decor</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Choose from wide range of home decor from popular
                        brands</small></div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">9184</div>
                </td>
                <td>
                  <div class="text-sm-end">$19120.45</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
              <tr class="even">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-23.png" alt="Product-11"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Grocery</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Get fresh groceries delivered at your
                        doorstep</small></div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">4186</div>
                </td>
                <td>
                  <div class="text-sm-end">$7912.99</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
              <tr class="odd">
                <td class="  control" style="display: none;" tabindex="0"></td>
                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="sorting_1">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary user-name">
                      <div class="avatar"><img src="../../assets/img/ecommerce-images/product-6.png" alt="Product-6"
                          class="rounded-2"></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center"><span
                        class="text-heading fw-medium text-wrap">Games</span><small
                        class="text-truncate mb-0 d-none d-sm-block">Dive into world of Virtual Reality with latest
                        games</small></div>
                  </div>
                </td>
                <td>
                  <div class="text-sm-end">5764</div>
                </td>
                <td>
                  <div class="text-sm-end">$29129</div>
                </td>
                <td>
                  <div class="d-flex align-items-sm-center justify-content-sm-center"><button
                      class="btn btn-sm btn-icon"><i class="mdi mdi-pencil-outline"></i></button><button
                      class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical me-2"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="row mx-1">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 7
                of 14 entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                      aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous"
                      tabindex="0" class="page-link">Previous</a></li>
                  <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0"
                      role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                      data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                  <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                      aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0"
                      class="page-link">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Offcanvas to add new customer -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList"
      aria-labelledby="offcanvasEcommerceCategoryListLabel">
      <!-- Offcanvas Header -->
      <div class="offcanvas-header py-4">
        <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">Add Category</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <!-- Offcanvas Body -->
      <div class="offcanvas-body border-top">
        <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="eCommerceCategoryListForm"
          onsubmit="return false" novalidate="novalidate">
          <!-- Title -->

          <div class="form-floating form-floating-outline mb-4 fv-plugins-icon-container">
            <input type="text" class="form-control" id="ecommerce-category-title" placeholder="Enter category title"
              name="categoryTitle" aria-label="category title">
            <label for="ecommerce-category-title">Title</label>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <!-- Slug -->
          <div class="form-floating form-floating-outline mb-4 fv-plugins-icon-container">
            <input type="text" id="ecommerce-category-slug" class="form-control" placeholder="Enter slug"
              aria-label="slug" name="slug">
            <label for="ecommerce-category-slug">Slug</label>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <!-- Image -->
          <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="file" id="ecommerce-category-image">
            <label for="ecommerce-category-image">Attachment</label>
          </div>
          <!-- Parent category -->
          <div class="mb-3 ecommerce-select2-dropdown">
            <div class="form-floating form-floating-outline">
              <div class="position-relative"><select id="ecommerce-category-parent-category"
                  class="select2 form-select select2-hidden-accessible" data-placeholder="Select parent category"
                  data-allow-clear="true" data-select2-id="ecommerce-category-parent-category" tabindex="-1"
                  aria-hidden="true">
                  <option value="" data-select2-id="2">Select parent Category</option>
                  <option value="Household">Household</option>
                  <option value="Management">Management</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Office">Office</option>
                  <option value="Automotive">Automotive</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                  data-select2-id="1" style="width: 360px;"><span class="selection"><span
                      class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                      aria-expanded="false" tabindex="0" aria-disabled="false"
                      aria-labelledby="select2-ecommerce-category-parent-category-container"><span
                        class="select2-selection__rendered" id="select2-ecommerce-category-parent-category-container"
                        role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select parent
                          category</span></span><span class="select2-selection__arrow" role="presentation"><b
                          role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                    aria-hidden="true"></span></span></div>
              <label for="ecommerce-category-parent-category">Parent category</label>
            </div>
          </div>
          <!-- Description -->
          <div class="mb-4">
            <label class="form-label">Description</label>
            <div class="form-control p-0 pt-1">
              <div class="comment-editor border-0 ql-container ql-snow" id="ecommerce-category-description">
                <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"
                  data-placeholder="Enter category description...">
                  <p><br></p>
                </div>
                <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank"
                    href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com"
                    data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
              </div>
              <div class="comment-toolbar border-0 rounded ql-toolbar ql-snow">
                <div class="d-flex justify-content-end">
                  <span class="ql-formats me-0">
                    <button class="ql-bold" type="button"><svg viewBox="0 0 18 18">
                        <path class="ql-stroke"
                          d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                        </path>
                        <path class="ql-stroke"
                          d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                        </path>
                      </svg></button>
                    <button class="ql-italic" type="button"><svg viewBox="0 0 18 18">
                        <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                        <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                        <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                      </svg></button>
                    <button class="ql-underline" type="button"><svg viewBox="0 0 18 18">
                        <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                        <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                      </svg></button>
                    <button class="ql-list" value="ordered" type="button"><svg viewBox="0 0 18 18">
                        <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line>
                        <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line>
                        <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line>
                        <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line>
                        <path class="ql-fill"
                          d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z">
                        </path>
                        <path class="ql-stroke ql-thin"
                          d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path>
                        <path class="ql-stroke ql-thin"
                          d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109">
                        </path>
                      </svg></button>
                    <button class="ql-list" value="bullet" type="button"><svg viewBox="0 0 18 18">
                        <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line>
                        <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line>
                        <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line>
                        <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line>
                        <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line>
                        <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line>
                      </svg></button>
                    <button class="ql-link" type="button"><svg viewBox="0 0 18 18">
                        <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line>
                        <path class="ql-even ql-stroke"
                          d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z">
                        </path>
                        <path class="ql-even ql-stroke"
                          d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z">
                        </path>
                      </svg></button>
                    <button class="ql-image" type="button"><svg viewBox="0 0 18 18">
                        <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                        <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                        <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                      </svg></button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <!-- Status -->
          <div class="mb-4 ecommerce-select2-dropdown">
            <div class="form-floating form-floating-outline">
              <div class="position-relative"><select id="ecommerce-category-status"
                  class="select2 form-select select2-hidden-accessible" data-placeholder="Select category status"
                  data-select2-id="ecommerce-category-status" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="4">Select category status</option>
                  <option value="Scheduled">Scheduled</option>
                  <option value="Publish">Publish</option>
                  <option value="Inactive">Inactive</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                  data-select2-id="3" style="width: 360px;"><span class="selection"><span
                      class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                      aria-expanded="false" tabindex="0" aria-disabled="false"
                      aria-labelledby="select2-ecommerce-category-status-container"><span
                        class="select2-selection__rendered" id="select2-ecommerce-category-status-container"
                        role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select category
                          status</span></span><span class="select2-selection__arrow" role="presentation"><b
                          role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                    aria-hidden="true"></span></span></div>
              <label for="ecommerce-category-status">Parent status</label>
            </div>
          </div>
          <!-- Submit and reset -->
          <div class="mb-3">
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Add</button>
            <button type="reset" class="btn btn-outline-danger waves-effect"
              data-bs-dismiss="offcanvas">Discard</button>
          </div>
          <input type="hidden">
        </form>
      </div>
    </div>
  </div>

</div>
@endsection