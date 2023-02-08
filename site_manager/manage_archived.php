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
    
}
if(isset($_GET["action"])){
    //---------- ACTIONS ----------

    // Add folder action
    if($_GET["action"] == "addfolder"){
        $current_data = json_decode(file_get_contents("../archived/{$_GET['type']}.json"));
        $name_is_taken = false;
        foreach($current_data as $data){
            if($data->date == $_GET['foldername']){
                $name_is_taken = true;
            }
        }
        if(!$name_is_taken){
            if($_GET['type'] == "location"){
                $current_data[] = new stdClass();
                $new_data = $current_data[count($current_data) - 1];
                $new_data->date = $_POST['foldername'];
                $new_data->loc = "";
            }else if($_GET['type'] == "winner"){
                $current_data[] = new stdClass();
                $new_data = $current_data[count($current_data) - 1];
                $new_data->date = $_POST['foldername'];
                $new_data->winners = [];
            }
            file_put_contents("../archived/{$_GET['type']}.json", json_encode($current_data));
            
        }

        

        // Edit folder action
    }
        // END ACTIONS

        // --------- IF VIEWING LINKS IN ALBUM ---------- 
}
if(isset($_GET['type'])){
    $current_type = $_GET['type'];

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
        <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;">Past Locations</h1></div>
    <?php
    $current_data = json_decode(file_get_contents($current_dir));
    buildYears($current_data);
    // IF TYPE IS WINNER
    }else if($current_type == "winner"){
        $current_dir = "../archived/winner.json";
        ?>
         <div style="display: none;" id="currentType" data-value="<?php echo($current_type); ?>"></div>
        <a href="./manage_archived.php" class="button-one" id="previousPage">< back</a>
            <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;">Past Winners</h1></div>
        <?php
        $current_data = json_decode(file_get_contents($current_dir));
        buildYears($current_data);

    }
}else{
?>
<a href="../site_manager.php" class="button-one" id="previousPage">< Home</a>
        <div class="center" ><h1 style=" display:inline-block;margin-top: 10vh;">Archived Manager</h1></div>
    <div id="galleryContainer">
        <span>
        <a class='box-link' href='./manage_archived.php?type=winner'>Past Winners</a>
        <a class='box-link' href='./manage_archived.php?type=location'>Past Locations</a>
        </span>
</div>
<?php
}
?>
    
</body>
</html>