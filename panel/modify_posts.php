<?php require "./head.php"; ?>
<?php require "./body.php"; ?>
<?php require "../assets/connect_to_db.php"; ?>
<?php
session_start();
$getID = $_GET["id"];
$x = false;
if(isset($_POST["edit"])){
    $title = $_POST["title"];
    $text = $_POST["text"];
    $category = $_POST["category"];

    $sql = "UPDATE `posts` SET `title` = ?, `text` = ? , `category_id` = ? WHERE `id` = ?";
    $UPDATE = $conn -> prepare($sql);
    $UPDATE -> execute([$title, $text, $category, $getID]);
    $x = true;
}
if ($x == true) {
    header("location:search.php");
}
?>

<?php
$SELECT = $conn -> prepare("SELECT * FROM `posts` WHERE `id` = ? ");
$SELECT -> execute([$getID]);
$data = $SELECT -> fetch(PDO::FETCH_ASSOC);
?>

    <section class="main p-5 bg-white" :class="open || 'active'">
        <form method="post" action="#" dir="rtl">

            <div class="mb-3">
                <label for="title" class="form-label">عنوان مقاله</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'] ?>" >
            </div>


            <div class="my-5">
                <label for="text" class="form-label">متن مقاله</label>
                <textarea class="form-control" id="text" rows="3" name="text"><?php echo $data['text'] ?></textarea>
            </div>

            <div class="my-5 mx-0 w-75">
                <select class="form-select mx-5" name="category">
                    <option value="" selected>دسته بندی مدنظر را انتخاب کنید</option>

                    <?php
                    $stmt = $conn->query("SELECT * FROM `categories`");
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $category) {

                        if($category['id'] == $data['category_id']){
                            echo "<option value='".$category['id']."' selected>".$category['description']."</option>";
                        }else{
                            echo "<option value='".$category['id']."'>".$category['description']."</option>";
                        }

                    }
                    ?>

                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="edit">Submit</button>
        </form>
    </section>



<?php require "./foot.php"; ?>