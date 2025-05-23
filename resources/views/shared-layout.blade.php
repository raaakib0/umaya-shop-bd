<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Umaya Shop Bd</title> --}}
    <title> @yield('title', 'Umaya Shop Bd' ) </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('header')

@yield('content')

    @include('footer')

</body>
</html>
