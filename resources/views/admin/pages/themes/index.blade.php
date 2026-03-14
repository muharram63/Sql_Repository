@extends('admin.layouts.app')
@section('content')
<style>

    .description-content img {
        max-width: 100px;   /* нужный размер */
        height: 70px;
        border-radius:20px;
        display: block;
        margin: 10px 0;
    }
</style>

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Themes <span class="badge bg-soft-dark text-dark ms-2">count</span></h1>


                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="ecommerce-add-product.html">Add product</a>
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
                        <th>#</th>
                        <th>Тема</th>
                        <th>Описание</th>
                        <th>Подтема</th>
                        <th>Слайд</th>
                        <th>Видео</th>
                    </tr>
                    </thead>

                  <tbody>
                  @foreach($themes as $theme)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$theme->title}}</td>
                          <td>
                              <div class="description-content">
                                  {!! $theme->description !!}
                              </div>
                          </td>
                          <td>{{$theme->theme_id}}</td>
                          <td>
                              @if($theme->slide)

                                  @if(Str::startsWith($theme->slide, 'http'))
                                      <a href="{{ $theme->slide }}" target="_blank">
                                          Открыть слайд
                                      </a>
                                  @else
                                      <a href="{{ asset('storage/'.$theme->slide) }}" target="_blank">
                                          Скачать файл
                                      </a>
                                  @endif

                              @endif
                          </td>
                          <td>
                              <a href="{{$theme->video}}">Смотреть видео</a>
                          <td>
                              <a href="{{route('themes.show',$theme)}}" class="btn btn-secondary mb-1">Посмотреть</a><br>

                              <a href="{{route('themes.edit',$theme)}}" class="btn btn-warning mb-1">Изменить</a><br>

                              <form action="{{route('themes.destroy',$theme)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">Удалить</button>

                              </form>

  </td>
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
    <!-- End Content -->

@endsection
