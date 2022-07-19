<?
include "src/default_setting.php";
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
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/bootstrap/css/styles.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <div class="navbar-brand js-scroll-trigger">
            <span class="d-none d-lg-block">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://cdn.imweb.me/upload/S20200903356594b8dc821/0962e15de8a7a.jpg" alt="..." />
            </span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">Main</a></li>
                <? if (isset($_SESSION['isLogin'])) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/src/mypage">My page</a></li>
                <? } ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/src/board/">Board</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container-fluid p-0">

        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Hello
                    <?
                    if (isset($_COOKIE['user_name'])) {
                    ?>
                        <span class="text-primary"><?= $_COOKIE['user_name'] ?></span>
                    <? } else { ?>
                        <span class="text-primary">Web-Hell</span>
                    <? } ?>
                </h1>
                <div class="subheading mb-5">
                    2022-Summer Web-Hell Study
                </div>

                <!-- Before Log In -->
                <?
                if (!isset($_SESSION['isLogin'])) {
                ?>

                    <!-- login manage -->
                    <form class="container" action="src/login/loginProc.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="uid">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;*&nbsp;</span>
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="upass">
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary text-secondary w-75">Login</button>

                            <button type="button" class="btn btn-outline-primary text-secondary w-25" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
                        </div>
                    </form>

                <? } else { ?>
                    <!-- After Log In -->
                    <button type=" button" class="btn btn-primary text-secondary w-10" onclick="location.href='src/login/logout.php'">Logout</button>
                <? } ?>

                <!-- social icons -->
                <div class=" social-icons mt-5">
                    <a class="social-icon" href="https://github.com/WebH3ll" target="_blank"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="https://myoungseok98.notion.site/Web-Hacking-WebH3ll-70ee025b579b4ac08439320c4c700dd7" target="_blank"><span class="iconify" data-icon="simple-icons:notion"></span></a>
                    <a class="social-icon" href="http://13.125.207.167/" target="_blank"><i class="fa-brands fa-aws"></i></a>
                </div>


            </div>

            <!-- Modal -->
            <div class=" modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Form -->
                        <form action="src/login/signup.php" method="post">
                            <div class="modal-body">
                                <!-- input -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;?&nbsp;</span>
                                    <input type="text" class="form-control" placeholder="name" aria-label="Password" aria-describedby="basic-addon1" name="name">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">@</span>
                                    <input type="text" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1" name="uid">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;*&nbsp;</span>
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="upass">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Sign up</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- my script -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>