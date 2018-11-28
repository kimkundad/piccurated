<!doctype html>
<html lang="{{ app()->getLocale() }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="gTOa4oa2Jc03e709DurE10EmzoYcNRABZmWrpgeC5wk" />

        @yield('og_tag')


        @include('layouts.inc-style')
    @yield('stylesheet')




    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->




        @include('layouts.inc-header')



        	@yield('content')




      @include('layouts.inc-footer')



        @include('layouts.inc-script')
    	    @yield('scripts')
    </body>
</html>
