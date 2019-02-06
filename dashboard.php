<?php 

//allow the config
define('__CONFIG__',true);

//require the config
require_once "inc/config.php";

echo $_SESSION['user_id'].' is your user id';
exit;

?>

<!DOCTYPE html>

<html lang="en">

  <head> 
    <meta charset="utf-8" /><!--specifies the character encoding for the HTML document-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- able to add certain values to your website-->
                                                            <!--renders in the highest mode supported by the browser-->
    <meta name="viewport" content="width=device-width, initial-scale=1" /> <!--defines the viewport most follow the device's width and be in a proportional scale-->
    <meta name="robots" content="follow"> <!--The spider will crawl through all the pages on your website, will follow links-->

    <title>Page Title</title>

    <base href="/" /><!--Specify a default URL and a default target for all links on a page-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>
  <div class="uk-section uk-container">
     
  </div>

  <?php require_once "inc/footer.php" ?>

  </body>
</html>