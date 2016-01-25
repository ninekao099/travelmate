<!DOCTYPE html>
<html>
    <head>

    <title>Travel Mate Backoffice</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    </head>
    <body>
        <!--Start Menu-->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#id_nav1"
                >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Travel Mate</a>
            </div>
            <div class="collapse navbar-collapse" id="id_nav1">
                <ul class="nav navbar-nav">

                    
                    <li @if($menu == 1) class="active" @endif ><a href="/backoffice/travel"> กิจกรรม </a></li>

                    <li @if($menu == 2) class="active" @endif ><a href="/backoffice/category/add"> หมวดหมู่ </a></li>

                    <li @if($menu == 3) class="active" @endif ><a href="#"> สติ๊กเกอร์ </a></li>

                    <li @if($menu == 4) class="active" @endif ><a href="#"> รีวิว </a></li>


                    <li @if($menu == 5) class="active" @endif class="dropdown">
                        <a class="dropdown-toggle" 
                            data-toggle="dropdown" 
                            href="#"> 
                            สมาชิก <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="/backoffice/users">ผู้ใช้งานแอปฯ</a></li>
                        <li><a href="#">เจ้าของกิจกรรม</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--End Menu-->

    <div class="col-sm-3"></div>
    <div class="container" style="margin-top:80px">

        @yield('content')

    </div>


    </body>
</html>
