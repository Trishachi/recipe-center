<?php
  $title = $_POST['title'];
  $article = htmlspecialchars($_POST['article']);
  //use the PHP date() to obtain the current date from the system
  $date = date("Y-m-d");
  // $con = mysql_connect("localhost", "test", "test") or die('Could not connect to server');
  // mysql_select_db("recipe", $con) or die('Could not connect to database');

  $con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to database server');
  $query = "INSERT INTO news ( date, title, article) " .
            " VALUES ('$date','$title', '$article')";
  $result = mysqli_query($con, $query);
  if ($result)
     echo "<h2>News posted</h2>\n";
  else
     echo "<h2>Sorry, there was a problem posting your news</h2>\n";
     echo "<a href=\"index.php?content=newnews\">Try Again</a>\n";
?>
