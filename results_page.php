
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
    <?php
        if(isset($_GET['year'])){
            $current_year = $_GET['year'];
            $current_dir = "./result_links/$current_year";
            ?>
            
            <h1 id="galleryHeader"><?php echo("<a href='./results.php'>Results</a> / $current_year");?></h1>
            <div id="galleryContainer">
            <h3 style="margin-bottom: 3vw;" class="picture-gallery-desc">You can also find the match results by Orion (the electronic system that scored the match) at <a href="http://orionresults.com/team/Search.aspx?Search=Daisy%20Outdoor%20Sports%20Rogers%20AR%20<?php echo$current_year;?>" target="_blank" style="color: white;">www.orionresults.com</a>


</h3>
            <?php

        $results = file_get_contents("$current_dir/results.txt");
        $results = explode(",", $results);
        sort($results);
        $results_length = count($results);
        $result_html = "<span>";
        // generate category box-link elements
        for($i = 0; $i < $results_length; ++$i){
            $current_iteration = $i + 1;
            $result = explode("~", $results[$i]);
            $result_name = trim($result[0]);
            $result_link = trim($result[1]);
            $result_html .= "<a class='box-link' target='_blank' href=' $result_link'>$result_name</a>";
            if($current_iteration % 4 == 0 && $current_iteration !== $results_length){
                $result_html .= "</span><span>";
            }else if($current_iteration == $results_length){
                $result_html .= "</span>";
            }
        }
        echo $result_html;

        }
    ?>
       </div>
    <footer>
    
        <span>William Bojczuk &copy; 2023, Email <a href="mailto:dwightwatt@dwightwatt.com">dwightwatt@dwightwatt.com</a> for web site problems, suggestions or for information on the match.</span>
    </footer>
</body>
</html>