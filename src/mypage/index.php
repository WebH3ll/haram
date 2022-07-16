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
    <title>Board</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../bootstrap/css/styles.css" rel="stylesheet" />

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

    <!-- my css -->
    <link href="/src/mystyles.css" rel="stylesheet" />
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
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../">Main</a></li>
                <? if (isset($_SESSION['isLogin'])) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./">My page</a></li>
                <? } ?>
                <li class=" nav-item"><a class="nav-link js-scroll-trigger" href="../board">Board</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container p-0">

        <section class="resume-section" id="about">
            <div class="resume-section-content">

                <!-- My page -->
                <? if (!isset($_SESSION['isLogin'])) { ?>
                    <!-- Before Log In -->
                    <p class="display-6">Please Log in first <a href="../../"><i class="bi bi-house-door"></i></a></p>
                <? } else { ?>
                    <!-- After Log In -->
                    <?
                    $query = "select * from user where uid=?";
                    $data = $db->query($query, $_SESSION['isLogin'])->fetchArray();
                    ?>
                    <div class="d-flex flex-column">
                        <a class="edit-profile align-self-end mb-3" href="editProfile.php">
                            Edit profile <i class="fa-solid fa-user-pen"></i>
                        </a>
                        <p class="profile-title">Username</p>
                        <p class="profile-content"><?= $data['name'] ?></p>
                        <hr>
                        <p class="profile-title">User ID</p>
                        <p class="profile-content"><?= $data['uid'] ?></p>

                        <button type="button" class="btn delete-btn mt-5" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete account</button>

                    </div>
                <? } ?>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Closewww"></button>
                        </div>

                        <!-- Modal Form -->
                        <form action="src/login/signup.php" method="post">
                            <div class="modal-body">
                                <!-- input -->
                                <p class="delete-modal-content">Are you sure you want to delete your account?</p>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;*&nbsp;</span>
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="upass">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn delete-btn">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </section>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="bootstrap/js/scripts.js"></script>
</body>

</html>