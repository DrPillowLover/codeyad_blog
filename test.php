<pre>
<?php

$git = "git remote add origin https://github.com/DrPillowLover/codeyad_blog.git";
$git_push = "git push -u origin master";

session_start();

// require "./jdf.php";

// $x = jdate("YmdF");

// year    substr(x , 0 , 8)
// month    substr(x , 8 , 4)
// day    substr(x , 12 , 4)
// string month    substr(x , 16)

require "./assets/connect_to_db.php";
//$stmt = $conn -> query("select * from posts");
//$res = $stmt -> fetchAll();
//foreach ($res as $post){
//    echo $post['last_updated'] . '<br>';
//}


print_r($_SESSION);

?>
</pre>