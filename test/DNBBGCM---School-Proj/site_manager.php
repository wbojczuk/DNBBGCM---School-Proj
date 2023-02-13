<!-- 
    Program: site_manager.php
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
 -->
<?php
session_set_cookie_params(0, "/");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNBBGCM Site Manager</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sitemanager.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <script src="./js/jsreload.js" defer></script>
</head>
<body>
    

<?php
// Login
if(!isset($_SESSION["login"])){
    $current_password = "5d7d56918e05d2984f225f44657d80c55bb0365eaedf7f9228ede7d897ca55fc";
    if(isset($_GET["action"]) && $_GET["action"] == "login"){
        if(hash("sha256", $_POST["loginPass"]) == $current_password){
            $_SESSION["login"] = "true";
            echo("<div id='jsReload' data-filename='./site_manager.php'></div>");
        }else{
            ?>
            <div class="center"><h1>DNBBGCM Site Manager</h1></div>
        <div class="center" style="height: 100vh;">
        <div>
        <form action="./site_manager.php?action=login" method="post">
        <label for="loginPass">Please Enter Password: </label>
        <input type="password" id="loginPass" name="loginPass"> 
        <input type="submit" value="Submit">
        <div class="center">
            <span class="form-error">Incorrect Password!</span>
        </div>
        </div>
    </form>
    </div>
            <?php
        }
    }else{
    ?>
    <div class="center" ><h1 style=" display:inline-block; margin-top: 10vh;">DNBBGCM Site Manager</h1></div>
    <div class="center" style="height: 100vh; width:100%; position:fixed;top:0;left:0;">
<form action="./site_manager.php?action=login" method="post">
        <label for="loginPass">Please Enter Password: </label><br class="mobile">
        <input type="password" id="loginPass" name="loginPass"> 
        <input type="submit" value="Submit" class="button-two">
    </form>
    </div>
    <?php
    }
}else{
    # DISPLAY AFTER LOGGED IN
    ?>
    <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;">DNBBGCM Site Manager</h1></div>
    <div class="center">
        <div id="siteManagerWrapper">
            <a class="site-manager-option" href="./site_manager/manage_events.php">
                <div class="site-option-img"></div>
                <h4 class="site-option-title">Events</h4>
            </a>
            <a class="site-manager-option" href="./site_manager/manage_gallery.php">
                <div class="site-option-img"></div>
                <h4 class="site-option-title">Gallery</h4>
            </a>
            <a class="site-manager-option" href="./site_manager/manage_results.php">
                <div class="site-option-img"></div>
                <h4 class="site-option-title">Results</h4>
            </a>
        </div>
    </div>
    
    <?php
}
    ?>
    </body>