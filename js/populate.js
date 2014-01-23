//--------------------------GET CURRENT DATE INFO--------------------------

var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];

var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday",
    "Sunday"];

var today = new Date();
var currentDate = new Date().getDate();
var currentDay = new Date().getDay();
var currentDayName = dayNames[currentDay];
var currentMonth = new Date().getMonth();
var currentMonthName = monthNames[currentMonth];
var currentYear = new Date().getFullYear();
var firstofmonth = new Date(currentYear, currentMonth, 1);
var firstofmonthDay = firstofmonth.getDay();

var firstofmonthName = dayNames[firstofmonthDay];
var firstofmonthInt = dayNames.indexOf(firstofmonthName);

//date- prefix means current date in focus -- aka which date will display the events for the selected day
var dateDate; var dateDateInt; var dateYear; var dateMonthInt; var dateMonthName; var dateDayInt; var dateDayName; var oldIdForColor;
var todayVisible = false;

var dummy = new Date();
var test = date_minus_month(dummy);
console.log("Log: "+test);

//console.log("Date: "+currentDate);
//console.log("Day of week: "+currentDay);
//console.log("Day of week string: "+currentDayName);
//console.log("Month: "+ currentMonth);
//console.log("Month string: "+currentMonthName);
//console.log("Year: "+currentYear);
//console.log("First of Month Date: "+firstofmonth);
//console.log("First of Month Name: "+firstofmonthName);
//console.log("First of Month Int: "+firstofmonthInt);
//console.log("Starting Sunday: "+startingSunday);

//starting from today, ..
populateMe(firstofmonth, firstofmonthInt)






//--------------------------POPULATE CALENDAR TABLE FUNCTION--------------------------
function populateMe(date, days) {
	
	todayVisible = false;
	var startingSunday = new Date();
	if (firstofmonth==0) {
		startingSunday=firstofmonth;
		//filldates(startingSunday);
	}
	else {
		startingSundayTemp = date_minus_days(date, days);
		startingSunday = new Date(startingSundayTemp);
	}
	dateDate = new Date(date);
	dateDateInt = new Date(date).getDate();
	dateYear = new Date(date).getFullYear();
	dateMonthInt = new Date(date).getMonth();
	dateMonthName = monthNames[dateMonthInt];
	dateDayInt = new Date(date).getDay();
	dateDayName = dayNames[dateDayInt];
	//console.log("date Year: "+dateYear);
	//console.log("dateMonthInt: "+dateMonthInt);
	//console.log("dateMonthName: "+dateMonthName);
	
	
	//populate the calendar view given info
	document.getElementById("monthDisplay").innerHTML = dateMonthName+", "+dateYear;
	
	var sc1 = "square-";
	var sc2 = "-date";
	var num = new Date(startingSunday);
	var numInt;
	//console.log("Num: "+num);
	for (var i=0;i<42;i++) {
		var str = sc1+i+sc2;
		var numTemp = new Date(num);
		numInt = new Date(numTemp).getDate();
		document.getElementById(str).innerHTML = numInt;
		var numX = String(num);
		var numXX = numX.substring(0, numX.length - 24);
		var todayX = String(today);
		var todayXX = todayX.substring(0, todayX.length - 24);
		/*if ( (numInt==currentDate) && ((numXX)==(todayXX)) ){
			//console.log('changing color for today');
			colorSelectedDate(i);
			todayVisible = true;
			
		}*/
		num = date_plus_days(numTemp, 1);
	}
	var data = [currentDay, currentMonth, currentDate, currentYear];
	populateEventMe(data);
}

function populateEventMe(data) {
	var dayX = dayNames[data[0]];
	var monthX = monthNames[data[1]];
	var dateX = data[2];
	document.getElementById("event-date").innerHTML = dayX+", "+monthX+" "+dateX+", "+data[3];
}





//--------------------------GET DATE INFO FROM SQUARE ID--------------------------

function getDateInfo(id){
	var day; var date; var month; var year; var ixx; var idOut;
	var sc1 = "square-";
	var sc2 = "-date";
	for (var i=0;i<42;i++) {
		//see if the month is over aka goes from high to low
		var ix = i-1;
		var strX = sc1+ix+sc2;
		var str = sc1+i+sc2;
		var pullDateNum = document.getElementById(str).innerHTML;
		if (ix>14) {
			var pullDateNumPrev = document.getElementById(strX).innerHTML;
		}
		if ((pullDateNum<pullDateNumPrev)){
			ixx= i;
		}
		
		if (i==id) {
			idOut = id;
			date = pullDateNum;
			
			if ((pullDateNum>7) && (id<7)) {
				//date selected is previous month.
				//console.log("datemonthint: "+dateMonthInt);
				month = dateMonthInt-1;
				//console.log("wat: "+month);
				if (month==(-1)) {
					year = dateYear-1;
					month = 11;
				}
				else{
					year = dateYear;
				}
			}
			else if (id>=ixx) {
				//date selected is next month.
				month = dateMonthInt+1;	
				if (month==12) {
					year = dateYear+1;
					month = 0;
				}
				else{
					year = dateYear;
				}
			}
			else {
				//date selected is current month
				month = dateMonthInt;				
				year = dateYear;
			}
			day = ((id)%7);
			var data = [day, month, date, year, idOut];
			var preppedData = prepareDate(data);
			$.post("home.php", {selectedDate: preppedData});
			return data;
			
			break;
			
			//console.log("Date: never get here!!"+date);
			//console.log("Month: "+month);
			//console.log("Year: "+year);
			//console.log("------");		
		}
	}
	
}


function colorSelectedDate(newIdForColor){
	if (!(oldIdForColor==null)){
		//console.log('uncolor div');
		var str = "square-"+oldIdForColor;
		document.getElementById(str).style.backgroundColor="rgba(0,0,0,.1)";
	}
	var str = "square-"+newIdForColor;
	document.getElementById(str).style.backgroundColor="rgba(61,88,161,1)";
	oldIdForColor = newIdForColor;
}


//--------------------------EVENT LISTENERS--------------------------

document.getElementById("monthNavDown").addEventListener("click", function(event){
	var dateTemp = date_minus_month(dateDate);
	date = dateTemp;
	var days = new Date(date).getDay();
	console.log("Month down clicked. days: "+days);
	populateMe(date, days);
	
}, false);

document.getElementById("monthNavUp").addEventListener("click", function(event){
	var dateTemp = date_plus_month(dateDate);
	date = dateTemp;
	var days = new Date(date).getDay();
	console.log("Month up clicked. days: "+days);
	populateMe(date, days);
	
}, false);

document.getElementById("monthNavToday").addEventListener("click", function(event){
	var dateTemp = new Date(firstofmonth);
	date = dateTemp;
	var days = new Date(date).getDay();
	console.log("Month to today clicked. days: "+days);
	populateMe(date, days);
	
}, false);

/*
function getEvents() {
		//var username = "<?php echo $_SESSION['user']?>";
		var datetimeStr = document.getElementById("event-date").innerHTML;
		alert(datetimeStr);
		var xmlHttp = new XMLHttpRequest();
		var ajaxStr = "?datetimeStr=" + datetimeStr; 
		xmlHttp.open("GET", "ajax.php" + ajaxStr, true);
		
		xmlHttp.addEventListener("load", fillFields, false);
		xmlHttp.send(null);
	}
	
function fillFields(event){
		//alert(event.target.responseText);
		//alert("hi");
		var t0 = document.getElementById("time-input-0");
		var e0 = document.getElementById("event-input-0");
		var t1 = document.getElementById("time-input-1");
		var e1 = document.getElementById("event-input-1");
		var t2 = document.getElementById("time-input-2");
		var e2 = document.getElementById("event-input-2");
		var t3 = document.getElementById("time-input-3");
		var e3 = document.getElementById("event-input-3");
		var t4 = document.getElementById("time-input-4");
		var e4 = document.getElementById("event-input-4");
		var e_arr = [e0,e1,e2,e3,e4];
		var t_arr = [t0,t1,t2,t3,t4];
		var allData = event.target.responseText;
		dataArray = allData.split("|");
		for (var i = 0; i < dataArray.length; i++) {
			if (dataArray[i*2] !="" && dataArray[i*2+1] !="" && dataArray[i*2] != null && dataArray[i*2+1] != null) {
				timefield = t_arr[i]
				eventfield = e_arr[i];
				timefield.value = dataArray[i*2];
				eventfield.value = dataArray[i*2+1];
			}
		}

	}	
	
*/



//--------------------------DATE/TIME FUNCTIONS--------------------------

function prepareTime_down(s) {
	//takes time as string HH:MM:SS and converts it to HH:MM
	sX = s.substring(0, s.length - 3);
	return sX;
}

function prepareTime_up(s) {
	//takes time as string HH:MM and adds ":00" to fit HH:MM:SS
	sX = s + ":00";
	return sX;
}

function prepareDate(data){
	var date = data[2];
	if (date <10) {
		//single digit, append
		date = "0"+date;
	}
	var month = (data[1])+1;
	if (month <10) {
		//single digit, append
		month = "0"+month;
	}
	year = data[3];
	var str = year+"-"+month+"-"+date+" ";
	console.log("Show events for: "+str);
}



function date_minus_month(date) {
    return new Date(
        date.getFullYear(), 
        date.getMonth() - 1, 
        date.getDate(),
        date.getHours(),
        date.getMinutes(),
        date.getSeconds(),
        date.getMilliseconds()
    );
}


function date_plus_month(date) {
    return new Date(
        date.getFullYear(), 
        date.getMonth() + 1, 
        date.getDate(),
        date.getHours(),
        date.getMinutes(),
        date.getSeconds(),
        date.getMilliseconds()
    );
}


function date_minus_days(date, days) {
    return new Date(
        date.getFullYear(), 
        date.getMonth(), 
        date.getDate() - days,
        date.getHours(),
        date.getMinutes(),
        date.getSeconds(),
        date.getMilliseconds()
    );
}

function date_plus_days(date, days) {
    return new Date(
        date.getFullYear(), 
        date.getMonth(), 
        date.getDate() + days,
        date.getHours(),
        date.getMinutes(),
        date.getSeconds(),
        date.getMilliseconds()
    );
}
