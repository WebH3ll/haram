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
    <link href="bootstrap/css/styles.css" rel="stylesheet" />

    <!-- my css -->
    <link href="bootstrap/css/mystyles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <?
    $isLogin = $_SESSION['isLogin'];
    if (!isset($isLogin)) {
    ?>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-none d-lg-block">
                    <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://cdn.imweb.me/upload/S20200903356594b8dc821/0962e15de8a7a.jpg" alt="..." />
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                </ul>
            </div>
        </nav>

        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
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

                    <!-- login manage -->
                    <form class="container" action="src/login/loginProc.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;*&nbsp;</span>
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary text-secondary w-75">Login</button>

                            <button type="button" class="btn btn-outline-primary text-secondary w-25" data-bs-toggle="modal" data-bs-target="#exampleModal"">Sign up</button>
                        </div>
                    </form>
                <? } ?>

            <!-- Modal -->
            <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <!-- social icons -->
                        <div class="social-icons mt-5">
                            <a class="social-icon" href="https://github.com/WebH3ll"><i class="fab fa-github"></i></a>
                            <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                        </div>
            </section>
        </div>
        <hr class="m-0" />
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="bootstrap/js/scripts.js"></script>

        <!-- my script -->
        <script src="src/js/index.js>"></script>
</body>

</html>