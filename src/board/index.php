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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/src/mypage">My page</a></li>
                <? } ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./">Board</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container p-0">

        <section class="resume-section" id="about">
            <div class="resume-section-content">

                <? if (!isset($_SESSION['isLogin'])) { ?>
                    <!-- Before Log In -->
                    <p class="display-6">Please Log in first <a href="../../"><i class="bi bi-house-door"></i></a></p>
                <? } else { ?>
                    <!-- After Log In -->
                    <div class="p-3 text-end">
                        <a href="post.php"><i class="fa-2x bi bi-pencil-square"></i></a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">title</th>
                                <th scope="col">regdate</th>
                                <th scope="col">isSecret</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            $query = "select * from board";
                            $list = $db->query($query)->fetchAll();
                            foreach ($list as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $data['idx'] ?></th>
                                    <td><?= $data['uid'] ?></td>
                                    <td><a href="./detail.php?idx=<?= $data['idx'] ?>"><?= $data['title'] ?></a></td>
                                    <td>@<?= $data['regdate'] ?></td>
                                    <td>
                                        <? if ($data['secret'] != NULL) { ?>
                                            <i class="fa-solid fa-lock"></i>
                                        <? } ?>
                                    </td>
                                </tr>
                            <?  } ?>
                        </tbody>
                    </table>
                <? } ?>
            </div>
        </section>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>