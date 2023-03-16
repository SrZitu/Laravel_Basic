<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ url('/') }}/register" method=post>
            @csrf
            @php
                $integer = 1;
            @endphp
            <h2 class="text-center">Form validation </h2>
            <x-input type="text" name="name" label="Enter your Name" :integer="$integer" />
            <x-input type="email" name="email" label="Enter your email" />
            <x-input type="password" name="password" label="password" />
            <x-input type="password" name="password_confirmation" label="confirm password" />
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
