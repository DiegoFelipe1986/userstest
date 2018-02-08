<!DOCTYPE html>
<html>
    <head>
        <title>AuthApp</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            @include('generic.navbar')
            <br>
            @include('generic.show-message')
            @include('generic.errors-message')
            @yield('content')
        </div>
    </body>
</html>