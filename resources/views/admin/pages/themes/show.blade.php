@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


            <div class="card-body p-5">



                <div class="mb-3">
                    <h1>Тема:</h1>
                <h3>{{$theme->title}}</h3>
                </div>
                <hr class="my-4">
                <h1>Описание:</h1>
                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="p-4 bg-light rounded-4 h-100">
                            {!! $theme->description !!}
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="mb-3">
                    <h1>Подтема:</h1>
                    <h3>{{$theme->theme_id}}</h3>
                </div>
                <hr class="my-4">

                <div class="mb-3">
                    <h1>Слайд:</h1>
                    {{$theme->slide}}
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
                </div>
                <hr class="my-4">

                {{-- INFO GRID --}}
                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="p-4 bg-light rounded-4 h-100">
                            @if($theme->video)
                                <video width="600" controls>
                                    <source src="{{ asset('storage/'.$theme->video) }}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-end mt-5">
                    <a href="{{ route('themes.index') }}" class="btn btn-dark px-4">
                        ← Назад
                    </a>
                </div>

            </div>
        </div>

    </div>
@endsection
