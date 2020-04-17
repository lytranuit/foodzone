<!doctype html>
<html>
    <head lang="en">
        @include("include.head")
    </head><!--/head-->

    <body class='{{$template or ""}}'>
        @include("include.header")
        <main class="main-page">
            @yield("content")
        </main>
        @include("include.footer")
    </body>
</html>