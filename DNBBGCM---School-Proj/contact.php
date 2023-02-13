<!-- 
    Program: contact.php
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNBBGCM - Daisy National BB Gun Championship Match</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/gallery.css">
    <link rel="stylesheet" href="./css/dropdowninfo.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <script src="./js/nav.js" defer></script>
    <link rel="stylesheet" href="./css/contact.css">
    <style>
@media only screen and (max-width: 600px) {
    .section-two{
        margin-top: 20vh;
    }
}
    </style>
</head>
<body>
    <div id="pageID" data-pageid="contact"></div>

    <div id="topWrapper">
 <!-- Logo -->
<?php include("./inc/inc_logo.php"); ?>

 <!-- NAV BAR FROM PHP -->
 <?php include("./inc/inc_nav.php"); ?>
    </div>
    <h1 class="page-header">Contact</h1>

    <section class="section-one" >
    <div class="center">

    <div class="contact-separator"></div>
    <div class="contact-box">
    <h3 class="contact-title">Daisy Outdoor Products</h3>
    <div class="contact-content"> Daisy Outdoor Products is reachable by email at <a href="mailto:nationals@daisy.com">nationals@daisy.com</a>.</div>

    <h3 class="contact-title">Dwight Watt</h3>
    <div class="contact-content"> Dwight Watt is reachable by email at <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a>.</div>
    </div>
    </div>
           
    </section>


    <?php include("./inc/inc_footer.php"); ?>
</body>
</html>