<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="{{url("")}}/assets/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="{{url("")}}/assets/plugins/summernote/summernote-bs4.min.css">
    <script nonce="2127f37b-0fbb-4b7b-ba1b-59a657d054d6">(function(w,d){!function(bb,bc,bd,be){bb[bd]=bb[bd]||{};bb[bd].executed=[];bb.zaraz={deferred:[],listeners:[]};bb.zaraz.q=[];bb.zaraz._f=function(bf){return async function(){var bg=Array.prototype.slice.call(arguments);bb.zaraz.q.push({m:bf,a:bg})}};for(const bh of["track","set","debug"])bb.zaraz[bh]=bb.zaraz._f(bh);bb.zaraz.init=()=>{var bi=bc.getElementsByTagName(be)[0],bj=bc.createElement(be),bk=bc.getElementsByTagName("title")[0];bk&&(bb[bd].t=bc.getElementsByTagName("title")[0].text);bb[bd].x=Math.random();bb[bd].w=bb.screen.width;bb[bd].h=bb.screen.height;bb[bd].j=bb.innerHeight;bb[bd].e=bb.innerWidth;bb[bd].l=bb.location.href;bb[bd].r=bc.referrer;bb[bd].k=bb.screen.colorDepth;bb[bd].n=bc.characterSet;bb[bd].o=(new Date).getTimezoneOffset();if(bb.dataLayer)for(const bo of Object.entries(Object.entries(dataLayer).reduce(((bp,bq)=>({...bp[1],...bq[1]})),{})))zaraz.set(bo[0],bo[1],{scope:"page"});bb[bd].q=[];for(;bb.zaraz.q.length;){const br=bb.zaraz.q.shift();bb[bd].q.push(br)}bj.defer=!0;for(const bs of[localStorage,sessionStorage])Object.keys(bs||{}).filter((bu=>bu.startsWith("_zaraz_"))).forEach((bt=>{try{bb[bd]["z_"+bt.slice(7)]=JSON.parse(bs.getItem(bt))}catch{bb[bd]["z_"+bt.slice(7)]=bs.getItem(bt)}}));bj.referrerPolicy="origin";bj.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bb[bd])));bi.parentNode.insertBefore(bj,bi)};["complete","interactive"].includes(bc.readyState)?zaraz.init():bb.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{url("")}}/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        @include('template/topbar')

        @include('template/sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{$title}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$title}}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('views')
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="#">Lukman</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>


    <script src="{{url("")}}/assets/plugins/jquery/jquery.min.js"></script>

    <script src="{{url("")}}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script src="{{url("")}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{url("")}}/assets/plugins/chart.js/Chart.min.js"></script>

    <script src="{{url("")}}/assets/plugins/sparklines/sparkline.js"></script>

    <script src="{{url("")}}/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{url("")}}/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="{{url("")}}/assets/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="{{url("")}}/assets/plugins/moment/moment.min.js"></script>
    <script src="{{url("")}}/assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="{{url("")}}/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="{{url("")}}/assets/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="{{url("")}}/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="{{url("")}}/assets/dist/js/adminlte.js?v=3.2.0"></script>

    <script src="{{url("")}}/assets/dist/js/demo.js"></script>

    <script src="{{url("")}}/assets/dist/js/pages/dashboard.js"></script>
</body>
</html>
