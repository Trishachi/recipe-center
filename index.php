<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
    <link rel="stylesheet" type="text/css" media="print" href="print.css">
    <title> The Recipe Center</title>
  </head>
  <body>
    <div id="header">
      <?php include("header.inc.php"); ?>
    </div>
    <div id="content">
        <div id="nav">
          <?php include("nav.inc.php"); ?>
        </div>
        <div id="main">
          <?php
            if (!isset($_REQUEST['content']))
              include("main.inc.php");
            else
            {
              $content = $_REQUEST['content'];
              $nextpage = $content . ".inc.php";
              include($nextpage);
            }
          ?>
       </div>
       <div id="news">
         <?php include("news.inc.php"); ?>
       </div>
    </div>
    <div id="footer">
      <?php include("footer.inc.php"); ?>
    </div>
  </body>
</html>
