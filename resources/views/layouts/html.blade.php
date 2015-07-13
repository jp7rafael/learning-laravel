<!DOCTYPE html>
<html>
    <head>
        <title>Learning laravel</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css" />
        <meta name="csrf-token" content="<?= csrf_token() ?>" />
        <meta name="csrf-param" content="_token" />
    </head>
    <body>
    @include('shared.nav')
        <section id="content" class="container-fluid">
            @yield('content')
        </section>
        <script type="text/javascript" src='/js/3rd-party.js'></script>
    <script type="text/javascript" src='/js/app.js'></script>
    </body>
</html>
