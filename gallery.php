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
</head>
<body>
    <div id="pageID" data-pageid="gallery"></div>

    <div id="topWrapper">
 <!-- Logo -->
<div class="center" id="secondaryLogoWrapper">
 <a href="./index.html">
 <img src="./img/daisynationallogo2020.png" alt="Daisy Logo" id="secondaryLogo">
</a>
</div>

 <nav id="mobileNav" class="mobile">
    <div id="mobileNavMenu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <img id="mobileNavLogo" src="./img/daisynationallogo2020.png" alt="Daisy Logo">
</nav>
   <!-- START NAV INJECTED FROM nav.js-->
   <nav id="mainNav"></nav>
   <!-- END NAV -->
</div>

   <!-- IF THE YEAR HAS BEEN SELECTED-->
<?php if(isset($_GET["year"])){?>
    <?php
            #VARIABLES
            $current_year = $_GET["year"];
            $url_year = urlencode($current_year);
            $current_dir = "./gallery_links/$current_year";
        ?>
        <h1 class="page-header" id="galleryHeader"><?php echo "<a href='./gallery.php'>Gallery</a> / $current_year"; ?></h1>
    <div id="galleryContainer">
        <?php
        
        // Get and display categories
        $categories = scandir($current_dir);
        array_shift($categories);
        array_shift($categories);
        sort($categories);
        
        if(array_search("main_img.json", $categories)){
            $main_img = array_splice($categories,array_search("main_img.json", $categories), 1);
        }
        
        $categories_length = count($categories);
        $gallery_html = "<span>";
        // generate category box-link elements
        for($i = 0; $i < $categories_length; ++$i){
            $category = ucwords(str_replace(["_", ".json"], [" ", ""], $categories[$i]));
            $cat_no_txt = str_replace(".json",  "", $categories[$i]);
            $current_iteration = $i + 1;
            
            $url_cat = urlencode($cat_no_txt);
            $gallery_html .= "<a class='box-link' href='./photo_gallery.php?year=$url_year&category=$url_cat'>$category</a>";
            if($current_iteration % 4 == 0 && $current_iteration !== $categories_length){
                $gallery_html .= "</span><span>";
            }else if($current_iteration == $categories_length){
                $gallery_html .= "</span>";
            }
        }
        echo $gallery_html;
        ?>
    </div>
    
    <?php
    }else{
        ?>
<h1 class="page-header" id="galleryHeader">Gallery</h1>
    <div id="galleryContainer">
        <!-- IF year has not been selected yet -->
        <?php
        // Get the content of gallery_links and create box-link elems
        $years = scandir("./gallery_links");
        array_shift($years);
        array_shift($years);
        rsort($years);
        $years_length = count($years);
        $gallery_html = "<span>";
        for($i = 0; $i < $years_length; ++$i){
            $year = $years[$i];
            $url_year = urlencode($year);
            $current_iteration = $i + 1;
            $gallery_html .= "<a class='box-link' href='./gallery.php?year=$url_year'>$year</a>";
            if($current_iteration % 4 == 0 && $current_iteration !== $years_length){
                $gallery_html .= "</span><span>";
            }else if($current_iteration == $years_length){
                $gallery_html .= "</span>";
            }
        }
        echo $gallery_html;
        ?>
    </div>

<?php }?>
    <footer>
        <span>William Bojczuk &copy; 2023, Email <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a> for web site problems, suggestions or for information on the match.</span>
    </footer>
</body>
</html>