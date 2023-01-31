<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="../css/sitemanager.css">
    <script src="../js/jsreload.js" defer></script>
    <script src="../js/managegallery.js" defer></script>
</head>
<body>
    
<?php
// Login
$current_dir = "../gallery_links";
if(!isset($_SESSION["login"])){
    echo("<div id='jsReload' data-filename='../site_manager.php'></div>");
}else{ 
    if(isset($_GET["action"])){
        
        // FOLDER ACTIONS
        // Add folder action
        if($_GET["action"] == "addfolder"){
            $new_dir = "$current_dir/{$_POST['foldername']}";
            mkdir($new_dir);
            // Edit folder action
        }else if($_GET["action"] == "editfoldername"){
            rename( realpath("../gallery_links/{$_POST['oldname']}") , realpath("../gallery_links") . "/{$_POST['newname']}" );
            // Delete folder action
        }else if($_GET["action"] == "delfolder"){
            rmdir(realpath("$current_dir/{$_POST['foldername']}"));
        }else if($_GET["action"] == "addcategory"){
            // CATEGORY ACTIONS
            // add category
            $new_dir = "$current_dir/{$_POST['year']}/{$_POST['categoryname']}.json";
            file_put_contents($new_dir, "", FILE_APPEND);
            if(file_get_contents($new_dir) == ""){
                file_put_contents($new_dir, "[]");
            }
        }else if($_GET["action"] == "editcategoryname"){
            $new_dir = "$current_dir/{$_POST['year']}";
                rename(realpath("$new_dir/{$_POST['oldname']}.json") , realpath($new_dir) . "/{$_POST['newname']}.json" );
            }else if($_GET["action"] == "delcategory"){
                $new_dir = "$current_dir/{$_POST['year']}";
                unlink(realpath("$new_dir/{$_POST['categoryname']}.json"));
            }else if($_GET["action"] == "savejson"){
                $temp_json = json_decode($_POST['tosave']);
                file_put_contents("$current_dir/{$_POST['year']}/{$_POST['category']}.json", json_encode($temp_json));
            }
            // END ACTIONS

            // IF VIEWING LINKS IN ALBUM
    }if(isset($_POST["year"]) && isset($_POST["category"])){
        ?>
            <a href="./manage_gallery.php?year=<?php echo $_POST["year"];?>" class="button-one" id="previousPage">< Go Back</a>
        <?php
        
        $all_links = json_decode(file_get_contents("$current_dir/{$_POST['year']}/{$_POST['category']}.json"));

        ?>
        <div style="display: none" id="currentYear" data-value="<?php echo $_POST["year"];?>"></div>
        <div style="display: none" id="currentCategory" data-value="<?php echo $_POST["category"];?>"></div>
        <div class="center" ><h1 id="yearHeader" style=" display:inline-block;margin-top: 10vh;"><?php echo(ucwords(str_replace(["_", ".json"], [" ", ""], $_POST["category"]))); ?></h1></div>
<div class="center">
    <a href="#" id="addPhotoButton" class="button-one">Add Photo(s)</a>
    <a style="margin-left: 5vw;" href="#" id="saveChangesButton" class="button-one">Save Changes</a>
</div>
<div class="center">
    <textarea style="margin-top: 2vh;" name="addPhotoInput" id="addPhotoInput" cols="50" rows="10" placeholder='You can Add multiple links at once by separating them with a comma ","'></textarea>
    <div id="addPhotoFinish" class="button-one">Add</div>
</div>
<div id="batchDelete" class="button-two">Batch Delete</div><br>
<div id="galleryContainer">

        <?php
        // Build Links
        $cur_html = "";
        $counter = 0;
        foreach($all_links as $link){
            $cur_html .= "<div class='manage-link-container'> <input type='text' class='manage-link' data-count='$counter' name='input$counter' value='$link'> <div class='delete-link'></div> <input class='check-link' type='checkbox' name='check$counter' id='check$counter'> </div>";
            ++$counter;
        }
        echo $cur_html;
        $js_json = file_get_contents("$current_dir/{$_POST['year']}/{$_POST['category']}.json");
        ?>
        </div>
        
        <?php
        echo "<script>var allLinks = $js_json;</script>";
        // IF VIEWING PHOTO ALBUMS
    }else if(isset($_POST["year"]) || isset($_GET["year"])){
        $current_year = "";
        if(isset($_POST["year"])){
            $current_year = $_POST["year"];
        }else{
            $current_year = $_GET["year"];
        }

        // IF IN SUB DIRS ?>
        <a href="./manage_gallery.php" class="button-one" id="previousPage">< Go Back</a>
        <div class="center" ><h1 id="yearHeader" style=" display:inline-block;margin-top: 10vh;"><?php echo($current_year); ?></h1></div>
<div class="center">
    <a href="#" id="addCategoryButton" class="button-one">Add Category</a>
</div>
<div id="galleryContainer">


<!-- Build current Categories -->
<?php
$current_dir = "$current_dir/$current_year";
$categories = scandir($current_dir);
array_shift($categories);
array_shift($categories);
sort($categories);
$categories_length = count($categories);
$gallery_html = "<span>";
for($i = 0; $i < $categories_length; ++$i){
    $category = ucwords(str_replace(["_", ".json"], [" ", ""], $categories[$i]));
    $current_iteration = $i + 1;
    $gallery_html .= "<a class='box-link box-link-no-hover' href='#'>$category
    <div class='edit-category-bar-top'></div>
    <div class='edit-category-bar'>
    <div class='edit'></div>
    <div class='delete'></div>
    </div></a>";
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

// IF VIEWING YEARS
    }else{
    ?>
    <a href="../site_manager.php" class="button-one" id="previousPage">< Home</a>
    <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;">Years</h1></div>
<div class="center">
    <a href="#" id="addFolderButton" class="button-one">Add Folder</a>
</div>
<div id="galleryContainer">


<!-- Build current folders -->
<?php
$years = scandir($current_dir);
array_shift($years);
array_shift($years);
rsort($years);
$years_length = count($years);
$gallery_html = "<span>";
for($i = 0; $i < $years_length; ++$i){
    $year = $years[$i];
    $current_iteration = $i + 1;
    $gallery_html .= "<a class='box-link box-link-no-hover' href='#'>$year
    <div class='edit-folder-bar-top'></div>
    <div class='edit-folder-bar'>
    <div class='edit'></div>
    <div class='delete'></div>
    </div></a>";
    if($current_iteration % 4 == 0 && $current_iteration !== $years_length){
        $gallery_html .= "</span><span>";
    }else if($current_iteration == $years_length){
        $gallery_html .= "</span>";
    }
}
echo $gallery_html;
?>
</div>
<?php
}
} ?>
</body>
</html>