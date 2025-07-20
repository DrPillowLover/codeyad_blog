<?php require "./head.php"; ?>
<?php require "./body.php"; ?>
<?php require "../assets/connect_to_db.php"; ?>


<section class="main pt-5 d-flex justify-content-center flex-column bg-white" :class="open || 'active'">

    <div class="d-flex justify-content-center align-items-center flex-column bg-white">


        <form method="post" action="#" class="d-flex w-75">
            <input name="text" type="text" class="form-control search-input rounded-pill me-5"
                   placeholder="جست و جو...">

            <!-- <select class="form-select mx-5" name="field">
                <option value="" selected>فیلد مدنظر را انتخاب کنید</option>
                <option>id</option>
                <option>username</option>
                <option>email</option>
            </select> -->

            <button class="btn btn-primary rounded-pill" name="submit">جستجو</button>
        </form>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        $text = $_POST["text"];
        $sql = "SELECT * FROM `posts` WHERE `title` LIKE ? OR `text` LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["%$text%", "%$text%"]);
        $posts = $stmt->fetchAll();

        if ($posts) { ?>

            <table class="table table-striped text-center bg-white mt-5">
                <thead>
                <tr>

                    <th scope="col">عنوان</th>
                    <th scope="col">متن</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>


                <?php foreach ($posts as $post): ?>
                    <tr class='searchResult'>
                        <td> <?= $post["title"] ?> </td>
                        <td style='font-size: 12px'> <?= $post["text"] ?> </td>
                        <td>
                            <a class='btn btn-danger m-1' href="./delete1.php?id=<?=$post['id']?>">
                            <i class='bi bi-trash'></i>
                            </a >
                            <a class='btn btn-warning m-1' href="modify_posts.php?id=<?=$post['id']?>">
                                <i class='bi bi-pencil'></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>


        <?php } else {
            echo "<h5 class='alert alert-danger m-5 px-3'>محتوایی با این مشخصات یافت نشد</h5>";
        } ?>


        <?php
    }
    ?>

</section>


<?php require "./foot.php"; ?>
