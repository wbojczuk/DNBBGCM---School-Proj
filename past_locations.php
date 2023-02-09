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
    </style>
</head>
<body>
    <div id="pageID" data-pageid="archived"></div>

    <div id="topWrapper">
 <!-- Logo -->
<?php include("./inc/inc_logo.php"); ?>

 <!-- NAV BAR FROM PHP -->
 <?php include("./inc/inc_nav.php"); ?>
    </div>
    <h1 class="page-header">Past Locations</h1>

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
    <script>
        const pastLocations = [
            {
                date: "1966",
                loc: "Dayton OH"
            },
            {
                date: "1967",
                loc: "Hutchinson KS"
            },
            {
                date: "1968",
                loc: "Irving TX"
            },
            {
                date: "1969",
                loc: "Overland Park KS"
            },
            {
                date: "1970",
                loc: "Irving TX"
            },
            {
                date: "1971",
                loc: "Merritt Island FL"
            },
            {
                date: "1972",
                loc: "Tulsa OK"
            },
            {
                date: "1973",
                loc: "Phoenix AZ"
            },
            {
                date: "1974",
                loc: "Manchaster NH"
            },
            {
                date: "1975",
                loc: "Clarksville TN"
            },
            {
                date: "1976",
                loc: "Shreveport LA"
            },
            {
                date: "1977",
                loc: "Sioux Falls SD"
            },
            {
                date: "1978",
                loc: "Dubuque IA"
            },
            {
                date: "1979",
                loc: "Joplin MO"
            },
            {
                date: "1980",
                loc: "Bowling Green KY"
            },
            {
                date: "1981",
                loc: "Sioux Falls SD"
            },
            {
                date: "1982",
                loc: "Clarksville TN"
            },
            {
                date: "1983",
                loc: "Bowling Green KY"
            },
            {
                date: "1984",
                loc: "Fayetteville AR"
            },
            {
                date: "1985",
                loc: "Slippery Rock PA"
            },
            {
                date: "1986",
                loc: "Bowling Green KY"
            },
            {
                date: "1987",
                loc: "Gorham ME"
            },
            {
                date: "1988",
                loc: "Colorado Springs CO"
            },
            {
                date: "1989",
                loc: "Tulsa OK"
            },
            {
                date: "1990",
                loc: "Tulsa OK"
            },
            {
                date: "1991",
                loc: "Bowling Green KY"
            },
            {
                date: "1992",
                loc: "Bowling Green KY"
            },
            {
                date: "1993",
                loc: "Bowling Green KY"
            },
            {
                date: "1984",
                loc: "Bowling Green KY"
            },
            {
                date: "1995",
                loc: "Bowling Green KY"
            },
            {
                date: "1996",
                loc: "Bowling Green KY"
            },
            {
                date: "1997",
                loc: "Bowling Green KY"
            },
            {
                date: "1998",
                loc: "Manhattan KS"
            },
            {
                date: "1999",
                loc: "Atlanta Georgia"
            },
            {
                date: "2000",
                loc: "Atlanta GA"
            },
            {
                date: "2001",
                loc: "Colorado Springs CO"
            },
            {
                date: "2002",
                loc: "Atlanta GA"
            },
            {
                date: "2003",
                loc: "Wilmington North Carolina"
            },
            {
                date: "2004",
                loc: "Bowling Green KY"
            },
            {
                date: "2005",
                loc: "Bowling Green KY"
            },
            {
                date: "2006",
                loc: "Bowling Green KY"
            },
            {
                date: "2007",
                loc: "Bowling Green KY"
            },
            {
                date: "2008",
                loc: "Bowling Green KY"
            },
            {
                date: "2009",
                loc: "Bowling Green Kentucky"
            },
            {
                date: "2010",
                loc: "Rogers Arkansas"
            },
            {
                date: "2011",
                loc: "Rogers Arkansas"
            },
            {
                date: "2012",
                loc: "Rogers Arkansas"
            },
            {
                date: "2013",
                loc: "Rogers Arkansas"
            },
            {
                date: "2014",
                loc: "Rogers Arkansas"
            },
            {
                date: "2015",
                loc: "Rogers Arkansas"
            },
        ];
    </script>
</body>
</html>