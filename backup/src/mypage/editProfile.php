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
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
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
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="https://cdn.imweb.me/upload/S20200903356594b8dc821/0962e15de8a7a.jpg" alt="..." />
            </span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../">Main</a></li>
                <? if (isset($_SESSION['isLogin'])) { ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./">My page</a></li>
                <? } ?>
                <li class=" nav-item"><a class="nav-link js-scroll-trigger" href="../board">Board</a></li>
                <li class="nav-item"><a class="nav-link" href="/src/service/">Service</a></li>
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
                    <a class="edit-profile align-self-end mb-3 display-6" href="./">
                        <i class="bi bi-x"></i>
                    </a>

                    <p class="profile-title">New Username</p>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="<?= $data['name'] ?>" aria-label="Username"
                            aria-describedby="basic-addon1" id="username">
                    </div>
                    <hr>
                    <p class="profile-title">New User ID</p>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="<?= $data['uid'] ?>" aria-label="Userid"
                            aria-describedby="basic-addon1" id="uid">
                    </div>

                    <hr>
                    <p class="profile-title">New Password</p>
                    <div class="input-group my-3">
                        <input type="password" class="form-control" aria-label="Password"
                            aria-describedby="basic-addon1" id="newpass">
                    </div>

                    <button type="button" class="btn edit-btn mt-5" data-bs-toggle="modal"
                        data-bs-target="#editModal">Edit Profile</button>

                </div>
                <? } ?>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Closewww"></button>
                        </div>

                        <div class="modal-body">
                            <!-- input -->
                            <p class="edit-modal-content">Do you really want to edit profile?</p>

                            <!-- <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;*&nbsp;</span>
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                                    aria-describedby="basic-addon1" name="upass" id="upass">
                            </div> -->
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn edit-btn" onclick="checkCurrentPassword()">Edit</button>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

    <script>
    function checkCurrentPassword() {
        // let username = document.getElementById('username').value;
        // let uid = document.getElementById('uid').value;
        // let newpass = document.getElementById('newpass').value;

        // if (username == "" || uid == "" || newpass == "") {
        //     alert("Fill the all input box.");
        // } else {
        //     location.href = "editProfileProc.php?username=" + document.getElementById('username').value + "&uid=" +
        //         document
        //         .getElementById('uid').value + "&newpass=" +
        //         document.getElementById('newpass').value + "&pwd=" + document.getElementById(
        //             'upass').value;
        // }
        location.href = "editProfileProc.php?username=" + document.getElementById('username').value + "&uid=" + 
            document.getElementById('uid').value + "&newpass=" + document.getElementById('newpass').value;
    }
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>