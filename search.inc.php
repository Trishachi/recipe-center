<?php
    // $con = mysql_connect("localhost", "test", "test") or die('Sorry, could not connect to server');
    // mysql_select_db("recipe", $con) or die('Sorry, could not connect to database');
    $con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to database server');
    $search = $_GET['searchFor'];
    $words = explode(" ", $search);
    $phrase = implode("%' AND title LIKE '%", $words);
    $query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase%'
    or shortdesc like '%$phrase%'
    or ingredients like '%$phrase%'
    or directions like '%$phrase%'";
    $result = mysqli_query($con, $query) or die('Could not query database at this time');
    echo "<h1>Search Results</h1><br><br>\n";
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h2>Sorry, no recipes were found with '$search' in title.</h2>";
    } else  {
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $recipeid = $row['recipeid'];
            $title = $row['title'];
            $shortdesc = $row['shortdesc'];
            echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";
            echo "$shortdesc<br><br>\n";
        }
    }
?>
