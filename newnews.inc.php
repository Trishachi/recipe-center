<?php
  echo "<form action=\"index.php\" method=\"post\">\n";
  echo "<h2>Post News</h2>";
  echo "Title:<input type=\"text\" name=\"title\"><br>\n";
  echo "<textarea rows=\"10\" cols=\"50\" name=\"article\"></textarea><br>\n";
  echo "<input type=\"hidden\" name=\"content\" value=\"addnews\">\n";
  echo "<br><input type=\"submit\" value=\"Submit\">\n";
  echo "</form>\n";
?>
