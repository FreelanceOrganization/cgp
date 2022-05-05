<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CGP</title>

    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    {{-- link for css --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @stack('css')
</head>
<body>
    @include('common.user.alerts.alert')
    @include('common.user.loader')
    <div class="wrapper">
        @yield('content')
    </div>

    {{-- Javascript --}}
    @yield('before_end')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>
        console.log('here');
        $(window).on('load',function(){
            if(document.readyState == 'complete'){
                $('.loader').addClass('hide');
            }
        })
    </script>
    {{-- boostrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
