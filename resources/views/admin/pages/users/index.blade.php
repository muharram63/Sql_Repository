@extends('admin.layouts.app')
@section('content')


    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Products <span class="badge bg-soft-dark text-dark ms-2">72,0312</span></h1>

                    <div class="mt-2">
                        <a class="text-body me-3" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exportProductsModal">
                            <i class="bi-download me-1"></i> Export
                        </a>
                        <a class="text-body" href="javascript:;" data-bs-toggle="modal" data-bs-target="#importProductsModal">
                            <i class="bi-upload me-1"></i> Import
                        </a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{route('users.create')}}">Создать Пользователя</a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
          <span class="hs-nav-scroller-arrow-prev" style="display: none;">
            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
              <i class="bi-chevron-left"></i>
            </a>
          </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
              <i class="bi-chevron-right"></i>
            </a>
          </span>


            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <div class="row justify-content-end mb-3">
            <div class="col-lg">
                <!-- Datatable Info -->
                <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
              <span class="d-block d-sm-inline-block fs-5 me-3 mb-2 mb-sm-0">
                <span id="datatableCounter">0</span>
                Selected
              </span>
                        <a class="btn btn-outline-danger btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-trash"></i> Delete
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-archive"></i> Archive
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-upload"></i> Publish
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0" href="javascript:;">
                            <i class="bi-x-lg"></i> Unpublish
                        </a>
                    </div>
                </div>
                <!-- End Datatable Info -->
            </div>
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="d-grid d-sm-flex gap-2">

                    <!-- Dropdown -->
                    <div class="dropdown">


                        <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown" style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-grid gap-3">
                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_product">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Product</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_product" checked="">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_type">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Type</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_type" checked="">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_vendor">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Vendor</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_vendor">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_stocks">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Stocks</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_stocks" checked="">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_sku">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">SKU</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_sku" checked="">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_price">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Price</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_price" checked="">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_quantity">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Quantity</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_quantity">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_variants">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Variants</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_variants" checked="">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 4, 9],
                      "width": "5%",
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 12,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
                    <thead class="thead-light">
                    <tr>
                        <th>№</th>
                        <th>Фото</th>
                        <th>Имя</th>
                        <th>Email</th>

                           </tr>
                    </thead>

                <tbody>
                  @foreach($users as $user)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>
                              @if($user->avatar)
                                  <a href="{{asset('storage/'.$user->avatar)}}" target="_blank">
                                      <img src="{{asset('storage/'.$user->avatar)}}" width="63" height="63"style="border-radius: 15vh;">
                                  </a>
                              @endif
                          </td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>

                      </tr>

                  @endforeach
                </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">


                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
@endsection
