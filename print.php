<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="print.css">
    <title>The Recipe Center</title>
  </head>
  <body>
    <?php
      // $con = mysql_connect("localhost", "test", "test") or die('Sorry, could not connect to server');
      // mysql_select_db("recipe", $con) or die('Could not connect to database');
      $con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to database server');
      $recipeid = $_GET['id'];
      $query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";
      $result = mysqli_query($con, $query) or die('Could not find recipe');
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('No records retrieved');
      $title = $row['title'];
      $poster = $row['poster'];
      $shortdesc = $row['shortdesc'];
      $ingredients = $row['ingredients'];
      $directions = $row['directions'];
      $ingredients = nl2br($ingredients);
      $directions = nl2br($directions);
      echo "<h2>$title</h2>\n";
      echo "posted by $poster <br>\n";
      echo $shortdesc . "\n";
      echo "<h3>Ingredients:</h3>\n";
      echo $ingredients . "<br>\n";
      echo "<h3>Directions:</h3>\n";
      echo $directions . "\n";
      echo "<br><br>\n";
      $query = "SELECT count(commentid) from comments where recipeid = $recipeid";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      if ($row[0] == 0)
        {
           echo "No comments posted yet.&nbsp;&nbsp;\n";
           echo "<hr>\n";
        } else
        {
           echo $row[0] . "\n";
           echo "&nbsp;comments posted.&nbsp;&nbsp;\n";
           echo "<hr>\n";
           echo "<h2>Comments:</h2>\n";
           $query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc";
           // $result = mysql_query($query) or die('Could not retrieve comments');

           $result = mysqli_query($con, $query) or die('Could not retrieve comments');
           while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
           {
               $date = $row['date'];
               $poster = $row['poster'];
               $comment = $row['comment'];
               $comment = nl2br($comment);
               echo "$date  - posted by  $poster<br>\n";
               echo "$comment\n";
               echo "<br><br>\n";
           }
        }
    ?>

  </body>
</html>
