@extends('layouts.app')
@section('content')
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">{{ $portfolio->translation->name }}</h2>
    </div>
    <div class="row tm-mb-90">            
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="{{ asset('uploads/' . $portfolio->cover)  }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="tm-bg-gray tm-video-details">
                <p class="mb-4">
                   {!! $portfolio->translation->content !!}
                </p>
                <div class="text-center mb-5">
                    <a href="#" class="btn btn-primary tm-btn-big">{{ __('demo.detail.download') }}</a>
                </div>                    
                <div class="mb-4 d-flex flex-wrap">
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">1920x1080</span>
                    </div>
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="tm-text-gray-dark mb-3">License</h3>
                    <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                </div>
                <div>
                    <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container-fluid, tm-container-content -->
@endsection