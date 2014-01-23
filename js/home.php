<!DOCTYPE html>
<head>
<title>FreeCal - Calendar</title>
<link rel="stylesheet" href="cal_style.css" type="text/css" media="screen">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>-
<script src="http://classes.engineering.wustl.edu/cse330/content/calendar.min.js"></script>

</head>
<body>
<div id="main">
<div class="logo">
    FreeCal
</div>


<!-- change "greeting" to pull username -->
<div class="menuWrap">
    <div class="welcome" id="greeting">
            <?php
                session_start();
                if (!empty($_SESSION['user'])){
                    echo "Welcome, ".$_SESSION['user'];
                }
                else{
                    header("Location: index.php?loginErrorWarning=q");
                    exit;
                }
            ?>
    </div>
    <div class="welcome" id="logout">
        
        <!-- connect this to log out function -->
        <a href="logout.php">
          Log out
        </a>
    </div>
    
    
</div>

<!-- current month filling the view -->
<div id="monthDisplay"></div>

<!-- begin main calendar table -->

<table id="mainCal">

    <!-- static day of week headers -->
    <tr>
    <th class="dayHeader">Sunday</th>
    <th class="dayHeader">Monday</th>
    <th class="dayHeader">Tuesday</th>
    <th class="dayHeader">Wednesday</th>
    <th class="dayHeader">Thursday</th>
    <th class="dayHeader">Friday</th>
    <th class="dayHeader">Saturday</th>
    </tr>

    <!-- week 1 top row -->
    <!-- NAMING CONVENTIONS-- each square has an id: "square-**" where the ** are the number ID of the square. each square has a cooresponding date div, "square-**-date", where the **'s match. Each square also has a cooresponding event UL, "square-**-events", where we can add <li>'s for each event on that day-->
    <tr class="weekRow" id="week-0">
    <td class="daySquare" id="square-0"><div class="date" id="square-0-date"></div><ul class="eventContainer" id="square-0-events">  </ul></td>
    <td class="daySquare" id="square-1"><div class="date" id="square-1-date"></div><ul class="eventContainer" id="square-1-events">  </ul></td>
    <td class="daySquare" id="square-2"><div class="date" id="square-2-date"></div><ul class="eventContainer" id="square-2-events">  </ul></td>
    <td class="daySquare" id="square-3"><div class="date" id="square-3-date"></div><ul class="eventContainer" id="square-3-events">  </ul></td>
    <td class="daySquare" id="square-4"><div class="date" id="square-4-date"></div><ul class="eventContainer" id="square-4-events">  </ul></td>
    <td class="daySquare" id="square-5"><div class="date" id="square-5-date"></div><ul class="eventContainer" id="square-5-events">  </ul></td>
    <td class="daySquare" id="square-6"><div class="date" id="square-6-date"></div><ul class="eventContainer" id="square-6-events">  </ul></td>
    </tr>

    <!-- row 2 -->
    <tr class="weekRow" id="week-1">
    <td class="daySquare" id="square-7"><div class="date" id="square-7-date"> </div><ul class="eventContainer" id="square-7-events"> </ul></td>
    <td class="daySquare" id="square-8"><div class="date" id="square-8-date"> </div><ul class="eventContainer" id="square-8-events">  </ul></td>
    <td class="daySquare" id="square-9"><div class="date" id="square-9-date"> </div><ul class="eventContainer" id="square-9-events">  </ul></td>
    <td class="daySquare" id="square-10"><div class="date" id="square-10-date"> </div><ul class="eventContainer" id="square-10-events">  </ul></td>
    <td class="daySquare" id="square-11"><div class="date" id="square-11-date"> </div><ul class="eventContainer" id="square-11-events">  </ul></td>
    <td class="daySquare" id="square-12"><div class="date" id="square-12-date"> </div><ul class="eventContainer" id="square-12-events">  </ul></td>
    <td class="daySquare" id="square-13"><div class="date" id="square-13-date"> </div><ul class="eventContainer" id="square-13-events">  </ul></td>
    </tr>
    
    <!-- row 3 -->
    <tr class="weekRow" id="week-2">
    <td class="daySquare" id="square-14"><div class="date" id="square-14-date"> </div><ul class="eventContainer" id="square-14-events">  </ul></td>
    <td class="daySquare" id="square-15"><div class="date" id="square-15-date"> </div><ul class="eventContainer" id="square-15-events">  </ul></td>
    <td class="daySquare" id="square-16"><div class="date" id="square-16-date"> </div><ul class="eventContainer" id="square-16-events">  </ul></td>
    <td class="daySquare" id="square-17"><div class="date" id="square-17-date"> </div><ul class="eventContainer" id="square-17-events">  </ul></td>
    <td class="daySquare" id="square-18"><div class="date" id="square-18-date"> </div><ul class="eventContainer" id="square-18-events">  </ul></td>
    <td class="daySquare" id="square-19"><div class="date" id="square-19-date"> </div><ul class="eventContainer" id="square-19-events">  </ul></td>
    <td class="daySquare" id="square-20"><div class="date" id="square-20-date"> </div><ul class="eventContainer" id="square-20-events">  </ul></td>
    </tr>
    
    <!-- row 4 -->
    <tr class="weekRow" id="week-3">
    <td class="daySquare" id="square-21"><div class="date" id="square-21-date"> </div><ul class="eventContainer" id="square-21-events">  </ul></td>
    <td class="daySquare" id="square-22"><div class="date" id="square-22-date"> </div><ul class="eventContainer" id="square-22-events">  </ul></td>
    <td class="daySquare" id="square-23"><div class="date" id="square-23-date"> </div><ul class="eventContainer" id="square-23-events">  </ul></td>
    <td class="daySquare" id="square-24"><div class="date" id="square-24-date"> </div><ul class="eventContainer" id="square-24-events">  </ul></td>
    <td class="daySquare" id="square-25"><div class="date" id="square-25-date"> </div><ul class="eventContainer" id="square-25-events">  </ul></td>
    <td class="daySquare" id="square-26"><div class="date" id="square-26-date"> </div><ul class="eventContainer" id="square-26-events">  </ul></td>
    <td class="daySquare" id="square-27"><div class="date" id="square-27-date"> </div><ul class="eventContainer" id="square-27-events">  </ul></td>
    </tr>
    
    <!-- row 5 -->
    <tr class="weekRow" id="week-4">
    <td class="daySquare" id="square-28"><div class="date" id="square-28-date"> </div><ul class="eventContainer" id="square-28-events">  </ul></td>
    <td class="daySquare" id="square-29"><div class="date" id="square-29-date"> </div><ul class="eventContainer" id="square-29-events">  </ul></td>
    <td class="daySquare" id="square-30"><div class="date" id="square-30-date"> </div><ul class="eventContainer" id="square-30-events">  </ul></td>
    <td class="daySquare" id="square-31"><div class="date" id="square-31-date"> </div><ul class="eventContainer" id="square-31-events">  </ul></td>
    <td class="daySquare" id="square-32"><div class="date" id="square-32-date"> </div><ul class="eventContainer" id="square-32-events">  </ul></td>
    <td class="daySquare" id="square-33"><div class="date" id="square-33-date"> </div><ul class="eventContainer" id="square-33-events">  </ul></td>
    <td class="daySquare" id="square-34"><div class="date" id="square-34-date"> </div><ul class="eventContainer" id="square-34-events">  </ul></td>
    </tr>

    <!-- row 6 hidden unless necessary -->
    <tr class="weekRow" id="week-5">
    <td class="daySquare" id="square-35"><div class="date" id="square-35-date"> </div><ul class="eventContainer" id="square-35-events">  </ul></td>
    <td class="daySquare" id="square-36"><div class="date" id="square-36-date"> </div><ul class="eventContainer" id="square-36-events">  </ul></td>
    <td class="daySquare" id="square-37"><div class="date" id="square-37-date"> </div><ul class="eventContainer" id="square-37-events">  </ul></td>
    <td class="daySquare" id="square-38"><div class="date" id="square-38-date"> </div><ul class="eventContainer" id="square-38-events">  </ul></td>
    <td class="daySquare" id="square-39"><div class="date" id="square-39-date"> </div><ul class="eventContainer" id="square-39-events">  </ul></td>
    <td class="daySquare" id="square-40"><div class="date" id="square-40-date"> </div><ul class="eventContainer" id="square-40-events">  </ul></td>
    <td class="daySquare" id="square-41"><div class="date" id="square-41-date"> </div><ul class="eventContainer" id="square-41-events">  </ul></td>
    </tr>
    


</table>
<!-- end of main calendar table -->




<div class="monthNav">
    
    <!-- show previous month -->
    <div id="monthNavDown" class="monthNavButton"><< </div>
    <div id="monthNavToday" class="monthNavButton">today</div>
    <!-- show next month --> 
    <div id="monthNavUp" class="monthNavButton"> >></div>
    
</div>

<!-- full event wrap --> 
<div id="big-event-wrapper">
    <div id="event-date">
        Sunday, January 1, 2014
    </div>
    <form id="events">
    	<input type="time" class="time-input" id="time-input-0"></input><input type="text" class="event-input" id="event-input-0"></input><button type="reset" class="event-clear" id="event-input-0-clear" >X</button>
        <input type="time" class="time-input" id="time-input-1"></input><input type="text" class="event-input" id="event-input-1"></input><button type="reset" class="event-clear" id="event-input-1-clear">X</button>
        <input type="time" class="time-input" id="time-input-2"></input><input type="text" class="event-input" id="event-input-2"></input><button type="reset" class="event-clear" id="event-input-2-clear">X</button>
        <input type="time" class="time-input" id="time-input-3"></input><input type="text" class="event-input" id="event-input-3"></input><button type="reset" class="event-clear" id="event-input-3-clear">X</button>
        <input type="time" class="time-input" id="time-input-4"></input><input type="text" class="event-input" id="event-input-4"></input><button type="reset" class="event-clear" id="event-input-4-clear">X</button>
        
        <input type="button" id="send-events" value="save changes"></input>
    </form>
    
 
</div>






<!-- insert bullshit here -->
<div class="notes">
    <h3>notes:</h3>
    insert shit here<br>
    click on day to edit the events on that day
    
</div>

</div>

<script type="text/javascript" src="js/populate.js"></script>

<script type="text/javascript">
	document.getElementById("send-events").addEventListener("click", getEvents, false);
	function getEvents() {
		var username = '<?php echo $_SESSION['user']?>';
		var xmlHttp = new XMLHttpRequest();
		//xmlHttp.open("GET",
		alert(username);
	}
	
</script>
</body>
</html>
