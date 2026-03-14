@extends('admin.layouts.app')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">


    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Темы</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Изменение данных</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form action="{{route('themes.update',$theme)}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="form-label">Тема</label>

                                <input type="text" class="form-control" name="title" placeholder="_Название" value="{{old('title',$theme->title)}}">
                            </div>
                            <!-- End Form -->

                            <label class="form-label">Описание </label>
                            {{-- Description --}}
                            <div class="quill-custom" style="margin-bottom: 5vh;" >
                                <div class="js-quill"
                                     style="height: 15rem;"
                                     data-hs-quill-options='{
           "placeholder": "Type your description...",
           "modules": {
             "toolbar": [
               ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
             ]
           }
         }'>
                                </div>
                            </div>
                            <input type="hidden" name="description" id="description" value="{{old('description',$theme->description)}}">
                            <div class="mb-4">
                                <label class="form-label">Подтема</label>

                                <input type="number" name="theme_id" class="form-control" placeholder="_Название" value="{{old('theme_id',$theme->theme_id)}}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Слайд</label>

                                <input type="file" name="slide" class="form-control" value="{{old('slide',$theme->slide)}}">
                            </div>


                            <div class="mb-4">
                                <label class="form-label">Видео</label>

                                <input type="file" name="video" class="form-control" value="{{old('video',$theme->video)}}">
                            </div>



                            <button type="submit" class="btn btn-warning">
                                Изменить
                            </button>

                        </form>

                        <!-- Body -->
                    </div>
                    <!-- End Card -->

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
                <!-- Card -->

                <!-- End Card -->
            </div>
        </div>
        <!-- End Content -->

        <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.js-quill').forEach(function (el) {

                    const options = el.dataset.hsQuillOptions
                        ? JSON.parse(el.dataset.hsQuillOptions)
                        : {};

                    const quill = new Quill(el, {
                        theme: 'snow',
                        ...options
                    });

                    // Сохраняем HTML в hidden input
                    quill.on('text-change', function () {
                        document.getElementById('description').value = el.querySelector('.ql-editor').innerHTML;
                    });
                });
            });
        </script>
@endsection
