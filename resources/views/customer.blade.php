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

<body class="bg-dark">
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-sm">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white">WsCube Tech</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" style="color: white">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}" style="color: white">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/customer') }}" style="color: white">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/upload') }}" style="color: white">Upload</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <form action="{{ $url }}" method="POST">
        @csrf
        <div class="container mt-4 card p-3 bg-white">
            <h3 class="text-center text-primary">{{ $title }}</h3>
            <div class="row">
                <div class="form-group col-md-6 required">
                    <label for="">Name:</label>
                    <input type="text" name="name" id="" class="form-control"
                        value="{{ old('name', isset($customer->name) ? $customer->name : '') }}" />
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6 required">
                    <label for="">Email:</label>
                    <input type="email" name="email" id="" class="form-control"
                        value="{{ old('email', isset($customer->email) ? $customer->email : '') }}" />
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 required">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" />
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6 required">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="" class="form-control" />
                    <span class="text-danger">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 required">
                    <label for="">Country:</label>
                    <input type="text" name="country" id="" class="form-control"
                        value="{{ old('country', isset($customer->country) ? $customer->country : '') }}" />
                    <span class="text-danger">
                        @error('country')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6 required">
                    <label for="">State:</label>
                    <input type="text" name="state" id="" class="form-control"
                        value="{{ old('state', isset($customer->state) ? $customer->state : '') }}" />
                    <span class="text-danger">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Address:</label>
                    <textarea name="address" class="form-control" id="" rows="3">{{ old('address', isset($customer->address) ? $customer->address : '') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Gender:</label><br />
                    <div class="form-check form-check-inline">
                        <label for="" class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="M"
                                @if (isset($customer->gender)) {{ $customer->gender == 'M' ? 'checked' : '' }} @endif>Male


                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="" class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="F"
                                @if (isset($customer->gender)) {{ $customer->gender == 'F' ? 'checked' : '' }} @endif>Female

                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="" class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="O"
                                @if (isset($customer->gender)) {{ $customer->gender == 'O' ? 'checked' : '' }} @endif>Other

                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Date of birth:</label>
                    <input type="date" name="dob" id="" class="form-control"
                        value="{{ old('dob', isset($customer->dob) ? $customer->dob : '') }}" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Submit
                    </button>
                </div>
            </div>
        </div>

    </form>
</body>

</html>
