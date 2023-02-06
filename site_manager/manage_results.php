<!-- 
    Program: manage_results.php
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
 -->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNBBGCM Site Manager</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="../css/sitemanager.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="../js/jsreload.js" defer></script>
    <script src="../js/manageresults.js" defer></script>
</head>
<body>
    
<?php
// Login
$current_dir = "../result_links";
if(!isset($_SESSION["login"])){
    echo("<div id='jsReload' data-filename='../site_manager.php'></div>");
}else{
    if(isset($_GET["action"])){
 // FOLDER ACTIONS
        // Add folder action
        if($_GET["action"] == "addfolder"){
            $new_dir = "$current_dir/{$_POST['foldername']}";
            mkdir($new_dir);
            file_put_contents("$new_dir/results.txt", "");
            // Edit folder action
        }else if($_GET["action"] == "editfoldername"){
            rename( realpath("$current_dir/{$_POST['oldname']}") , realpath("$current_dir") . "/{$_POST['newname']}" );
            // Delete folder action
        }else if($_GET["action"] == "delfolder"){
            if(count(scandir(realpath("$current_dir/{$_POST['foldername']}"))) > 2){
                $current_files = scandir(realpath("$current_dir/{$_POST['foldername']}"));
                array_shift($current_files);
                array_shift($current_files);
                foreach($current_files as $file){
                    unlink(realpath("$current_dir/{$_POST['foldername']}") . "/$file");
                }
                rmdir(realpath("$current_dir/{$_POST['foldername']}"));
            }else{
                rmdir(realpath("$current_dir/{$_POST['foldername']}"));
            }
            
        }else if($_GET["action"] == "savefile"){
            file_put_contents("$current_dir/{$_POST['year']}/results.txt", $_POST['tosave']);
        }
        // END ACTIONS
    }
    
    // IF YEAR IS SELECTED
        if(isset($_POST['year'])){
            $current_year = $_POST['year'];
            $url_current_year = urlencode($current_year);
            $year_name = ucwords(str_replace("_", " ", $current_year));

            ?>
            <div style="display: none" id="currentYear" data-value="<?php echo $current_year;?>"></div>
        <a href="./manage_results.php" class="button-one" id="previousPage">< Go Back</a>
        <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;"><?php echo $year_name;?></h1></div>
        <div class="center">
    <a href="#" id="addResultButton" class="button-one">Add Result(s)</a>
    <a style="margin-left: 5vw;" href="#" id="saveChangesButton" class="button-one">Save Changes</a>
</div>
<div class="center">
    <label for="nameInput">Name:</label>
    <input type="text" name="nameInput" id="nameInput">
    <label for="urlInput">URL:</label>
    <input type="text" name="urlInput" id="urlInput">
    <div id="addResultFinish" class="button-one">Add</div>
</div>
<div class="center" style="justify-content: space-between; color: rgb(235,235,235); font-size: 2vw; font-family:'Roboto', monospace; padding-left: 15%;
padding-right: 40%; padding-top: 5vh;">
            <span>Name</span>
            <span>URL</span>
</div>
    <div id="galleryContainer" style="padding-top: 0;">
    
    
    <!-- Build current folders -->
    <?php
    $result_file_dir = "$current_dir/$current_year/results.txt";
    $results = [];
    if(file_get_contents($result_file_dir) !== ""){
        $results = explode("`",file_get_contents($result_file_dir));
    }
    
    sort($results);
    $results_length = count($results);
    $gallery_html = "";
    for($i = 0; $i < $results_length; ++$i){
        $result = explode("~",$results[$i]);
        $result[0] =  htmlentities($result[0]);
        $result[1] =  htmlentities($result[1]);
        $current_iteration = $i + 1;
        $gallery_html .= "<div data-index='$i' class='manage-link-container result-wrapperr'>
        <input type='text' class='name-input' id='nameInput$i' value='{$result[0]}' />
        <input type='text' class='url-input' id='urlInput$i' value='{$result[1]}' />
        <div class='delete-link'></div>
        </div>";
       
    }
    echo $gallery_html;
    ?>
    </div>
    <?php
    $json_results = json_encode($results);
    echo("<script>const resultData = ($json_results);</script>");
    // IF YEAR IS NOT SELECTED

        }else{
        ?>
        <a href="../site_manager.php" class="button-one" id="previousPage">< Home</a>
        <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;">Results Manager</h1></div>
    <div class="center">
        <a href="#" id="addFolderButton" class="button-one">Add Folder</a>
    </div>
    <div id="galleryContainer">
    
    
    <!-- Build current folders -->
    <?php
    $results = scandir($current_dir);
    array_shift($results);
    array_shift($results);
    rsort($results);
    $results_length = count($results);
    $gallery_html = "<span>";
    for($i = 0; $i < $results_length; ++$i){
        $year = ucwords($results[$i]);
        $current_iteration = $i + 1;
        $gallery_html .= "<a class='box-link box-link-no-hover' href='#'>$year
        <div class='edit-folder-bar-top'></div>
        <div class='edit-folder-bar'>
        <div class='edit'></div>
        <div class='delete'></div>
        </div></a>";
        if($current_iteration % 4 == 0 && $current_iteration !== $results_length){
            $gallery_html .= "</span><span>";
        }else if($current_iteration == $results_length){
            $gallery_html .= "</span>";
        }
    }
    echo $gallery_html;
    ?>
    </div>
    <?php
        }
    }


?>
</body>
</html>