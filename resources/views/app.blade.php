<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>App Name - @yield('title')</title>
<link href="https://fonts.googleapis.com/css2?family=Kalam" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stack('styles')
<style>

    .sidebar{
        font-family: 'Kalam';
           font-size: 22px;
           color: #c88547;
    }
    .bg-dark{
        background-color: #ac723c !important;
    }
    a.nav-link.px-0.align-middle {
        color: white;
    }
    a.nav-link.px-0.align-middle:hover {
        color: #dfc5ac;
    }
    span.fs-5.d-none.d-sm-inline {
        color: #ac723c;
    }

    a.d-flex.align-items-center.pb-3.mb-md-0.me-md-auto.text-white.text-decoration-none {
        background-color: #f6f3f3;
        width: 100%;
        justify-content: flex-start;
        border-radius: 10px;
        line-height: 20px;
        height: 40px;
        justify-content: center;
        padding: 0;
        padding-top: 18px;
    }
    .footer-sidebar {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        text-align: center;
        margin: auto;
        position: fixed;
        bottom: 0;
    }
    .dropdown-menu-dark {
        background-color: #ac723c !important;
    }
</style>

</head>
    <body>
        @section('sidebar')

            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <div class="sidebar col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                <span class="fs-5 d-none d-sm-inline">BrewMaster</span>
                            </a>
                            <ul class="nav nav-pills flex-column mb-sm-auto mt-2 mb-0 align-items-center align-items-sm-start" id="menu">

                                <li>
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                          </svg> <span class="ms-1 d-none d-sm-inline">List Beers</span></a>
                                </li>


                            </ul>
                            <hr>
                            <div class="footer-sidebar dropdown pb-4">
                                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://images.unsplash.com/photo-1557094181-297b853a643e?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                    <span class="d-none d-sm-inline mx-1">User</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        @yield('content')
                        @show
                    </div>
                </div>
            </div>






        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://momentjs.com/downloads/moment.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @stack('script')
    </body>
</html>
