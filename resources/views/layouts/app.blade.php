<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="/demo/css/bootstrap.min.css">
    <link rel="stylesheet" href="/demo/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/demo/css/templatemo-style.css">
    <link rel="stylesheet" href="/demo/css/custom.css">
</head>
<body>

@include('partial/header')

<div class="container">
    @yield('content')
</div>

@include('partial/footer')

<script src="/demo/js/plugins.js"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });
</script>
</body>
</html>
