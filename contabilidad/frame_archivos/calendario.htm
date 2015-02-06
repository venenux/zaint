<!-- saved from url=(0022)http://internet.e-mail -->
<HTML>
<HEAD>
  <TITLE>Calendario</TITLE>

<SCRIPT LANGUAGE="JavaScript">

<!--

function setDate() {
// Aqui se definen las variables dateField y inDate. Esta última es un string que contiene el 
// valor del campo dateField

    this.dateField   = opener.dateField;
    this.inDate      = dateField.value;
    // SET DAY MONTH AND YEAR TO TODAY'S DATE
    var now   = new Date();
    var day   = now.getDate();
    var month = now.getMonth();
    var year  = now.getYear();

//    if (year < 100) {
//        year += 1900;
//    }
//    else {
//        year += 2000;
//    }

// Patch aplicado por HJS para solucionar Y2K
    year  = now.getFullYear();

    // IF A DATE WAS PASSED IN THEN PARSE THAT DATE
    if (inDate.indexOf("/")) {
        var inDay = inDate.substring(0,inDate.indexOf("/"));
            if (inDay.substring(0,1) == "0" && inDay.length > 1)
                inDay = inDay.substring(1,inDay.length);
            inDay = parseInt(inDay);
        var inMonth   = inDate.substring(inDate.indexOf("/") + 1, inDate.lastIndexOf("/"));
            if (inMonth.substring(0,1) == "0" && inMonth.length > 1)
                inMonth = inMonth.substring(1,inMonth.length);
            inMonth = parseInt(inMonth);
        var inYear  = parseInt(inDate.substring(inDate.lastIndexOf("/") + 1, inDate.length));

        if (inDay) {
            day = inDay;
        }
        if (inMonth) {
            month = inMonth-1;
        }
        if (inYear) {
            year = inYear;
        }
    }
    this.focusDay                           = day;
    document.calControl.month.selectedIndex = month;
    document.calControl.year.value          = year;
    displayCalendar(day, month, year);
}


function setToday() {
    // SET DAY MONTH AND YEAR TO TODAY'S DATE
    var now   = new Date();
    var day   = now.getDate();
    var month = now.getMonth();
    var year  = now.getYear();

//    if (year < 100) {
//        year += 1900;
//    }
//    else {
//        year += 2000;
//    }

// Patch aplicado por HJS para solucionar Y2K
    year  = now.getFullYear();

    this.focusDay                           = day;
    document.calControl.month.selectedIndex = month;
    document.calControl.year.value          = year;
    displayCalendar(day, month, year);
}


function isFourDigitYear(year) {
    if (year.length != 4) {
        alert ("El Año debe tener una longitud de 4 dígitos");
        document.calControl.year.select();
        document.calControl.year.focus();
    }
    else {
        return true;
    }
}


function selectDate() {
    var year  = document.calControl.year.value;
    if (isFourDigitYear(year)) {
        var day   = 0;
        var month = document.calControl.month.selectedIndex;
        displayCalendar(day, month, year);
    }
}


function setPreviousYear() {
    var year  = document.calControl.year.value;
    if (isFourDigitYear(year)) {
        var day   = 0;
        var month = document.calControl.month.selectedIndex;
        year--;
        document.calControl.year.value = year;
        displayCalendar(day, month, year);
    }
}


function setPreviousMonth() {
    var year  = document.calControl.year.value;
    if (isFourDigitYear(year)) {
        var day   = 0;
        var month = document.calControl.month.selectedIndex;
        if (month == 0) {
            month = 11;
            if (year > 1000) {
                year--;
                document.calControl.year.value = year;
            }
        }
        else {
            month--;
        }
        document.calControl.month.selectedIndex = month;
        displayCalendar(day, month, year);
    }
}


function setNextMonth() {
    var year  = document.calControl.year.value;
    if (isFourDigitYear(year)) {
        var day   = 0;
        var month = document.calControl.month.selectedIndex;
        if (month == 11) {
            month = 0;
            year++;
            document.calControl.year.value = year;
        }
        else {
            month++;
        }
        document.calControl.month.selectedIndex = month;
        displayCalendar(day, month, year);
    }
}


function setNextYear() {
    var year  = document.calControl.year.value;
    if (isFourDigitYear(year)) {
        var day   = 0;
        var month = document.calControl.month.selectedIndex;
        year++;
        document.calControl.year.value = year;
        displayCalendar(day, month, year);
    }
}


function displayCalendar(day, month, year) {       

    day     = parseInt(day);
    month   = parseInt(month);
    year    = parseInt(year);
    var i   = 0;
    var now = new Date();

    if (day == 0) {
        var nowDay = now.getDate();
    }
    else {
        var nowDay = day;
    }
    var days         = getDaysInMonth(month+1,year);
    var firstOfMonth = new Date (year, month, 1);
    var startingPos  = firstOfMonth.getDay();
    days += startingPos;

    // Blanqueo de Botones
    for (i = 0; i < startingPos; i++) {
        document.calButtons.elements[i].value = "     ";
    }

    // SET VALUES FOR DAYS OF THE MONTH
    for (i = startingPos; i < days; i++)  
    {
        if (i-startingPos+1 < 10) {
		var espacio="0";
                document.calButtons.elements[i].value = espacio + (i-startingPos+1);
        }
        else {
                document.calButtons.elements[i].value = i-startingPos+1;
        }
        document.calButtons.elements[i].onClick = "returnDate"
    }

    // MAKE REMAINING NON-DATE BUTTONS BLANK
    for (i=days; i<42; i++)  {
        document.calButtons.elements[i].value = "     ";
    }

    // GIVE FOCUS TO CORRECT DAY
    document.calButtons.elements[focusDay+startingPos-1].focus();
}


// GET NUMBER OF DAYS IN MONTH
function getDaysInMonth(month,year)  {
    var days;
    if (month==1 || month==3 || month==5 || month==7 || month==8 ||
        month==10 || month==12)  days=31;
    else if (month==4 || month==6 || month==9 || month==11) days=30;
    else if (month==2)  {
        if (isLeapYear(year)) {
            days=29;
        }
        else {
            days=28;
        }
    }
    return (days);
}


// CHECK TO SEE IF YEAR IS A LEAP YEAR
function isLeapYear (Year) {
    if (((Year % 4)==0) && ((Year % 100)!=0) || ((Year % 400)==0)) {
        return (true);
    }
    else {
        return (false);
    }
}


// SET FORM FIELD VALUE TO THE DATE SELECTED
function returnDate(inDay)
{
    var day   = inDay;
    var month = (document.calControl.month.selectedIndex)+1;
    var year  = document.calControl.year.value;

    if ((""+month).length == 1)
    {
        month="0"+month;
    }
    if ((""+day).length == 1)
    {
        day="0"+day;
    }
    if (day != "   ") {
        dateField.value = day + "/" + month + "/" + year;
        dateField.focus();
        window.close()
    }
}


// -->

</SCRIPT>
</HEAD>

<BODY BGCOLOR="#364B93" ONLOAD="setDate()">

<CENTER>
<FORM NAME="calControl" onSubmit="return false;">
<TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0>
<TR><TD COLSPAN=7>
<CENTER>
<SELECT NAME="month" onChange='selectDate()' style="font-family: Verdana; font-size: 10; font-weight: bolder">
   <OPTION>Enero
   <OPTION>Febrero
   <OPTION>Marzo
   <OPTION>Abril
   <OPTION>Mayo
   <OPTION>Junio
   <OPTION>Julio
   <OPTION>Agosto
   <OPTION>Septiembre
   <OPTION>Octubre
   <OPTION>Noviembre
   <OPTION>Diciembre
</SELECT>
<INPUT NAME="year" TYPE=TEXT SIZE=4 MAXLENGTH=4 onChange="selectDate()" style="font-family: Verdana; font-size: 10; font-weight: bolder">
</CENTER>
</TD>
</TR>

<TR>
<TD COLSPAN=7>
<CENTER><INPUT 
TYPE=BUTTON NAME="previousYear" VALUE="<<" onClick="setPreviousYear()" style="font-family: Verdana; font-size: 10; font-weight: bolder"><INPUT 
TYPE=BUTTON NAME="previousYear" VALUE=" < "   onClick="setPreviousMonth()" style="font-family: Verdana; font-size: 10; font-weight: bolder"><INPUT 
TYPE=BUTTON NAME="previousYear" VALUE="Hoy" onClick="setToday()" style="font-family: Verdana; font-size: 10; font-weight: bolder"><INPUT 
TYPE=BUTTON NAME="previousYear" VALUE=" > "   onClick="setNextMonth()" style="font-family: Verdana; font-size: 10; font-weight: bolder"><INPUT 
TYPE=BUTTON NAME="previousYear" VALUE=">>"    onClick="setNextYear()" style="font-family: Verdana; font-size: 10; font-weight: bolder">
</CENTER>
</TD>
</TR>
</FORM>

<FORM NAME="calButtons">

<TR HEIGHT=10><TD></TD></TR>

<TR><TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Do</B></FONT></CENTER></TD>
    <TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Lu</B></FONT></CENTER></TD>
    <TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Ma</B></FONT></CENTER></TD>
    <TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Mi</B></FONT></CENTER></TD>
    <TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Ju</B></FONT></CENTER></TD>
    <TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Vi</B></FONT></CENTER></TD>
    <TD><CENTER><FONT SIZE=-2 FACE="Verdana,Arial" color="#ffffff"><B>Sa</B></FONT></CENTER></TD>
</TR>

<TR><TD><INPUT TYPE="button" NAME="but0"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but1"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but2"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but3"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but4"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but5"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but6"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
</TR>

<TR><TD><INPUT TYPE="button" NAME="but7"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but8"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but9"  value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but10" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but11" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but12" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but13" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
</TR>

<TR><TD><INPUT TYPE="button" NAME="but14" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but15" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but16" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but17" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but18" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but19" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but20" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
</TR>

<TR><TD><INPUT TYPE="button" NAME="but21" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but22" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but23" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but24" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but25" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but26" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but27" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
</TR>

<TR><TD><INPUT TYPE="button" NAME="but28" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but29" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but30" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but31" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but32" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but33" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but34" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
</TR>

<TR><TD><INPUT TYPE="button" NAME="but35" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but36" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but37" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but38" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but39" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but40" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
    <TD><INPUT TYPE="button" NAME="but41" value="    " onClick="returnDate(this.value)" style="font-family: Verdana; font-size: 10; font-weight: bolder"></TD>
</TR>

</TABLE>
</FORM>
</BODY>
</HTML>

