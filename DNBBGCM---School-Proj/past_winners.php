
<!-- 
    Program: past_winners.php
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
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <script src="./js/nav.js" defer></script>
    <script src="./js/archived.js" defer></script>
    <script src="./js/dropdowninfo.js" defer></script>
    
    <link rel="stylesheet" href="./css/dropdowninfo.css">
    <style>
:root{
    --ddi-color: #0A2F59;
    --content-bg: rgb(207, 207, 207);
}
.dropdown-info-wrapper{
    margin-left: 0;
}
.dropdown-info-item{
    margin-bottom: 1vh;
    background-color: rgb(235,235,235);
}
.dropdown-info-content{
    background-color: rgb(245,245,245);
}
ol{
    padding-left: 2.2%;
}
li::marker{
    font-weight: bold;
}
.li0::marker{
    content: "1st. ";
}
.li1::marker{
    content: "2nd. ";
}
.li2::marker{
    content: "3rd. ";
}
.li3::marker, .li4::marker, .li5::marker, .li6::marker, .li7::marker, .li8::marker, .li9::marker{
    content: attr(data-count)"th. ";
}
    </style>
</head>
<body>
    <div id="pageID" data-pageid="archive"></div>

    <div id="topWrapper">
 <!-- Logo -->
<?php include("./inc/inc_logo.php"); ?>

 <!-- NAV BAR FROM PHP -->
 <?php include("./inc/inc_nav.php"); ?>
    </div>
    <h1 class="page-header">Top 10 Finalists</h1>

    <section class="section-two">
    <div class="center">
            <h2 class="section-two-header">Years</h2>
        </div>
        
        <div class="center" style="width: 100vw;">
            <div class="dropdown-info-wrapper">
            
            </div>
        </div>
        
    </section>

    <?php include("./inc/inc_footer.php"); ?>
</body>
</html>