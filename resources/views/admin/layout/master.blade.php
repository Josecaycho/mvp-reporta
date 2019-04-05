<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/images_react/logo.png') }}">
        
    </head>

        <body>

            <div class="container-scroller ps ps--theme_default ps--active-y cls-color-general">
                    @include('admin.includes.header')

                    <div class="container-fluid">
                        <div class="row row-offcanvas row-offcanvas-right">
                                @include('admin.includes.sidebar')
                                <div class="content-wrapper">
                                        @yield('content')
                                </div>
                                @include('admin.includes.footer')
                        </div>
                    </div>
            </div>

            <script src="{{ asset('js/general.js')}}"></script>
            
            <script>
                $(document).ready(function() {
                    $('.summernote').summernote({
                        height:300,
                    });
                });
              </script>
        </body>

    </html>