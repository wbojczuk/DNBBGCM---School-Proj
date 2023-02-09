<!-- 
    Program: photo_gallery.php
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/gallery.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <script src="./js/photogallery.js" defer></script>
    <script src="./js/nav.js" defer></script>

    
</head>
<body>
<div id="pageID" data-pageid="gallery"></div>

<div id="topWrapper">
    <!-- Logo -->
    <?php include("./inc/inc_logo.php"); ?>

    <!-- NAV BAR FROM PHP -->
    <?php include("./inc/inc_nav.php"); ?>
</div>

        <?php
        // If year and category are set
            if(isset($_GET["year"])){
                $current_year = $_GET["year"];
                $current_cat = $_GET["category"];
                $current_dir = "./gallery_links/$current_year/$current_cat.json";
                $url_year = urlencode($current_year);
                // Parse link file from json
                $all_links = json_decode(file_get_contents($current_dir));
                ?>
                <h1 class="page-header" id="galleryHeader"><?php echo("<a href='./gallery.php?year=$url_year'>$current_year</a> / " . ucwords(str_replace("_", " ", $current_cat))); ?></h1>
                <h3 class="picture-gallery-desc">If you would like the high quality picture, send Dwight an email at <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a> with the picture ID(s) which can be found by hovering over or tapping an image and he will send it to you
Teams are welcome to copy and print the photos and also to distribute to media for media to use</h3>
                <div id="photoGalleryWrapper">
                    <div id="photoGalleryContainer">
                       <?php
                    //    Generate all img files
                        foreach($all_links as $link){
                            echo "<div><img class='photo-gallery-item' alt='photo'  src='./img/placeholder.jpg' data-imgtitle='' data-src='$link'><div class='photo-gallery-img-title'></div></div>";
                        }
                       ?>
                    </div>
                </div>
                <?php
                

            }
        ?>
    <footer>
        <span class="gallery-footer-span">Pictures taken by Dwight Watt and copyright 2022 by Dwight Watt.
Teams are welcome to copy and print the photos and also to distribute to media for media to use.
Teams and team members welcome to save and print or use pictures.</span>
    
        <span>William Bojczuk &copy; 2023, Email <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a> for web site problems, suggestions or for information on the match.</span>
    </footer>
</body>
</html>