<html>
    <head>
        <title>GIAY DEP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="{{{ asset('assets/css/bootstrap.min.css') }}}" rel="stylesheet">
        <link href="{{{ asset('assets/css/bootstrap-responsive.min.css') }}}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
		
        <script src="{{{ asset('assets/js/jquery-v1.10.2.js') }}}"></script>
        <script src="{{{ asset('assets/js/bootstrap.min.js') }}}"></script>
        <script src="{{{ asset('assets/js/common.js') }}}"></script>
    </head>
    <body>

        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="/">{{ $title }}</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav  nav-pills">
                            <li><a href="/seller">{{ MyLang::out('Seller') }}</a></li>
                            <li><a href="/seller-invoice">{{ MyLang::out('Seller Invoice') }}</a></li>                            
                            <li><a href="/share-holder-cost">{{ MyLang::out('Share Holder Cost') }}</a></li> 
							<li><a href="/share-holder">{{ MyLang::out('Share Holder') }}</a></li>
							<li><a href="/report">{{ MyLang::out('Report') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>          
        </div>

        <!-- MAIN CONTENT -->
        <div class="container-fluid">
            <div class="row-fluid">
                {{ Notification::showAll() }}
                @yield('content')
            </div>
        </div>
    </body>
</html>