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
    <div class="container-fluid" id="main_container">
        <div class="row" id="navbar_wrapper_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="navbar_wrapper_col">
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
        <div class="row" id="child_container_row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="child_container_col">

            </div>
        </div>

    </div>
    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
</body>
</html>