<?php require "./head.php"; ?>
<?php require "../jdf.php"; ?>
<?php require "./body.php"; ?>


<?php 

$postSuccess = "";
if (isset($_POST['submit'])) {

    if (
        !empty($_POST['title']) && $_POST['title'] !== ''
        && !empty($_POST['text']) && $_POST['text'] !== ''
        && !empty($_POST['category']) && $_POST['category'] !== ''
    ) {

        require "../assets/connect_to_db.php";

        $title = $_POST['title'];
        $text = $_POST['text'];
        $category = $_POST['category'];
        $nowTime = jdate("YmdF");
        // session_start();
        $user_id = $_SESSION['userID'];


        $sql = "INSERT INTO `posts` (user_id , title , text , category_id , last_updated) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([$user_id, $title, $text, $category, $nowTime]);
        $postSuccess = 'پست شما با موفقیت ثبت شد';
    }
} ?>

<section class="main p-5 bg-white" :class="open || 'active'">
    <?php if($postSuccess !== ""){ echo '<p class="alert alert-success">' . $postSuccess . '</p>'; } ?>
    <form method="post" action="#" dir="rtl">

        <div class="mb-3">
            <label for="title" class="form-label">عنوان مقاله</label>
            <input type="text" class="form-control" id="title" name="title">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>


        <div class="my-5">
            <label for="text" class="form-label">متن مقاله</label>
            <textarea class="form-control" id="text" rows="3" name="text"></textarea>
        </div>

        <div class="my-5 mx-0 w-75">
            <select class="form-select mx-5" name="category">
                <option value="" selected>دسته بندی مدنظر را انتخاب کنید</option>

                <?php
                require "../assets/connect_to_db.php";
                $stmt = $conn->query("SELECT * FROM `categories`");
                $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $category) {
                    echo "<option value='{$category['id']}'> " . $category['description']  . "</option>";
                }
                $conn = null;
                ?>

            </select>
        </div>

        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</section>

<?php require "./foot.php"; ?>