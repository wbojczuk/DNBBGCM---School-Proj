<!-- 
    Program: gallery.php
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
    <script src="./js/dropdowninfo.js" defer></script>
    <!-- CUSTOM DROPDOWN MENU STYLING -->
    <style>
        :root{
    --ddi-color: #0A2F59;
    --content-bg: rgb(207, 207, 207);
}
.dropdown-info-wrapper{
    
}
.dropdown-info-item{
    margin-bottom: 1vh;
    background-color: rgb(235,235,235);
}
.dropdown-info-content{
    background-color: rgb(245,245,245);
}
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

    <section class="section-two" >
    <div class="center">
            <h2 class="section-two-header">Contact Information</h2>
        </div>
        <div class="center">
        <div class="dropdown-info-wrapper" style="margin-left:0;">
        <div class="dropdown-info-item">
                            <div class="dropdown-info-title">
                                <div class="dropdown-info-img"></div>
                                <span>Contacting Daisy Outdoor Products</span>
                            </div>
                            <div class="dropdown-info-content">
                            Daisy Outdoor Products is reachable by email at <a href="mailto:nationals@daisy.com">nationals@daisy.com</a>
                            </div>
                        </div>
                        <div class="dropdown-info-item">
                            <div class="dropdown-info-title">
                                <div class="dropdown-info-img"></div>
                                <span>Contacting Dwight Watt</span>
                            </div>
                            <div class="dropdown-info-content">
                            Dwight Watt is reachable by email at <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a>
                            </div>
                        </div>
            </div>
            </div>
           
    </section>


    <?php include("./inc/inc_footer.php"); ?>
</body>
</html>