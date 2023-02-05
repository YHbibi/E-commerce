<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('components.Bootstrape')

    <title>
        @yield('titre')
    </title>

</head>

<body>

    <header class="navbar navbar-expand-lg navbar-light bg-light mb-3 ">
        <div class="container-fluid ">
            @include('components.navbar')
        </div>
    </header>

    <div class="m-2">
        @include('components.Alerts')
    </div>

    @if($errors->any())
        <ul class="list-group m-3">
            @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger border border-danger rounded-0 mb-1">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    
    @yield('contenu')


    @include('components.footer')
    @include('components.script')
</body>
</html>