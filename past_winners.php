
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
    <div id="pageID" data-pageid="gallery"></div>

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
    <script>
                const pastWinners = [
    {
        date: "1966",
        winners: [
            "Missouri(Joplin)",
            "Arkansas  ",
            "Kansas  ",
            "Canada  ",
            "Louisiana  ",
            "Kentucky  ",
            "West Virginia  ",
            "Massachusetts  ",
            "Michigan  ",
            "South Dakota"
        ]
    },
    {
        date: "1967",
        winners: [
            "Kansas  ",
            "Louisiana  ",
            "Iowa  ",
            "Alabama  ",
            "Okalahoma  ",
            "Missouri  ",
            "Pennsylvania  ",
            "Washington  ",
            "Wisconsin  ",
            "Texas"
        ]
    },
    {
        date: "1968",
        winners: [
            "Kansas  ",
            "Iowa  ",
            "Oklahoma  ",
            "Indiana  ",
            "Nebraska  ",
            "Utah  ",
            "New York  ",
            "Pennsylvania  ",
            "New Mexico  ",
            "Washington"
        ]
    },
    {
        date: "1969",
        winners: [
            "Wisconsin  ",
            "Kansas  ",
            "New York  ",
            "Oklahoma  ",
            "Iowa  ",
            "Nebraska  ",
            "Mexico  ",
            "Utah  ",
            "Louisiana  ",
            "Missouri"
        ]
    },
    {
        date: "1970",
        winners: [
            "Wisconsin  ",
            "Michigan  ",
            "Oklahoma  ",
            "Iowa  ",
            "Ohio  ",
            "Kansas  ",
            "Missouri  ",
            "Texas  ",
            "Indiana  ",
            "New York"
        ]
    },
    {
        date: "1971",
        winners: [
            "Wisconsin  ",
            "Ohio  ",
            "Michigan  ",
            "Iowa  ",
            "Louisiana  ",
            "New York  ",
            "Indiana  ",
            "Kansas  ",
            "Nebraska  ",
            "Texas"
        ]
    },
    {
        date: "1972",
        winners: [
            "Kansas  ",
            "Ohio  ",
            "Michigan  ",
            "Canada  ",
            "Texas  ",
            "Massachusetts  ",
            "New York  ",
            "North Dakota  ",
            "Oklahoma  ",
            "Missouri"
        ]
    },
    {
        date: "1973",
        winners: [
            "Missouri  ",
            "Iowa  ",
            "Texas  ",
            "Ohio  ",
            "New York  ",
            "California  ",
            "Arkansas  ",
            "Michigan  ",
            "Kansas  ",
            "North Carolina"
        ]
    },
    {
        date: "1974",
        winners: [
            "Michigan  ",
            "Missouri  ",
            "North Carolina  ",
            "Kansas  ",
            "Texas  ",
            "Iowa  ",
            "Tennessee  ",
            "Arkansas  ",
            "Ohio  ",
            "New York"
        ]
    },
    {
        date: "1975",
        winners: [
            "Missouri  ",
            "Ohio  ",
            "Arkansas  ",
            "Michigan  ",
            "North Carolina  ",
            "Kansas  ",
            "Arizona  ",
            "Texas  ",
            "Tennessee  ",
            "California"
        ]
    },
    {
        date: "1976",
        winners: [
            "Missouri  ",
            "Kansas  ",
            "North Carolina  ",
            "Hawaii  ",
            "Michigan  ",
            "Arizona  ",
            "Texas  ",
            "Indiana  ",
            "Arkansas  ",
            "California"
        ]
    },
    {
        date: "1977",
        winners: [
            "Hawaii  ",
            "Missouri  ",
            "Arkansas  ",
            "North Carolina  ",
            "Michigan  ",
            "Nebraska  ",
            "Texas  ",
            "Iowa  ",
            "Louisiana  ",
            "Indiana"
        ]
    },
    {
        date: "1978",
        winners: [
            "Michigan  ",
            "Hawaii  ",
            "Nebraska  ",
            "Illinois  ",
            "Iowa  ",
            "Kansas  ",
            "Virginia  ",
            "Tennessee  ",
            "Arizona  ",
            "New Hampshire"
        ]
    },
    {
        date: "1979",
        winners: [
            "Iowa  ",
            "Illinois  ",
            "Arkansas  ",
            "Nebraska  ",
            "Michigan  ",
            "Missouri  ",
            "Kansas  ",
            "Kentucky  ",
            "Virginia  ",
            "Louisiana"
        ]
    },
    {
        date: "1980",
        winners: [
            "Iowa  ",
            "Missouri  ",
            "Connecticut  ",
            "Illinois  ",
            "Arkansas  ",
            "South Dakota  ",
            "Michigan  ",
            "Kentucky  ",
            "Nebraska  ",
            "Georgia"
        ]
    },
    {
        date: "1981",
        winners: [
            "Missouri  ",
            "Michigan  ",
            "Ohio  ",
            "Illinois  ",
            "Iowa  ",
            "Kansas  ",
            "South Dakota  ",
            "Virginia  ",
            "Texas  ",
            "Louisiana"
        ]
    },
    {
        date: "1982",
        winners: [
            "Iowa  ",
            "Michigan  ",
            "South Dakota  ",
            "Missouri  ",
            "Illinois  ",
            "Texas  ",
            "Kentucky  ",
            "New Hampshire  ",
            "Pennsylvania  ",
            "Maryland"
        ]
    },
    {
        date: "1983",
        winners: [
            "Missouri  ",
            "Illinois  ",
            "Tennessee  ",
            "Kentucky  ",
            "Ohio  ",
            "Iowa  ",
            "Pennsylvania  ",
            "Kansas  ",
            "New Hampshire  ",
            "Michigan"
        ]
    },
    {
        date: "1984",
        winners: [
            "Maryland  ",
            "Kentucky  ",
            "Illinois  ",
            "Michigan  ",
            "Missouri  ",
            "Louisiana  ",
            "Ohio  ",
            "Kansas  ",
            "Tennessee  ",
            "Virginia"
        ]
    },
    {
        date: "1985",
        winners: [
            "Michigan  ",
            "Missouri  ",
            "Tennessee  ",
            "Kentucky  ",
            "Pennsylvania  ",
            "South Dakota  ",
            "Texas  ",
            "Wisconsin  ",
            "Illinois  ",
            "Vermont"
        ]
    },
    {
        date: "1986",
        winners: [
            "Missouri  ",
            "Kansas  ",
            "Pennsylvania  ",
            "Wyoming  ",
            "Illinois  ",
            "Kentucky  ",
            "Texas  ",
            "Minnesota  ",
            "Michigan  ",
            "Maryland"
        ]
    },
    {
        date: "1987",
        winners: [
            "Kansas  ",
            "Kentucky  ",
            "Michigan  ",
            "Pennsylvania  ",
            "South Dakota  ",
            "Maryland  ",
            "Ohio  ",
            "Illinois  ",
            "Louisiana  ",
            "Tennessee"
        ]
    },
    {
        date: "1988",
        winners: [
            "Missouri  ",
            "Pennsylvania  ",
            "Illinois  ",
            "Texas  ",
            "Kentucky  ",
            "Louisiana  ",
            "Kansas  ",
            "South Dakota  ",
            "Wisconsin  ",
            "Ohio"
        ]
    },
    {
        date: "1989",
        winners: [
            "Missouri  ",
            "Kansas  ",
            "Pennsylvania  ",
            "Texas  ",
            "Illinois  ",
            "Michigan  ",
            "Hawaii  ",
            "Tennessee  ",
            "South Dakota  ",
            "Minnesota"
        ]
    },
    {
        date: "1990",
        winners: [
            "Kansas  ",
            "Pennsylvania  ",
            "Missouri  ",
            "Texas  ",
            "South Dakota  ",
            "Michigan  ",
            "Illinois  ",
            "Minnesota  ",
            "Kentucky Blue  ",
            "Montana"
        ]
    },
    {
        date: "1991",
        winners: [
            "Kansas  ",
            "Missouri  ",
            "Michigan  ",
            "South Dakota/Ft. Pierre  ",
            "Montana  ",
            "Pennsylvania  ",
            "South Dakota/Veblin  ",
            "Texas  ",
            "Maryland  ",
            "Minnesota"
        ]
    },
    {
        date: "1992",
        winners: [
            "Kentucky  ",
            "South Dakota  ",
            "Texas  ",
            "Georgia/Wayne County  ",
            "Missouri  ",
            "Minnesota  ",
            "Pennsylvania  ",
            "Kansas  ",
            "Michigan  ",
            "Georgia/Newnan"
        ]
    },
    {
        date: "1993",
        winners: [
            "Highmore, SD2379  ",
            "Mullen, NE #1  2335  ",
            "Washington, MO  2326  ",
            "Somerset, KY  2321  ",
            "Meyerstown, PA2310  ",
            "Norton, KS2309  ",
            "Northfield, VT2305  ",
            "Richland, WI2299  ",
            "Buffalo, MN  2299  ",
            "Danielsville, GA  2292"
        ]
    },
    {
        date: "1994",
        winners: [
            "Trenton, MI2324  ",
            "Meyerstown, PA2315  ",
            "Columbia, IL 2302  ",
            "Gillespie Co., TX2285  ",
            "Enid, OK  2277  ",
            "Ft. Pierre, SD2269  ",
            "Norton, KS2259  ",
            "Washington, MO  2258  ",
            "Laurel, MT2256  ",
            "Marksmen, SD2252"
        ]
    },
    {
        date: "1995",
        winners: [
            "Meyerstown, PA2357  ",
            "Danielsville, GA2340  ",
            "Highmore, SD2321  ",
            "Penns Valley, PA 2308  ",
            "Mullen, NE2307  ",
            "Norton, KS2299  ",
            "Trenton, MI2294  ",
            "Columbia, IL 2286  ",
            "Gillespie, TX 2282  ",
            "Meriweather, GA 2275"
        ]
    },
    {
        date: "1996",
        winners: [
            "Pennsylvania  ",
            "Ft. Pierre, South Dakota  ",
            "Norton, Kansas  ",
            "Gillespie County, Texas  ",
            "Wichita, Kansas  ",
            "Missouri  ",
            "Parkston, South Dakota  ",
            "Wisconsin  ",
            "Bowling Green, Kentucky  ",
            "Georgia"
        ]
    },
    {
        date: "1997",
        winners: [
            "Meyerstown, Pennsylvania  ",
            "Penns Valley, Pennsylvania  ",
            "Norfolk, Nebraska  ",
            "Highmore, South Dakota  ",
            "Norton, Kansas  ",
            "Columbia, Illinois  ",
            "Gillespie, Texas  ",
            "Laurel, Montana  ",
            "Britton, South Dakota  ",
            "Jesup, Georgia"
        ]
    },
    {
        date: "1998",
        winners: [
            "Norton, Kansas  ",
            "Myerstown, Pennsylvania  ",
            "Top Guns, Nebraska  ",
            "Buffalo, North Dakota  ",
            "Highmore Junior, South Dakota  ",
            "Spink County, South Dakota  ",
            "New Martinsville, West Virginia  ",
            "Kirley, South Dakota  ",
            "Madison, Georgia  ",
            "Bowling Green, Kentucky"
        ]
    },
    {
        date: "1999",
        winners: [
            "Penns Valley Pennsylvania Shooting Team  ",
            "Myerstown Pennsylvania Jaycees BB Gun Team  ",
            "Humble 4H Shooting Sports  ",
            "Marshall County 4-H Sharp Shooters  ",
            "Buffalo Minnesota Jaycees  ",
            "Harris County Georgia 4-H Hot Shots  ",
            "Gillespie County Texas 4H  ",
            "Laurel Mountain Montana State Champs  ",
            "Washington Misouri Jaycees Shooting Team  ",
            "Norton Kansas Jaycee BB Gun Team"
        ]
    },
    {
        date: "2000",
        winners: [
            "Norton, Kansas  ",
            "Gillsepie County 4H, Texas  ",
            "Pierre Jr. Shooters, South Dakota  ",
            "The Backwoods Bunch, Georgia  ",
            "Oregon Timber Beasts  ",
            "Penns Valley Pennsylvania Shooting Team  ",
            "Highmore Jr. Shooters, South Dakota  ",
            "Buffalo Minnesota Jaycee Team  ",
            "Washington, Missouri Jaycees Shooting Team  ",
            "Wichita Shooting Team"
        ]
    },
    {
        date: "2001",
        winners: [
            "Penns Valley Shooting Team B-B, Pennsylvania  ",
            "The Backwoods Bunch, Georgia  ",
            "Gallatin County 4-H BB Gun Team  ",
            "Kirley Junior Shooters  ",
            "Holt County Top Guns  ",
            "Myerstown Jaycee BB Gun Team, Pennsylvania  ",
            "Buffalo Minnesota Jaycees  ",
            "Marshall County Sharpshooters  ",
            "Gillespie County 4-H, Texas  ",
            "Madison County 4-H Diamondbacks, Georgia"
        ]
    },
    {
        date: "2002",
        winners: [
            "Penns Valley, Pennsylvania2359  ",
            "Pierre Jr. Shooters, South Dakota2348  ",
            "Palmyra Lions, Pennsylvania2333  ",
            "Buffalo Minnesota2313  ",
            "Backwoods Bunch, Georgia2306  ",
            "Myerstown, Pennsylvania2304  ",
            "Washington Jaycees, Missouri2300  ",
            "Gillespie Co. 4-H, Texas2296  ",
            "Lake Houston 4-H, Texas2280  ",
            "Redmond Minutemen, Oregon2277"
        ]
    },
    {
        date: "2003",
        winners: [
            "Homestead, Nebraska 2369  ",
            "Norton, Kansas 2347  ",
            "Belgrade, Montana 2335  ",
            "Buffalo, Minnesota 2335  ",
            "Kirley,  South Dakota 2323  ",
            "Marshall County, South Dakota 231",
            "Tussey Mt. Pennsylvania 2318  ",
            "The Backwoods Bunch (Jesup), Georgia 2317  ",
            "Richland Area Wisconsin 2317  ",
            "Timberbeasts Portland Oregon2313"
        ]
    },
    {
        date: "2004",
        winners: [
            "PIERRE JR SHOOTERS, SD 2355  ",
            "LAUREL SHARP SHOOTERS, MT 2348  ",
            "HOLT CO TOP GUNS, NE 2334  ",
            "BOWLING GREEN WARREN, KY 2328  ",
            "IZAAK WALTON LEAGUE, MD 2323  ",
            "PALMYRA BB GUN TEAM, PA 2318  ",
            "WICHITA BB GUN TEAM, KS 2312  ",
            "BUFFALO MINNESOTA JAYCEES, MN 231",
            "BEND OF THE RIVER POSSUMS, TN 2311  ",
            "LUMPKIN GOLD, GA 2308"
        ]
    },
    {
        date: "2005",
        winners: [
            "Pierre JR Shooters, SD 2350  ",
            "Oregon Timbers Beasts, OR 2350  ",
            "Belgrade Sharpshooters, MT 2347  ",
            "Tussey Mtn. Jr 4-H Rifle Club, PA 2345  ",
            "Marshall Co 4-H Sharpshooters, SD 2343  ",
            "Homestead 4-H Shooting Club, NE 2338  ",
            "Penns Valley Shooting Team, PA 2336  ",
            "Appling Co Bulldawgs, GA 233",
            "Buffalo Minnesota Jaycees, MN 2322  ",
            "Elbert County 4-H, GA 2316"
        ]
    },
    {
        date: "2006",
        winners: [
            "Washington Jaycees Shooting Team, MO 239",
            "Palmyra BB Gun Team, PA 237",
            "Izaak Walton League-Rockville Chapter, MD 236",
            "Pierre Jr. Shooters, SD 2354  ",
            "Tussey Mtn. Jr 4-H Rifle Club, PA 2352  ",
            "Manhattan BB Gun, KS 234",
            "Spink Co. Shooting Sports, SD 2338  ",
            "Norton Rotary BB Gun, KS 231",
            "Kirley Jr. Shooters, SD 2305  ",
            "Appling Co Bulldawgs, GA 2303"
        ]
    },
    {
        date: "2007",
        winners: [
            "Appling Co Bulldawgs, GA, 2382  ",
            "Pierre Jr Shooters, SD, 2329  ",
            "Washington Jaycees Shooting Team, MO, 2321  ",
            "Buffalo Minnesota Jaycees Gold, MN, 2320  ",
            "Norton Rotary, KS, 2319  ",
            "Marshall Co 4-H Sharp Shooters, SD, 2318  ",
            "Homestead 4-H Shooting Club #1, NE, 231",
            "Penns Valley Shooting Team, PA, 231",
            "Nottoway Reg. 4-H Shooting Sports, VA, 2311  ",
            "Bend of the River, TN, 2309"
        ]
    },
    {
        date: "2008",
        winners: [
            "Pierre Jr. Shooters, SD  2382  ",
            "Washington, MO 2371  ",
            "Spink County, SD  2358  ",
            "Backwoods Bunch (Jesup), GA 235",
            "Gallatin #1, MT  2351  ",
            "Palmyra, PA 2342  ",
            "Norton Rotary BB Gun Team, KS 2336  ",
            "TimberBeast, OR 2335  ",
            "Wyandotte Co. 4-H Shooting Sports, KS 2334  ",
            "Fort Bend, TX  2325"
        ]
    },
    {
        date: "2009",
        winners: [
            "Marshall County  - Britton South Dakota 2372  ",
            "Penns Valley - Spring Hills Pennsylvania 2370  ",
            "Washington Jaycee - Washington Missouri 2366  ",
            "Gallatin Valley - Belgrade Montana 2359  ",
            "Buffalo Gold - Buffalo Minnesota 2348  ",
            "Coffee Red - Douglas Georgia 2344  ",
            "Pierre Jr. Shooters - Pierre South Dakota 2336  ",
            "Laurel Shooting Ed Program - Montana 2329  ",
            "Bend of the River - Tennessee 2325  ",
            "Backwoods Bunch - Jesup Georgia 2324"
        ]
    },
    {
        date: "2010",
        winners: [
            "MARSHALL CO - Britton South Dakota 2384  ",
            "WASHINGTON SHOOTING - Washington Missouri 2366  ",
            "PENNS VALLEY - Spring Hills Pennsylvania 2355  ",
            "KIRLEY JR SHOOTERS - Hayes South Dakota 2351.06  ",
            "PALMYRA - Palmyra Pennsylvania 2350.00  ",
            "WYANDOTT CO - Kansas City Kansas 2348.00  ",
            "BUFFALO YOUTH Shooting Sports - Buffalo Minnesota 2335.00  ",
            "HIGHMORE - Highmore South Dakota 2328.07  ",
            "NORTON - Norton Kansas 2327.04  ",
            "HUMBOLDT Sharpshooters - Humboldt South Dakota 2325.00"
        ]
    },
    {
        date: "2011",
        winners: [
            "Pierre Jr Shooters, SD 2380  ",
            "Lead Devils 2370  ",
            "Washington, MO 2363  ",
            "OR Timberbeast 2360  ",
            "Buffalo Gold, MN 2353  ",
            "Wyandotte Co, KS 2350  ",
            "Humboldt, SD 2347  ",
            "Backwoods Bunch, GA 2339  ",
            "Norton, KS 2336  ",
            "Harrisburg H&A, PA 2328"
        ]
    },
    {
        date: "2012",
        winners: [
            "Pierre Jr Shooters, SD 2397  ",
            "Marshall Co SD 2386  ",
            "Coffee Co 4H GA 2369  ",
            "Penn's Valley PA 2357  ",
            "Gallitin Valley Red MT 234",
            "Wyndotte Co 4H KS 234",
            "Norton Rotary BBG KS 233",
            "Phillips/Rooks 4H KS 233",
            "OR Timberbeasts 2323",
            "Humboldt SS SD 2321"
        ]
    },
    {
        date: "2013",
        winners: [
            "PALMYRA PA 2374  ",
            "HIGHMORE SD 2373  ",
            "MARSHALL CO SD 2335  ",
            "PIERRE CO SD 2329  ",
            "WASHINGTON MO 2322  ",
            "HUMBOLT SD 2313  ",
            "WALTON CO GA 2312  ",
            "BUFFALO GOLD MN 2306  ",
            "CARROLL CO 2280  ",
            "SEDGWICK CO KS 2280"
        ]
    },
    {
        date: "2014",
        winners: [
            "Pierre Jr Shooters 2375  ",
            "Spink Co Shooting Sports 2363  ",
            "Lake Houston 4H Outdoor Explorers 2326  ",
            "Johnson County KS 4H Rifle Club 2326  ",
            "Harrisburg Hunters & Anglers 2323  ",
            "Humboldt Sharpshooters 2321  ",
            "Penns Valley BB Gun Team 2316  ",
            "Walton County 4H BB team 2314  ",
            "Coffee County Center Shots 2305  ",
            "Gallatin Valley Sharpshooters 2304"
        ]
    },
    {
        date: "2015",
        winners: [
            "Walton County 4H BB Team Monroe, GA2387  ",
            "Palmyra BB Gun Team Palmyra, Pa2372  ",
            "DC Shooting Team Armour, SD2355  ",
            "Pierre Junior Shooters Pierre, SD2354  ",
            "Marshall County 4H Sharpshooters Britton , SD2349  ",
            "Kirley Jr Shooters Midland, SD2341  ",
            "Buffalo Sharpshooters Blue Buffalo, ND2336  ",
            "Lead Devils Glendive, MT2336  ",
            "Johnson Co 4H Gardner, KS2332  ",
            "Humboldt Sharpshooters Hartford, SD2329"
        ]
    },
    {
        date: "2016",
        winners: [
            "Pierre Junior ShootersSouth Dakota2374-70  ",
            "Wyandotte Co 4H Kansas 2368-80  ",
            "Spink County Shooting Sports South Dakota 2367-64  ",
            "Mullen Marksman Nebraska 2361-73  ",
            "Gillespie County 4H Texas 2349-63  ",
            "Humboldt Sharp Shooters South Dakota 2346-64  ",
            "Penns Valley Shooting Team Pennsylvania 2344-72  ",
            "Jackson/Nemaha Bullmasters 4H Kansas 2338-60  ",
            "Carbon Co 4H Shooting Sports Montana 2337-64  ",
            "Appling Bulldogs Georgia 2335-62"
        ]
    },
    {
        date: "2017",
        winners: [
            "Pierre Junior Shooters - South Dakota 2383 - 85  ",
            "Walton Co. 4-H - Georgia 2369 - 76  ",
            "Johnson County 4-H - Kansas 2368 - 71  ",
            "Humboldt Sharpshooters - South Dakota 2359 - 69  ",
            "Marshall Co. 4-H - South Dakota 2356 - 67  ",
            "Carroll Co. Guns-N-Clover - Georgia 492 2356 - 67  ",
            "Yellowstone Young Guns - Montana 2355 - 56  ",
            "Washington Shooting Team - Missouri 2343 - 61  ",
            "Shelby Co. Shooting Sports - Alabama 2340 - 62  ",
            "Norton Rotary BB Team - Kansas 2336 - 53"
        ]
    }
];
    </script>
</body>
</html>