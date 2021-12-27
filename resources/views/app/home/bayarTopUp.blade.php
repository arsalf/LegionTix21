<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/plyr.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/myStyle.css') }}" type="text/css">
    <!-- Template Main CSS File -->
    
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title> Bayar Top Up </title>
</head>
<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('status')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                    
        </div>
    @endif  

    <div class="container d-flex justify-content-center align-items-center text-white h-100">
        <div class="wrap">
            <form method="POST" action="{{ route('home.store') }}">
                <input type="hidden" name="dompet_id" value="{{ Auth::user()->id }}">
                @csrf
                <div class="form-group row">
                    <label for="inputKode" class="col-sm-5"><b> Kode Pembayaran </b></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputKode" name="inputKode" placeholder="Kode Pembayaran">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNominal" class="col-sm-5">Nominal</label>
                    <div class="col-sm-7">
                        <input type="Number" class="form-control" id="inputNominal" name="inputNominal" placeholder="Nominal">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary mx-3" href="{{route('home.index')}}">Home</a>
                    <button type="submit" class="btn btn-primary mx-3">Top Up!</button>
                </div>                
            </form>
        </div>
    </div>
    <!-- Js Plugins -->
    <script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/js/player.js') }}"></script>
    <script src="{{ asset('home/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('home/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/js/main.js') }}"></script>
    
    </body>
</html>