<html>
<head>
    <title>GIAY DEP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{{ asset('assets/css/bootstrap.min.css') }}}" rel="stylesheet">
    <link href="{{{ asset('assets/css/bootstrap-responsive.min.css') }}}" rel="stylesheet">
    <style>
        input[type=text], input[type=number]{height:auto!important}
        td.text-right{text-align:right}
        .required:after{color:red;content:"*"}
        .icon-chevron-up,.icon-chevron-down{filter:alpha(opacity=20);opacity:0.2}
<<<<<<< HEAD
        .w-min{width:70px}
        .w-medium{width:127px}
=======
        .w-min{width:83px}
        .w-nedium{width:127px}
>>>>>>> origin/master
        .w-large{width:260px}
        .txt-large{color:red;font-size:16px;font-weight:700}
        .left{float:left;padding-right:5px}
        .gray{color:#B8A3A3!important}
        .red{color:red}
        .month1{background:#dff0d8}
        .txt-debt-total{font-size: 14px; font-weight: bold; color: #F00!important }
    </style>

    <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{{{ asset('assets/js/bootstrap.min.js') }}}"></script>
    <script>
        Common = {
            showError: function(errorMessages) {
                if(errorMessages) {
                    for (msg in errorMessages) {
                        obj = $("input[name='" + msg + "']").parent('td');
                        $(obj).addClass('control-group error');
                        $(obj).append(' <span class="help-inline">' + errorMessages[msg] + '</span>');
                    }
                }
            },
        }
        $(function(){
            $('.numbersOnly input').keyup(function () { 
                this.value = this.value.replace(/[^0-9\.]/g,'');
            });
        });        
    </script>
</head>
<<<<<<< HEAD

<body>
=======
    
<body data-spy="scroll">
>>>>>>> origin/master
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
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
    <div class="container">
        <div class="row">
            {{ Notification::showAll() }}
            @yield('content')
        </div>
    </div>
</body>
</html>