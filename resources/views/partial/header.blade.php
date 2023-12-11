<!-- Page Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ App::getLocale() === 'zh-TW' ? url('/') : route('localized.index', App::getLocale()) }}">
            <i class="fas fa-film mr-2"></i>
            Catalog-Z
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link nav-link-1 active" aria-current="page" href="index.html">{{ __('demo.products') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-3" href="about.html">{{ __('demo.about') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-4" href="contact.html">{{ __('demo.contact') }}</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="dropbtn">{{ __('demo.language') }}</button>
                    <ul class="dropdown-content">
                    
                        <li><a href="{{ url('en') }}">{{ __('demo.en') }}</a></li>
                        <li><a href="{{ url('zh-TW') }}">{{ __('demo.zh-TW') }}</a></li>
                        <li><a href="{{ url('zh-CN') }}">{{ __('demo.zh-CN') }}</a></li>
                    </ul>
                </div>
            </li>

        </ul>
        </div>
    </div>
</nav>