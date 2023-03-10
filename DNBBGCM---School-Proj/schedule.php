<!-- 
    Program: schedule.php
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
    <link rel="stylesheet" href="./css/schedule.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <script src="./js/nav.js" defer></script>
    <script src="./js/calendar.js" defer></script>
</head>
<body>
    <div id="pageID" data-pageid="schedule"></div>

    <div id="backgroundFade"></div>

<div id="topWrapper">
    <!-- Logo -->
    <?php include("./inc/inc_logo.php"); ?>

    <!-- NAV BAR FROM PHP -->
    <?php include("./inc/inc_nav.php"); ?>
</div>
    <h1 class="page-header">Schedule</h1>
    
    <!-- Calender Element -->
    <div id="calendarWrapper">
        <div id="calendarHeaderWrapper">
            <div id="backMonthArrow"></div>
            <h2 id="calendarHeader"></h2>
            <div id="forwardMonthArrow"></div>
        </div>
        <div id="calendarDays">
            <div class="calendar-grid-days">Sunday</div>
            <div class="calendar-grid-days">Monday</div>
            <div class="calendar-grid-days">Tuesday</div>
            <div class="calendar-grid-days">Wednesday</div>
            <div class="calendar-grid-days">Thursday</div>
            <div class="calendar-grid-days">Friday</div>
            <div class="calendar-grid-days">Saturday</div>
        </div>
    <div id="calendarContainer">
    </div>
</div>

<!-- Event Expanded Element -->
<div id="eventExpanded">
    <div id="eventExpandedContent">
        <h2>April 14</h2>
        <div class="event-item">
            <span class="time">8:00am - 5:00pm : </span>
            <span class="desc">Pro Shop open, Rogers Convention Center</span>
        </div>
        <div class="event-item">
            <span class="time">8:00am - 5:00pm : </span>
            <span class="desc">Test, Grand Ballroom 1-5, John Q Hammons Convention Center ??? Champions will take test same time as teams. Coaches and teams arrive 10 minutes early to get cardboard backing and get your teams seated. Do NOT forget your team???s answer sheets from your registration packets. If you do not retrieve the answer sheet(s) by the time the test begins, those test(s) will be scored as a ZERO.</span>
        </div>
    </div>
    <div id="eventExpandedExit"></div>
</div>

<?php include("./inc/inc_footer.php"); ?>
</body>
</html>