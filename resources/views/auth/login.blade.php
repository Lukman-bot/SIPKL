<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi PKL | Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{url("")}}/assets/style/css/adminlte.min.css">
    <script nonce="99952dd9-1264-4584-b0f3-ecd7a13cdb66">
        (function (w, d) {
            ! function (a, e, t, r) {
                a.zarazData = a.zarazData || {};
                a.zarazData.executed = [];
                a.zaraz = {
                    deferred: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function (e) {
                    return function () {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.zaraz.init = () => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                    a.zarazData.x = Math.random();
                    a.zarazData.w = a.screen.width;
                    a.zarazData.h = a.screen.height;
                    a.zarazData.j = a.innerHeight;
                    a.zarazData.e = a.innerWidth;
                    a.zarazData.l = a.location.href;
                    a.zarazData.r = e.referrer;
                    a.zarazData.k = a.screen.colorDepth;
                    a.zarazData.n = e.characterSet;
                    a.zarazData.o = (new Date).getTimezoneOffset();
                    a.zarazData.q = [];
                    for (; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a
                        .startsWith("_zaraz_"))).forEach((t => {
                        try {
                            a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                        } catch {
                            a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                        }
                    }));
                    z.referrerPolicy = "origin";
                    z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                    t.parentNode.insertBefore(z, t)
                };
                ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);

    </script>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo text-center">
                <img src="{{ url('assets/logo.png') }}" style="width: 150px;">
            </div>
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <p class="h4">Sistem Informasi PKL SMK Daarul Abroor</p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{url("/")}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="kata_kunci">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">

                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script src="{{url("")}}/assets/plugins/jquery/jquery.min.js"></script>
        <script src="{{url("")}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url("")}}/assets/style/js/adminlte.min.js"></script>
        <!-- jquery-validation -->
        <script src="{{url("")}}/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="{{url("")}}/assets/plugins/jquery-validation/additional-methods.min.js"></script>
    </body>
</html>
