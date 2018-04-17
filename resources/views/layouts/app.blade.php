<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>UserInfo</title>
    <link rel="stylesheet" href="{{url('/css/app.css')}}" type="text/css">
    {{--@include('inc.style');--}}
</head>
<body>
{{--Start of navigation bar--}}

<div class="row justify-content-lg-center justify-content-md-center justify-content-sm-center"  style="height: 3.5rem; background-color: #fff">
    <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
        <div class="nav">
            <div class="nav-item">
                <div class="nav-link active nav_ul_item" id="add_info">add information</div>
            </div>
            <div class="seprator">|</div>

            <div class="nav-item">
                <div class="nav-link nav_ul_item"  id="list_users">listing page</div>
            </div>
        </div>
    </div>
</div>

{{--End of Navigation bar--}}

   <main class="container-fluid">

            {{--@yield('contents')--}}

    </main>

{{--@include('inc.script')--}}
<script type="text/javascript" src="{{url('js/app.js')}}"></script>

{{--<script type="text/javascript" src="{{url('js/userinfo.js')}}"></script>--}}
</body>
</html>