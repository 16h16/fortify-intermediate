<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="@yield('style')">
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('status')
        @yield('content')
        @yield('error')
        @yield('script')
    </body>
</html>
