<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/css/style.css">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Css Reset -->
    <link rel="stylesheet" href="styles/css/reset.css">
    <!-- NavBar Style -->
    <link rel="stylesheet" href="styles/css/nav.css">
    <!-- Footer Style -->
    <link rel="stylesheet" href="styles/css/footer.css">
    <!-- Posts Style -->
    <link rel="stylesheet" href="./styles/css/posts.css">
    <!-- Vazir Font -->
    <link rel="stylesheet" href="fonts/vazir.css">
    <!-- Fontawsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>پست ها</title>
</head>

<body>
<div class="modal fade" id="modalSearchBox">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="#" class="position-relative">
                <input type="search" placeholder="جستجو ..." class="form-control searchField">
                <button class="searchBtn"><i class="fas fa-search fs-6"></i></button>
            </form>
        </div>
    </div>
</div>

<nav class="navMenu navbar navbar-dark navbar-expand-lg align-items-center bg-primary fixed-top">
    <div class="container flex-row-reverse">
        <div class="d-flex align-items-center">
            <button type="button" class="search-icon" data-bs-toggle="modal" data-bs-target="#modalSearchBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search"
                     viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <button id="switchTheme"></button>
            <a class="navbar-brand text-white fw-bold fs-5" href="https://google.com" target="_blank"><img
                        src="https://codeyad.com/assets/images/logo.png?v=LeGU9ZpNcH1zdFN4EVqXRwoS_Iaehq3X46AqXt2uWPk"
                        alt="Codeyad"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <i class="fas fa-bars fs-3"></i>
        </button>


        <div class="collapse navbar-collapse right-nav justify-content-start" id="navbar">
            <ul class="navbar-nav nav-left">
                <li class="nav-item me-0">
                    <a class="nav-link mt-3 mt-lg-0" href="/index.html">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>خانه</span>
                    </a>
                </li>
                <li class="nav-item me-0">
                    <a class="nav-link mt-3 mt-lg-0" href="/posts.html">
                        <i class="fas fa-list"></i>
                        <span>پست ها</span>
                    </a>
                </li>

                <li class="nav-item me-0">
                    <a class="nav-link mt-3 mt-lg-0" href="/login.php">
                        <i class="fa fa-sign-in ms-1"></i>
                        <span>ورود</span>
                    </a>
                </li>

                <li class="nav-item me-0">
                    <a class="nav-link mt-3 mt-lg-0" href="/register.php">
                        <i class="fa fa-user-plus ms-1"></i>
                        <span>عضویت</span>
                    </a>
                </li>
            </ul>
        </div>


    </div>
</nav>


<div class="container mx-auto">
    <div class="row" style="margin-top: 10rem; margin-bottom: 5rem;">
        <h1 class="posts__title">پست ها</h1>

        <?php
        require "./assets/connect_to_db.php";
        $stmt = $conn->query("SELECT * FROM `posts` ");
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

        <?php
        function limit_words($string, $word_limit)
        {
            $words = explode(" ", $string);
            return implode(" ", array_splice($words, 0, $word_limit));
        }

//        $content = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
//        echo limit_words($content, 20);


        foreach ($posts as $post): ?>


            <div class="col-md-6 col-lg-3 mt-3 my_post">
                <div class="post">
                    <div class="post__img">
                        <a href="#">
                            <img src="images/post_img.png" class="w-100 rounded" alt="Image post">
                        </a>
                    </div>
                    <h4 class=""><a href="#" class="post__title d-block"><?= $post['title'] ?></a></h4>
<!--                    style="height: 150px; overflow: hidden;text-overflow: ellipsis; white-space:wrap;-->
                    <p class="post__desc">
<!--                        -->
<!--//                        echo limit_words($post['text'] , 5) . ' ... ';-->
//                        <?= limit_words($post['text'] , 5) . ' ... ' ?>
                    </p>
                    <div class="info d-flex justify-content-between my-4"
                         style="color: rgb(185, 188, 188); font-size: 12px;">
                        <div>
                            <i class="bi bi-person "></i>
                            <span class="mx-1">
                                <?php
                                $statement = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                                $statement -> execute([$post['user_id']]);
                                $user = $statement ->fetch();
                                echo $user['username'];
                                ?>
                            </span>
                        </div>
                        <div>
                            <i class="bi bi-calendar3"></i>
                            <span class="m-xl-1"><?= substr($post['last_updated'], 8, 4) . ' / ' . substr($post['last_updated'], 0, 8) ?></span>
                        </div>
                    </div>
                    <a href="./single.php?id=<?=$post['id']?>" class="post__link">مشاهده پست</a>
                </div>
            </div>

        <?php endforeach; ?>


    </div>
</div>

<footer class="footer">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <p class="fw-bold text-white mb-3 mb-md-0 fs-6">تمامی حقوق برای کدیاد محفوظ می باشد &copy;</p>
        <button type="button" id="scrollUpBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-arrow-up-circle"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
            </svg>
        </button>
    </div>
</footer>

<script src="js/bootstrap.bundle.js"></script>
<script src="js/scrollToUp.js"></script>
<script src="js/darkMode.js"></script>
</body>

</html>