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
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/bootstrap/css/styles.css" rel="stylesheet" />

    <!-- My Styles -->
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
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">Main</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container-fluid p-0">

        <section class="resume-section" id="about">
            <div class="resume-section-content">

                <!-- Title -->
                <h3 class="mb-5">[User List]</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $query = "select * from user";
                        $list = $db->query($query)->fetchAll();
                        foreach ($list as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?= $data['idx'] ?></th>
                                <td><?= $data['uid'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['ip'] ?></td>
                                <td><a href="deleteUser.php?idx=<?= $data['idx'] ?>">Delete</a></td>
                            </tr>

                        <?  } ?>
                    </tbody>
                </table>

            </div>
        </section>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- my script -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>