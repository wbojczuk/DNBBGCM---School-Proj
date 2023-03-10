<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNBBGCM Site Documentation</title>
    <link rel="stylesheet" href="../vendor/prism.css">
    <meta name="robots" content="noindex">
    <script src="../js/jsreload.js" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color: #5f5f5f;
            color: #fff;
        }
        #mainContent{
            display: inline-block;
            width: 70%;
            margin-left: 10%;
            font-family: "Roboto", serif;
        }
        #headerLinksGen{
            background-color: #2d2d2d;
            padding: 2vh 0 2vh 5vw;
        }
        h1{
            font-size: 4em;
            margin: 4vh 0 3vh 0;
        }
        h2{
            font-size: 3em;
            margin: 3vh 0 1vh 1vw;
            /* color: #67cdcc; */
        }
        h3{
            font-size: 2em;
            margin: 3vh 0 1vh 2vw;
            /* color: #cc99cd; */
        }
        p, pre{
            font-size: 1.2em;
            padding-left: 3vw;
        }
        .code{
            background-color: rgb(228, 228, 228);
        }
        ul{
            font-size: 1.3rem;
            
        }
        ul li a, ul > ul li a{
            color: #e2777a;
        }
        ul > ul{
            margin-left: 2vw;
            margin-bottom: 2vh;
        }
        ul > ul li{
            margin: 0.5vh 0;
        }
        li::marker{
            padding-left: 0;
            color: #7ec699;
        }
    </style>
</head>
<body>
    <?php
if(!isset($_SESSION["login"])){
    echo("<div id='jsReload' data-filename='./site_manager.php'></div>");
    
}else{
    #Just Site Documentation in HTML, nothing special
    ?>

    <section id="mainContent">
    <h1>DNBBGCM Site Documentation</h1>
    <div id="headerLinksGen"></div>
    <br> 
    <h2>The Site Manager</h2>
    <div>
    <p>
        To access the site manager application please type "LinkToWebsite/site_manager.php" into the website URL bar. You will be greeted by a password input field, enter the password and hit enter or the submit button to log in and view the tools available.
    </p>
    <h3>Event Manager</h3>
    <p>
        This tool within the site manager allows you to add/edit/delete events to the website's calendar/schedule. Due to the nature of this site, there are not options for recurring events and a time EG:( 8:00 - 10:00) must be set.<br>
        &bull; <strong>Adding an Event:</strong> In the first page after clicking the "Events" tab in the site manager, click the "Add Event" button. On the next page, insert the desired <em>Date</em>, <em>Time</em>, and the <em>Event's Description</em> and click "add".<br>
        &bull; <strong>Editing Existing Events:</strong>
        All the currently set events are displayed on the Event's main page, there are two options on the right side of each event. An Edit option to edit time and description of an event, and a Delete button which removes the event from the calendar.
        <br>
    </p>

    <h3>Gallery Manager</h3>
    <p>
        This is another tool in the site manager that will allow you to edit the website's photo gallery easily. The default layout is "Year > Category > Photos" though the year can be any valid text as long is it doesn't contain the characters / or \.<br>
        &bull; <strong>Adding a Year:</strong> In the first page after clicking the "Gallery" tab in the site manager, click the "Add Year" button. In the prompt, insert the desired name and click enter.<br>
        &bull; <strong>Adding a Photo Album/Category:</strong> Hover over the year you want to add the category into, a menu will show over the currently hovered year, click the option with the folder icon on the top to expand that folder, click the "Add Category" button, insert the desired name into the prompt and click "OK".<br>
        &bull; <strong>Editing Existing Year/Categorys:</strong> Hover over the Year/Category you want to edit, a menu will show over the currently hovered Year/Category, The option on the top opens the selected Category. There are two options on the bottom, an "Edit" and a "Delete" option, both depicted by icons. The Edit option allows you to edit the folder's name, and the Delete option is pretty self explanatory<br>
        &bull; <strong>Adding Photos to a Photo Album/Category:</strong> Hover over the Photo Album/Category you want to add the photos, a menu will show over the currently hovered Photo Album/Category, click the option with the folder icon on the top to expand that Category, click the "Add Photo(s)" button, insert the desired URL(s) into the prompt and click "Add". Multiple URLs can be added at once by seperating them with a Tilde "~"<br>
        &bull; <strong>Editing Existing Photo URLs:</strong> All URLs currenly in a Category are displayed below the "Add Photo(s)" option. Each link displayed, had an input field which displays the actual url, this is editable. There is a Delete button on the far right of the input field, and there are checkboxes on the left of the input field to allow Batch Deleting.
        <br>
    </p>
        <h3>Result Manager</h3>
        <p>
        Another tool in the Site Manager that allows adding/editing/deleting yearly match results. The default layout is "Year > Results".
        &bull; <strong>Adding a Year:</strong> In the first page after clicking the "Results" tab in the site manager, click the "Add Year" button. In the prompt, insert the desired name and click enter.<br>
        &bull; <strong>Editing Existing Years:</strong> Hover over the Year you want to edit, a menu will show over the currently hovered Year, The option on the top opens the selected Year. There are two options on the bottom, an "Edit" and a "Delete" option, both depicted by icons. The Edit option allows you to edit the Year's name, and the Delete option is pretty self explanatory<br>
         &bull; <strong>Adding Results to a Year:</strong> Hover over the Photo Album/Category you want to add the photos, a menu will show over the currently hovered Year, click the option with the folder icon on the top to expand that Category, click the "Add Result" button, insert the desired Result Name and Result URL into the prompt and click "Add". The Name input is on the left and will be the title of the result on the Website. The URL input on the right will be what the users are redirected to when they click the result on the website<br>
        </p>
        <h3>Archive Manager</h3>
    <p>
        This is another tool in the site manager that will allow you to edit the website's past locations/past winners easily. The default layout is "Year > Records" though the year can be any valid text as long is it doesn't contain the characters / or \.<br>
        &bull; <strong>Adding a Year:</strong> In the first page after clicking the "Archive" tab in the site manager, select Past Winners or Past Locations, click the "Add Year" button. In the prompt, insert the desired name and click enter.<br>
        &bull; <strong>Editing Existing Years:</strong> Hover over the Year you want to edit, a menu will show over the currently hovered Year, The option on the top opens the selected Year. There are two options on the bottom, an "Edit" and a "Delete" option, both depicted by icons. The Edit option allows you to edit the Year's name, and the Delete option is pretty self explanatory<br>
        &bull; <strong>Adding/Editing Records to a Year:</strong> Hover over the Year you want to add the photos, a menu will show over the currently hovered Year, click the option with the folder icon on the top to expand that Year. Inputs are automatically generated, insert the desired records into the input and click "Save".<br>
        <br>
    </p>
    </div>
<h2>Other Ways to Manage the site</h2>
<div>
         <p>
            This section will describe the other ways to manage/edit aspects of the site that are not included in the site manager application.
        </p>
    <br>

<h3>Navigation</h3>
    
    <p>
    If you need to ever add/remove/edit a link on the Navigation. All Navigation code that is editable resides in the <em>inc_nav.php</em> file in the <em>inc</em> folder. You only have to change the navbar once and it reflects everywhere on the site.<br>
    &bull; <strong>Adding/Deleting a item:</strong> Items should be added in the nav element with an id of <em>mainNav</em>. A single level link can be added in the format:
        <br></p>
        <pre><code class="language-markup"><!--<a href="./page_title.html" id="pageTitle">Page Title</a>--></code></pre>
        <br>
        <p>
        A dropdown list can be added using this syntax:<br>
    </p>
        <pre ><code class="language-markup"><!--
            <a id="categoryTitle" href="#" class="dropdown-link">
                Category Title
                <ul>
                    <li data-href="./page-title.html">Page Title</li>
                    <li data-href="./page-title.html">Page Title</li>
                </ul>
            </a> --></code></pre>
            <br>
            <h3>Expand Links</h3>
            <p>
                On the information page there are Expand links for the FAQ. To edit the existing ones, go into the "general_information.php", or "contact.php" page and find the links, each link is in the syntax below:</p>
                <pre><code class="language-markup"><!--
                    <div class="dropdown-info-item">
                        <div class="dropdown-info-title">
                            <div class="dropdown-info-img"></div>
                            <span>TITLE</span>
                        </div>
                        <div class="dropdown-info-content">
                            Content Goes here
                        </div>
                    </div>
            --></code></pre>
                <p>To add these to another page: <br>
                    -Include this in the head of the page.
            </p>
            <pre><code class="language-markup"><!--<script src="./js/dropdowninfo.js" defer></script>
<link rel="stylesheet" href="./css/dropdowninfo.css">--></code></pre>
            <p>
                -Then you add the Wrapper to page in the format below:
                <pre><code class="language-markup"><!--
                    <div class="dropdown-info-wrapper">
            
                    </div>--></code></pre>
                    <p>-You can then fill this wrapper with as many links as you want in this format</p>
                    <pre><code class="language-markup"><!--
                        <div class="dropdown-info-item">
                            <div class="dropdown-info-title">
                                <div class="dropdown-info-img"></div>
                                <span>TITLE</span>
                            </div>
                            <div class="dropdown-info-content">
                                Content Goes here
                            </div>
                        </div>
                --></code></pre>
            <p>
            </p>
    
    <br>
</div>
</section>

<script>

    // Index Link generator
        const topLevelHeaders = document.querySelectorAll("h2");
        let tlCount = 0;
        let linksHTML = "<ul>";
        topLevelHeaders.forEach((tlHead)=>{
            let llCount = 0;
            ++tlCount;
            tlHead.id = `head${tlCount}`;
            linksHTML += `<li><a href="#head${tlCount}">${tlHead.textContent}</a></li>`;
                if(tlHead.nextElementSibling.querySelector("h3")){
                    linksHTML += "<ul>";
                    const lowerLevelHeaders = tlHead.nextElementSibling.querySelectorAll("h3");
                lowerLevelHeaders.forEach((llHead)=>{
                    ++llCount;
                    llHead.id = `head${tlCount}${llCount}`;
                    linksHTML += `<li><a href="#head${tlCount}${llCount}">${llHead.textContent}</a></li>`;
                });
                linksHTML += "</ul>";
                }
                
                
        });
        linksHTML += "</ul>";
        document.getElementById("headerLinksGen").innerHTML = linksHTML;
    
</script>
<script src="../vendor/prism.js"></script>
<?php } ?>
</body>
</html>
