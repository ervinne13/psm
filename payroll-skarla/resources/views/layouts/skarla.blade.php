<html lang="en">
    <!-- START Head -->
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <!-- Enable responsiveness on mobile devices-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

        <title>{{$pageTitle or config("app.name")}}</title>

        <!--START Loader -->
        <style>
            #initial-loader{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;width:100%;background:#212121;position:fixed;z-index:10000;top:0;left:0;bottom:0;right:0;transition:opacity .2s ease-out}#initial-loader .initial-loader-top{display:flex;align-items:center;justify-content:space-between;width:200px;border-bottom:1px solid #2d2d2d;padding-bottom:5px}#initial-loader .initial-loader-top > *{display:block;flex-shrink:0;flex-grow:0}#initial-loader .initial-loader-bottom{padding-top:10px;color:#5C5C5C;font-family:-apple-system,"Helvetica Neue",Helvetica,"Segoe UI",Arial,sans-serif;font-size:12px}@keyframes spin{100%{transform:rotate(360deg)}}#initial-loader .loader g{transform-origin:50% 50%;animation:spin .5s linear infinite}body.loading {overflow: hidden !important} body.loaded #initial-loader{opacity:0}
        </style>
        <!--END Loader-->        

        <!-- SCSS Output -->
        <link rel="stylesheet" href="{{skarla_css_url("app.min.e7c8016f.css")}}">

        @yield('vendor-css')
        @include("layouts.parts.default-css")

        <link rel="stylesheet" href="{{skarla_css_url("app.css")}}">        
        <link rel="stylesheet" href="{{url("css/app.css")}}">

        @yield('css')

        @include('layouts.parts.favicon')

        @include("layouts.parts.composite-css-scripts")

        <script type="text/javascript">
            var ASSET_PATH_BASE = '{{url("/")}}';
            var baseUrl = '{{url("/")}}';
            var baseURL = '{{url("/")}}';

            //  query string params
            var queryStringParams = (function (rawParams) {
                if (rawParams == "")
                    return {};
                var paramsObject = {};
                for (var i = 0; i < rawParams.length; ++i)
                {
                    var p = rawParams[i].split('=', 2);
                    if (p.length == 1)
                        paramsObject[p[0]] = "";
                    else
                        paramsObject[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
                }
                return paramsObject;
            })(window.location.search.substr(1).split('&'));

        </script>        

        @if (Auth::check())
        @include('layouts.parts.session-js-data')
        @endif

    </head>
    <!-- END Head -->

    <body class="{{$pageLayout or "sidebar-full-height"}}">

        <script src="{{skarla_vendor_url("js/lib.min.js")}}"></script>

        <div class="main-wrap">
            <nav class="navigation">

                @include('layouts.parts.navbar')

                @if (Auth::check())
                @include('layouts.parts.access-based-sidebar-left')
                @endif

            </nav>

            <div class="content" style="min-height: 1763px; {{$viewOptions["subTitleBar"] == false? "padding-top: 10px;" : ""}}">

                @if ($viewOptions["subTitleBar"])

                @if (isset($navigationBreadcrumbs))
                @include('layouts.parts.sub-navbar-breadcrumbs')
                @else
                @include('layouts.parts.sub-navbar-title')
                @endif

                @endif                

                <div class="container">
                    <!-- START EDIT CONTENT -->

                    @yield('content')

                    <!-- END EDIT CONTENT -->
                </div>       

            </div>

            @if($viewOptions["footer"])
            @include('layouts.parts.footer')
            @endif

        </div>             

        @yield('vendor-js')

        <!--Compiled version of skarla/js/app scripts-->
        <link rel="stylesheet" href="{{skarla_vendor_url("css/lib.min.css")}}">
        <script src="{{skarla_js_url("app.min.e05f769f.js")}}"></script>        
        <!--<script src="{{skarla_js_url("plugins-init.js")}}"></script>-->

        @include("layouts.parts.composite-js-scripts")
        @include("layouts.parts.default-js")

        <script src="{{url("js/initialization-utility.js")}}"></script>       
        <script src="{{url("js/helpers.js")}}"></script>       

        @yield('js')

    </body>
</html>