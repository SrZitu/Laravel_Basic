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

    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-sm">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white">
                    @if (session()->has('name'))
                        {{ session()->get('name') }}
                    @else
                        Guest
                    @endif

                </a>
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
                        <a class="nav-link" href="{{ url('/en') }}" style="color: red">English</a>
                        <a class="nav-link" href="{{ url('/ban') }}" style="color: rgb(226, 44, 44)">Bangla</a>
                        <a class="nav-link" href="{{ url('/hi') }}" style="color: rgb(247, 72, 72)">Hindi</a>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row m-2">

            <form action="" class="col-8">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Name or Email"
                        value="{{ $search }}">
                </div>

                <button class="btn btn-success" type="submit">Search</button>
                <a href="{{ url('/customer') }}">
                    <button type="button" class="btn btn-primary">Reset</button>
                </a>
            </form>

            <div class="col-3">
                <a href="{{ route('customer.create') }}">
                    <button class="btn btn-primary d-line-block m-2 float-right"> Add </button>
                </a>

                <a href="{{ route('customer.trash') }}">
                    <button class="btn btn-danger d-line-block m-2 float-right"> Go to trash </button>
                </a>
            </div>

            <h1>@lang('lang.welcome')</h1>
            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>DOB</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                @if ($customer->gender == 'M')
                                    male
                                @elseif ($customer->gender == 'F')
                                    Female
                                @else
                                    Other
                                @endif
                            </td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->state }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>
                                @if ($customer->status == '1')
                                    <a href="">
                                        <span class="badge badge-success rounded-pill">Active</span>
                                    </a>
                                @else
                                    <a href="">
                                        <span class="badge badge-danger rounded-pill">Inactive</span>
                                    </a>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('customer.delete', ['id' => $customer->id]) }}">
                                    <button class="btn btn-danger btn-outline-light btn-sm">Trash</button>
                                </a>
                                <a href="{{ route('customer.edit', ['id' => $customer->id]) }}">
                                    <button class="btn btn-primary btn-outline-light btn-sm">edit</button>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($customers instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    {{ $customers->links() }}
                </ul>
            </div>
        @endif
        </div>
    </div>

</body>

</html>
