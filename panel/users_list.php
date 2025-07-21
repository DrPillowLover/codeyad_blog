<?php require "./head.php"; ?>
<?php require "./body.php"; ?>

<?php
require "../assets/connect_to_db.php";
$sql = "SELECT `users`.`id` , `users`.`username` , `users`.`email` , `roles`.`title` 
                FROM `users`
                INNER JOIn `role_user` ON `role_user`.`user_id` = `users`.`id`
                INNER JOIN `roles` ON `role_user`.`role_id` = `roles`.`id`
                ORDER BY `users`.`id`";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$counter = 1;
?>

<section class="main p-5 bg-white" :class="open || 'active'">
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">FUNC</th>
            <th scope="col">ROLE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">USERNAME</th>
            <th scope="col">ID</th>
        </tr>
        </thead>
        <tbody>



        <?php     foreach ($users as $user): ?>


         <tr>
             <td>
                 <a class="btn btn-danger" href="func/delete.php?username=<?=$user['username'] ?>">
                     <i class="bi bi-trash"></i>
                 </a>
                 <a class="btn btn-warning">
                     <i class="bi bi-pencil"></i>
                 </a>
             </td>
             <td> <?=  $user['title']  ?></td>
             <td> <?=  $user['email']  ?></td>
             <td> <?=  $user['username']  ?></td>
             <td> <?= $counter++  ?></td>





         </tr>


        <?php endforeach; ?>

        </tbody>
    </table>
</section>


<?php require "./foot.php"; ?>


