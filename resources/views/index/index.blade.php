@extends('layouts.app')
@section('content')
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            {{ __('demo.index.latest') }}
        </h2>
    </div>

    <div class="row tm-mb-90 tm-gallery">
        @foreach ($portfolios as $portfolio)

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="{{ asset('uploads/' . $portfolio->cover)  }}" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>{{ $portfolio->translation->name }}</h2>
                    <a href="{{ app()->getLocale() === 'zh-TW' ? route('detail', ['id' => $portfolio->id]) : route('localized.detail', ['locale' => app()->getLocale(), 'id' => $portfolio->id]) }}">View more</a>
                </figcaption>                    
            </figure>
            <!-- <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">{{ $portfolio->created_at }}</span>
                <span>{{ $portfolio->weight }}</span>
            </div> -->
        </div>
  
        @endforeach
    </div> <!-- row --> 

    <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <a href="{{ $portfolios->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2 disabled">{{ __('demo.previous') }}</a>

            <div class="tm-paging d-flex">
                @for ($page = 1; $page <= $portfolios->lastPage(); $page++)
                    <a href="{{ $portfolios->url($page) }}" class="tm-paging-link <?php if ($page == $portfolios->currentPage()) echo "active"; ?>">{{ $page }}</a>
                @endfor
                <!-- <a href="javascript:void(0);" class="active tm-paging-link">1</a> -->
            
            </div>

            <a href="{{ $portfolios->nextPageUrl() }}" class="btn btn-primary tm-btn-next">{{ __('demo.next') }}</a>
        </div>            
    </div>
</div> <!-- container-fluid, tm-container-content -->
@endsection