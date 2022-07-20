<?
include "../default_setting.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WebHell - haram</title>
    <link rel="icon" type="image/x-icon" href="bootstrap/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/bootstrap/css/styles.css" rel="stylesheet" />

    <!-- My Styles -->
    <link href="/src/mystyles.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <div class="navbar-brand">
            <span class="d-none d-lg-block">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="https://cdn.imweb.me/upload/S20200903356594b8dc821/0962e15de8a7a.jpg" alt="..." />
            </span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/">Main</a></li>
                <? if (isset($_SESSION['isLogin'])) { ?>
                <li class="nav-item"><a class="nav-link" href="/src/mypage">My page</a></li>
                <? } ?>
                <li class="nav-item"><a class="nav-link" href="/src/board/">Board</a></li>
                <li class="nav-item"><a class="nav-link" href="/src/service/">Service</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container-fluid p-0">
        <section class="resume-section" id="about">
            <div class="resume-section-content">

                <!-- Ping service -->
                <div>
                    <p class="service-title">Ping Service</p>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="IP Address" aria-label="ip"
                            aria-describedby="basic-addon1" id="ipAddress">
                        <button type="button" class="btn default-btn service-btn" onclick="ping()">Ping!</button>
                    </div>
                </div>

                <hr class="my-5">

                <!-- DNS Lookup Service -->
                <div>
                    <p class="service-title">DNS Lookup Service</p>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="URL Address" aria-label="url"
                            aria-describedby="basic-addon1" id="urlAddress">
                        <button type="button" class="btn default-btn service-btn" onclick="dnslookup()">Lookup!</button>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <script>
    function ping() {
        let ip = document.getElementById('ipAddress').value;
        let reg = /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;

        if (reg.test(ip)) {
            location.href = 'pingProc.php?ip=' + ip;
        } else {
            alert("Invalid IP Address!");
        }
    }

    function dnslookup() {
        let url = document.getElementById('urlAddress').value;

        if (url != "") {
            location.href = 'dnslookupProc.php?url=' + url;
        } else {
            alert("Invalid URL Address!");
        }
    }
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>