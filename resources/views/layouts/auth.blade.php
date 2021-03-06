<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <script nonce="2fffcb08-6967-44f2-b46e-bad256fd8e73">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
                    deferred: []
                }, a.zaraz.track = (e, t) => {
                    for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
                }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
                    a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
                }, a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w =
                        a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a
                        .innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href,
                        a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData
                        .n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), z
                        .defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON
                            .stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css?v=3.2.0">
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>

    <style>
        body {
            background-image: url("{{ asset('image/logo-bg.png') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 660px 768px;
            background-position: -200px -120px;
        }

        @media only screen and (max-width: 768px) {
            body {
                background-image: url("{{ asset('image/logo-bg.png') }}");
                background-size: 320px 360px;
                background-position: -100px -50px;

            }
        }

    </style>
</head>

<body class="hold-transition login-page">
    <img src="{{ asset('image') }}/perhubungan.png" alt="logo" width="60px">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ asset('admin') }}/index2.html"><b>e-Report</b></a>
            <p style="font-size: 18px">Kantor Unit Penyelenggaraan Pelabuhan <br> Kelas I Tanjung Uban</p>
        </div>

        @yield('content')
    </div>



    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('admin') }}/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
