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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-none d-lg-block">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://cdn.imweb.me/upload/S20200903356594b8dc821/0962e15de8a7a.jpg" alt="..." />
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../">Main</a></li>
                <? if (isset($_SESSION['isLogin'])) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/src/mypage">My page</a></li>
                <? } ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./">Board</a></li>
                <li class="nav-item"><a class="nav-link" href="/src/service/">Service</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container p-0">

        <section class="resume-section" id="about">
            <div class="resume-section-content">

                <!-- Load Data -->
                <?
                $query = "select * from board where idx=?";
                $data = $db->query($query, $_GET['idx'])->fetchArray();

                $file_query = "SELECT * FROM file WHERE idx=?";
                $file = $db->query($file_query, $_GET['idx'])->fetchArray();
                ?>

                <!-- Back Icon -->
                <div class="mb-5">
                    <a href="./"><i class="bi bi-arrow-left-short fa-2x"></i></a>
                </div>

                <!-- Private Check -->
                <div <? if ($data['secret'] == NULL) {
                            echo "style='display:none;'";
                        } ?> class="d-flex-column" id="checkForm">
                    <p class="private-title">This post is private. Please enter a password.</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">&nbsp;*&nbsp;</span>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" id="inputPassword">
                    </div>
                    <button class="btn btn-secondary" onclick="checkPassword(<?= $data['secret'] ?>)">Check</button>
                </div>

                <!-- Post Detail -->
                <div <? if ($data['secret'] != NULL) {
                            echo "style='display:none;'";
                        } ?> id="postDetail">

                    <!-- Edit post -->
                    <? if ($data['uid'] == $_SESSION['isLogin']) { ?>
                        <div class="d-flex justify-content-end mb-3">
                            <a href="./editPost.php?idx=<?= $_GET['idx'] ?>" class="edit-icon mx-3">Edit <i class="fa-solid fa-wrench"></i></a>
                            <a href="" class="edit-icon" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete <i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    <? } ?>

                    <!-- Post content -->
                    <b>#<?= $data['idx'] ?></b>
                    <hr>
                    <b>ID : </b><?= $data['uid'] ?>
                    <hr>
                    <b>Title : </b><?= $data['title'] ?>
                    <hr>
                    <b>Regdate : </b>@<?= $data['regdate'] ?>
                    <hr>
                    <b>Content : </b><?= nl2br($data['content']) ?>
                    <?
                    if ($file) {
                        echo "<hr><b>File : </b>";
                        $file_idx = $file['idx'];
                        $file_name = $file['name'];
                        echo "<a href='fileDownload.php?file_idx=$file_idx'>$file_name</a>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="delete-modal-content">Do you really want to delete?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn delete-post-btn" onclick="location.href='deletePostProc.php?idx=<?= $data['idx'] ?>'">Delete</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        function checkPassword(password) {
            if (document.getElementById('inputPassword').value == password) {
                document.getElementById('checkForm').style = "display:none";
                document.getElementById('postDetail').style = "display:inline";
            }
        }
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>