<?php require "./head.php";
$error = '';
$searchNull = '';
require "../assets/connect_to_db.php";
?>
<?php require "./body.php"; ?>

<section class="main pt-5 d-flex justify-content-center flex-column bg-white" :class="open || 'active'">

    <div class="d-flex justify-content-center align-items-center flex-column bg-white">
        <?php if ($error !== '') {
            echo "<p class='alert alert-danger text-start w-75'>{$error}</p>";
        } ?>

        <form method="post" action="#" class="d-flex w-75">
            <input name="text" type="text" class="form-control search-input rounded-pill" placeholder="جست و جو...">

            <select class="form-select mx-5" name="field">
                <option value="" selected>فیلد مدنظر را انتخاب کنید</option>
                <option>id</option>
                <option>username</option>
                <option>email</option>
            </select>

            <button class="btn btn-primary rounded-pill" name="submit">Search</button>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {

        if ($_POST["text"] !== "" && $_POST["field"] !== "") {

            $field = $_POST["field"];
            $text = $_POST["text"];
            $sql = "SELECT * FROM `users` WHERE {$field} LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(["%$text%"]);
            $users = $stmt->fetchAll(); ?>

        <?php    if ($users) { ?>

                <table class="table table-striped text-center bg-white mt-5">
                      <thead>
                      <tr>
       
                      <th scope="col">FUNC</th>
                      <th scope="col">Email</th>
                      <th scope="col">Username</th>
                      <th scope="col">ID</th>
                      </tr>
                      </thead>
                      <tbody>


              <?php  foreach ($users as $user): ?>

                    <tr>
                   <td >
                 <a class='btn btn-danger' href ='func/delete.php?id=<?=$user['>
                     <i class='bi bi-trash' ></i >
                 </a >
                 <a class='btn btn-warning' >
                     <i class='bi bi-pencil' ></i >
                 </a >
             </td >
                    <td> <?= $user["email"] ?></td>
                    <td><?= $user["username"] ?></td>
                    <td><?= $user["id"] ?></td>
                    </tr>

        <?php endforeach; ?>

                }
                </tbody>
                </table>


             <?php
            } else {
                echo "<h5 class='alert alert-danger m-5 px-3'>کاربری با این مشخصات یافت نشد</h5>";
            }
        }
    } ?>
</section>


<?php require "./foot.php"; ?>
