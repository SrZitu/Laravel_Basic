<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade</title>
</head>

<body>
    <h2>

        wellcome, {{ $name ?? 'guest' }}
    </h2>
    {{-- we can display data this two ways --}}
    {{ $data1 }}
    {!! $data1 !!}

    {{-- Conditional statement --}}
    @if ($name == '')
        {{ 'name is empty' }}
    @elseif($name == 'sazzad')
        {{ 'name is correct' }}
    @else
        {{ 'name is incorrect' }}
    @endif

    @unless($name == 'sazzad')
        <h2> You are not valid user</h2>
    @endunless

    <h1>
        @isset($name)
            welcome {{ $name }}
        @endisset
    </h1>

    <h1>
        @for ($i = 1; $i <= 10; $i++)
            The current value is {{ $i }}<br />
        @endfor
    </h1>
    @php
        $i = 1;

    @endphp
    @while ($i <= 10)
        <h2>Number is increasing in while:{{ $i }}</h2>
        @php
            $i++;
        @endphp
    @endwhile


    @php
        $countries = ['Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan'];
    @endphp
    <select name="" id="">
        @foreach ($countries as $key => $country)
            <option value="{{ $key }}">{{ $country }}</option>
        @endforeach
    </select>
    <h2>Break Starts</h2>
    @for ($i = 1; $i < 10; $i++)
        @if ($i == 5)
        @break
    @endif
    <h2>{{ $i }}</h2>
@endfor
<h2>
    continue Starts
</h2>
@for ($i = 1; $i < 10; $i++)
    @if ($i == 5)
        @continue
    @endif
    <h2>{{ $i }}</h2>
@endfor


</body>

</html>
