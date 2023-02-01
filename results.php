<!-- 
    Program: results.php
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
    <script src="./js/nav.js" defer></script>
</head>
<body>
    <div id="pageID" data-pageid="results"></div>

 <!-- Logo -->
 <a href="./index.html">
 <img src="./img/daisynationallogo2020.png" alt="Daisy Logo" id="secondaryLogo">
</a>
    <!-- START NAV INJECTED FROM nav.js-->
    <nav id="mainNav"></nav>
    <nav id="mobileNav" class="mobile">
        <div id="mobileNavMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <img id="mobileNavLogo" src="./img/daisynationallogo2020.png" alt="Daisy Logo">
    </nav>
    <!-- END NAV -->

<h1 id="galleryHeader">Results</h1>
    <div id="galleryContainer">
        <!-- IF year has not been selected yet -->
        <?php
        // Get the folders in result_links and create box-link elems
        $temp_results = scandir("./result_links");
        array_shift($temp_results);
        array_shift($temp_results);
        $results = [];
        foreach($temp_results as $result){
            if(is_dir("./result_links/$result")){
                $results[] = $result;
            }
        }
        rsort($results);
        $results_length = count($results);
        $gallery_html = "<span>";
        for($i = 0; $i < $results_length; ++$i){
            $year = $results[$i];
            $url_year = urlencode($year);
            $current_iteration = $i + 1;
            $gallery_html .= "<a class='box-link' href='./results_page.php?year=$url_year'>$year</a>";
            if($current_iteration % 4 == 0 && $current_iteration !== $results_length){
                $gallery_html .= "</span><span>";
            }else if($current_iteration == $results_length){
                $gallery_html .= "</span>";
            }
        }
        echo $gallery_html;
        ?>
    </div>

    <footer>
    <span>William Bojczuk &copy; 2023, Email <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a> for web site problems, suggestions or for information on the match.</span>
    </footer>
</body>
</html>