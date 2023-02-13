<!-- 
    Program: manage_archived.php
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
    <script src="../js/managearchived.js" defer></script>
</head>
<body>
    
<?php
// Login

if(!isset($_SESSION["login"])){
    echo("<div id='jsReload' data-filename='../site_manager.php'></div>");
    
}else{
if(isset($_GET["action"])){
    //---------- ACTIONS ----------

    // Add folder action
    if($_GET["action"] == "addfolder"){
        $current_data = json_decode(file_get_contents("../archived/{$_POST['type']}.json"));
        $name_is_taken = false;
        foreach($current_data as $data){
            if($data->date == $_POST['foldername']){
                $name_is_taken = true;
            }
        }
        if(!$name_is_taken){
            if($_POST['type'] == "location"){
                $current_data[] = new stdClass();
                $new_data = $current_data[count($current_data) - 1];
                $new_data->date = $_POST['foldername'];
                $new_data->loc = "";
            }else if($_POST['type'] == "winner"){
                $current_data[] = new stdClass();
                $new_data = $current_data[count($current_data) - 1];
                $new_data->date = $_POST['foldername'];
                $new_data->winners = ["","","","","","","","","",""];
            }
            file_put_contents("../archived/{$_POST['type']}.json", json_encode($current_data));
            
        }  
        // Edit folder action
    }else if($_GET["action"] == "editfoldername"){
        $current_data = json_decode(file_get_contents("../archived/{$_POST['type']}.json"));
        $name_is_taken = false;
        foreach($current_data as $data){
            if($data->date == $_POST['newname']){
                $name_is_taken = true;
            }
        }
        $item_index = 0;
        if(!$name_is_taken){
            $current_data_length = count($current_data);
            for($i = 0; $i < $current_data_length; ++$i){
                if($current_data[$i]->date == $_POST['oldname']){
                    $current_data[$i]->date = $_POST['newname'];
                }
            }
            file_put_contents("../archived/{$_POST['type']}.json", json_encode($current_data));
        }

        // Delete folder action
    }else if($_GET["action"] == "delfolder"){
        $folder_name = trim($_POST['foldername']);
        $current_data = json_decode(file_get_contents("../archived/{$_POST['type']}.json"));
        $current_data_length = count($current_data);

        for($i = 0; $i < $current_data_length; ++$i){
            if($current_data[$i]->date == $_POST['foldername']){
                array_splice($current_data, $i, 1);
            }
        }
        file_put_contents("../archived/{$_POST['type']}.json", json_encode($current_data));
         // add category action
    }else if($_GET["action"] == "savejson"){
        $temp_json = json_decode($_POST['tosave']);
        file_put_contents("../archived/{$_POST['type']}.json", $_POST['tosave']);
    }
        // END ACTIONS

        // --------- IF VIEWING LINKS IN YEAR ---------- 
}if(isset($_POST['type']) && isset($_POST['year'])){
    ?>
    <a href="./manage_archived.php?type=<?php echo $_POST["type"];?>" class="button-one" id="previousPage">< Go Back</a>
<?php

$current_data = json_decode(file_get_contents("../archived/{$_POST['type']}.json"));
$current_data_ext;
if($_POST['type'] == "location"){
    $current_data_length = count($current_data);
    for($i = 0; $i < $current_data_length; ++$i){
        if($current_data[$i]->date == $_POST['year']){
            $current_data_ext = [$current_data[$i]->loc];
        }
    }
}else{
    $current_data_length = count($current_data);
    for($i = 0; $i < $current_data_length; ++$i){
        if($current_data[$i]->date == $_POST['year']){
            $current_data_ext = $current_data[$i]->winners;
        }
    } 
}
?>
<div style="display: none" id="currentYear" data-value="<?php echo $_POST["year"];?>"></div>
<div style="display: none;" id="currentType" data-value="<?php echo($_POST['type']); ?>"></div>
<div class="center" >
    <h1 id="yearHeader" style=" display:inline-block;"><?php echo($_POST["year"]); ?></h1>
</div>
<div class="center">
    <a style="margin-left: 5vw; margin-left:0;" href="#" id="saveChangesButton" class="button-one">Save Changes</a>
</div>
<div id="galleryContainer">

<?php
// Build Links
$cur_html = "";
$counter = 0;
foreach($current_data_ext as $link){
    $placeholder_txt = ($_POST['type'] == "location") ? "Add Location Here" : "Add Winner Here";
    $label_elem = "";
    if($_POST["type"] == "winner"){
        $current_num = $counter + 1;
        $current_txt = "";
        if($current_num == 1){
            $current_txt = "st";
        }else if($current_num == 2){
            $current_txt = "nd";
        }else if($current_num == 3){
            $current_txt = "rd";
        }else{
            $current_txt = "th";
        }
        $label_elem = "<label>{$current_num}{$current_txt}. </label>";
    }
    $cur_link = htmlentities($link);
    $cur_html .= "<div class='manage-link-container'>$label_elem<input style='width: 80%;' type='text' class='manage-link' placeholder='$placeholder_txt' data-count='$counter' name='input$counter' value='$cur_link'></div>";
    ++$counter;
}
echo $cur_html;
$js_json = file_get_contents("../archived/{$_POST['type']}.json");
?>
</div>

<?php
echo "<script>var allLinks = $js_json;</script>";

} else if(isset($_GET['type']) || isset($_POST['type'])){
    $current_type = (isset($_GET['type'])) ? $_GET['type'] : $_POST['type'];

    function buildYears($current_data){
        rsort($current_data);
        $current_data_length = count($current_data);
        $data_html = "<div class='center'><a href='#' id='addFolderButton' class='button-one'>Add Year</a> </div> <div id='galleryContainer'><span>";
        for($i = 0; $i < $current_data_length; ++$i){
            $year = $current_data[$i]->date;
            $current_iteration = $i + 1;
            $data_html .= "<a class='box-link box-link-no-hover' href='#'>$year
            <div class='edit-folder-bar-top'></div>
            <div class='edit-folder-bar'>
            <div class='edit'></div>
            <div class='delete'></div>
            </div></a>";
            if($current_iteration % 4 == 0 && $current_iteration !== $current_data_length){
                $data_html .= "</span><span>";
            }else if($current_iteration == $current_data_length){
                $data_html .= "</span>";
            }
        }
        // href='./manage_archived.php?type=$current_type&year=$year'
        $data_html .= "</div>";
        echo $data_html;
    }

// IF TYPE IS LOCATION
    if($current_type == "location"){
        $current_dir = "../archived/location.json";
    ?>
    <div style="display: none;" id="currentType" data-value="<?php echo($current_type); ?>"></div>
    <a href="./manage_archived.php" class="button-one" id="previousPage">< back</a>
        <div class="center" ><h1 style=" display:inline-block;">Past Locations</h1></div>
    <?php
    $current_data = json_decode(file_get_contents($current_dir));
    buildYears($current_data);
    // IF TYPE IS WINNER
    }else if($current_type == "winner"){
        $current_dir = "../archived/winner.json";
        ?>
         <div style="display: none;" id="currentType" data-value="<?php echo($current_type); ?>"></div>
        <a href="./manage_archived.php" class="button-one" id="previousPage">< back</a>
            <div class="center" ><h1 style=" display:inline-block;">Past Winners</h1></div>
        <?php
        $current_data = json_decode(file_get_contents($current_dir));
        buildYears($current_data);

    }
}else{
?>
<a href="../site_manager.php" class="button-one" id="previousPage">< Home</a>
        <div class="center" ><h1 style=" display:inline-block;">Archive Manager</h1></div>
    <div id="galleryContainer">
        <span>
        <a class='box-link' href='./manage_archived.php?type=winner'>Past Winners</a>
        <a class='box-link' href='./manage_archived.php?type=location'>Past Locations</a>
        </span>
</div>
<?php
}
include("inc_footer.html");
}
?>  
</body>
</html>