<!-- FORMS TO CREATE/EDIT EVENTS -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/manageevents.css">
    <script src="./js/jsreload.js" defer></script>
</head>
<body>
    <?php
    if(!isset($_SESSION["login"])){
        echo("<div id='jsReload' data-filename='./manage_events.php'></div>");
    }else{
    // IF YOU ARE EDITING AN EVENT
        if(isset($_GET["action"]) && $_GET["action"] == "edit"){
            $month_values = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06",
            "July" => "07", "August" => "08", "September" => "09", "October" => "10", "November" => "11", "December" => "12");
            $current_day = $_GET["day"];
            $current_month = $month_values[$_GET["month"]];
            $current_year = date("Y");
            $current_id = $_GET["eventid"];
            $current_start_time = "";
            $current_end_time = "";
            $current_description = "";
            // FIND RIGHT EVENT
            $content = file_get_contents("./js/eventdata.json");
            $content = json_decode($content);
            // GET DAY/EVENT DATA
            $editing_day_index = 0;
            $editing_event_index = 0;
            for($i = 0; $i < count($content); ++$i){
                $cur_day = $content[$i];
                // IF DAY/MONTH IS CORRECT
                if($cur_day->day == $current_day && $cur_day->month == $_GET["month"]){
                    $editing_day_index = $i;
                    $events_length = count($cur_day->events);
                    for($o = 0; $o < $events_length; ++$o){
                        $current_event = $cur_day->events[$o];
                        // IF EVENT ID IN DAY IS CORRECT
                        if($current_event->id == $current_id){
                            $editing_event_index = $o;
                            $current_start_time = $current_event->startTime;
                            $current_end_time = $current_event->endTime;
                            $current_description = $current_event->eventDescription;
                        }
                    }
                }
            }
?>
    <div class="center" style="height: 100vh;">
        <form action="./manage_events.php?action=editevent" method="post" id="addEventForm">

            <div>
            <label for="eventDate">Event Date: </label>
            <input type="date" name="eventDate" id="eventDate" required value="<?php echo("$current_year-$current_month-$current_day"); ?>">
            </div>

            <div>
            <label for="eventName">Event Times: </label>
            <input type="text" name="eventTime1" id="eventTime1" placeholder="11:00am" required value="<?php echo($current_start_time); ?>">
            TO
            <input type="text" name="eventTime2" id="eventTime2" placeholder="1:00pm" required value="<?php echo($current_end_time); ?>">
            </div>

            <div>
            <label for="eventDesc">Event Description: </label>
            <textarea name="eventDesc" id="eventDesc" cols="10" rows="10" required><?php echo($current_description); ?></textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo($current_id); ?>">
            <input type="hidden" name="eventindex" value="<?php echo($editing_event_index); ?>">
            <input type="hidden" name="dayindex" value="<?php echo($editing_day_index); ?>">

            <div class="center">
                <input type="submit" value="Save Event">
            </div>
        </form>
    </div>
<?php
    //IF YOU'RE CREATING AN EVENT 
        }else{
            ?>
        
    <div class="center" style="height: 100vh;">
        <form action="./manage_events.php?action=addevent" method="post" id="addEventForm">

            <div>
            <label for="eventDate">Event Date: </label>
            <input type="date" name="eventDate" id="eventDate" required>
            </div>

            <div>
            <label for="eventName">Event Times: </label>
            <input type="text" name="eventTime1" id="eventTime1" placeholder="11:00am" required>
            TO
            <input type="text" name="eventTime2" id="eventTime2" placeholder="1:00pm" required>
            </div>

            <div>
            <label for="eventDesc">Event Description: </label>
            <textarea name="eventDesc" id="eventDesc" cols="10" rows="10" required></textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo(rand(1, getrandmax())) ?>">

            <div class="center">
                <input type="submit" value="Add Event">
            </div>
        </form>
    </div>
    <?php
    }

}
?>
</body>
</html>