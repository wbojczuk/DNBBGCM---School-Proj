<?php
session_set_cookie_params(0, "/");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/manageevents.css">
    <script src="./js/manageevents.js" defer></script>
    <script src="./js/jsreload.js" defer></script>
</head>
<?php
// Login
if(!isset($_SESSION["login"])){
    $current_password = "5d7d56918e05d2984f225f44657d80c55bb0365eaedf7f9228ede7d897ca55fc";
    if(isset($_GET["action"]) && $_GET["action"] == "login"){
        if(hash("sha256", $_POST["loginPass"]) == $current_password){
            $_SESSION["login"] = "true";
            echo("<div id='jsReload' data-filename='./manage_events.php'></div>");
        }else{
            ?>
            <div class="center"><h1>DNBBGCM Event Manager</h1></div>
        <div class="center" style="height: 100vh;">
        <div>
        <form action="./manage_events.php?action=login" method="post">
        <label for="loginPass">Please Enter Password: </label>
        <input type="password" id="loginPass" name="loginPass"> 
        <input type="submit" value="Submit">
        <div class="center">
            <span class="form-error">Incorrect Password!</span>
        </div>
        </div>
    </form>
    </div>
            <?php
        }
    }else{
    ?>
    <div class="center" ><h1 style=" display:inline-block;position:relative; top: 10vh;">DNBBGCM Event Manager</h1></div>
    <div class="center" style="height: 100vh; width:100%; position:fixed;top:0;left:0;">
<form action="./manage_events.php?action=login" method="post">
        <label for="loginPass">Please Enter Password: </label><br class="mobile">
        <input type="password" id="loginPass" name="loginPass"> 
        <input type="submit" value="Submit" class="button-two">
    </form>
    </div>
    <?php
    }
}else{

?>
<body>
    <div class="center">
        <a href="./add_event.php" id="addEventButton" class="button-one">Add Event</a>
    </div>
    <?php
    // IF AN ACTION IS SET
    if(isset($_GET["action"])){
        // ** DELETE ACTION **
        if($_GET["action"] == "delete"){
            $day = $_GET["day"];
            $id = $_GET["eventid"];
            $month = $_GET["month"];
            $del_content = file_get_contents("./js/eventdata.json");
            $del_content = json_decode($del_content);
            for($i = 0; $i < count($del_content); ++$i){
                $current_day = $del_content[$i];
                if($current_day->day == $day && $current_day->month == $month){
                    for($o = 0; $o < count($current_day->events); ++$o){
                        if($current_day->events[$o]->id == $id){
                            array_splice($current_day->events, $o, 1);
                            if(count($current_day->events) == 0){
                                array_splice($del_content, $i, 1);
                            }
                            file_put_contents("./js/eventdata.json", json_encode($del_content));
                        }
                    }
                }
            }
            // ** ADD EVENT ACTION **
        }else if($_GET["action"] == "addevent"){
            $date = explode("-" ,$_POST["eventDate"]);
            $day = $date[2];
            $month = (int)$date[1] - 1;
            $day_exists = false;
            $monthNames = array("January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
        );

            $content = file_get_contents("./js/eventdata.json");
            $content = json_decode($content);
            // CHECK IF DAY EXISTS
            $existing_day_index = 0;
            for($i = 0; $i < count($content); ++$i){
                $current_day = $content[$i];
                if($current_day->day == $day && $current_day->month == $monthNames[$month]){
                    $day_exists = true;
                    $existing_day_index = $i;
                }
            }
            if($day_exists == true){
                $cur_evt_key = count($content[$existing_day_index]->events);
                $content[$existing_day_index]->events[$cur_evt_key] = new stdClass();
                $current_event = $content[$existing_day_index]->events[$cur_evt_key];
                $current_event->startTime = get_formatted_times($_POST["eventTime1"]);
                $current_event->endTime = get_formatted_times($_POST["eventTime2"]);
                $current_event->eventDescription = $_POST["eventDesc"];
                $current_event->id = $_POST["id"];
                
            }else{
                $current_elem = count($content);
                $content[$current_elem] = new stdClass();
                $content[$current_elem]->day = (int)$day;
                $content[$current_elem]->month = $monthNames[$month];
                $content[$current_elem]->events = array();
                $content[$current_elem]->events[0] = new stdClass();
                $content[$current_elem]->events[0]->startTime = get_formatted_times($_POST["eventTime1"]);
                $content[$current_elem]->events[0]->endTime = get_formatted_times($_POST["eventTime2"]);
                $content[$current_elem]->events[0]->eventDescription = $_POST["eventDesc"];
                $content[$current_elem]->events[0]->id = $_POST["id"];
            }
            file_put_contents("./js/eventdata.json", json_encode($content));
            // ** EDIT EVENT ACTION **
        }else if($_GET["action"] == "editevent"){
            $monthNames = array("January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December");

                $content = file_get_contents("./js/eventdata.json");
                $content = json_decode($content);
                $current_event = $content[$_POST["dayindex"]]->events[$_POST["eventindex"]];
                $current_event->startTime = get_formatted_times($_POST["eventTime1"]);
                $current_event->endTime = get_formatted_times($_POST["eventTime2"]);
                $current_event->eventDescription = $_POST["eventDesc"];
                $current_event->id = $_POST["id"];
                file_put_contents("./js/eventdata.json", json_encode($content));
        }
    }

    // BUILD EVENT ELEMENTS
        $content = file_get_contents("./js/eventdata.json");
        $content = json_decode($content);
        // FOR EACH DAY
        for($i = 0; $i < count($content); ++$i){
            $current_day = $content[$i];
            echo "<div><h1 class='event-day-title'>{$current_day->{'month'}} {$current_day->{'day'}}</h1></div>";
            for($o = 0; $o < count($current_day->events); ++$o){
                $current_event = $current_day->events[$o];
                $start_time = $current_event->startTime;
                $end_time = $current_event->endTime;
                $event_desc = $current_event->eventDescription;
                echo("
                <div class='event-wrapper' data-day='{$current_day->day}' data-month='{$current_day->month}' data-eventid='{$current_event->id}'>
                    <div class='time'>$start_time - $end_time</div>
                    <div class='desc'>$event_desc</div>
                    <div class='event-edit-wrapper'>
                        <div class='delete-button'></div>
                        <div class='edit-button'></div>
                    </div>
                </div>
                ");
            }
        }
    }
    function get_formatted_times($time){
        // TAKES TIME IN FORMAT '00:00'
        $h_and_m = explode(":", $time);
        $hours = (int)$h_and_m[0];
        $minutes = $h_and_m[1];
        $pm_or_am = "";
        if($hours == 12){
            $pm_or_am = "pm";
        }else if($hours == 24){
            $pm_or_am = "am";
            $hours -= 12;
        }else if($hours > 12){
            $pm_or_am = "pm";
            $hours -= 12;
        }else{
            $pm_or_am = "am";
        }
        return "$hours:$minutes$pm_or_am";
    }
    ?>
</body>
</html>