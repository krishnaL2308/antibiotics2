<!DOCTYPE html>
<html>
<head>
<title> Antibiotics </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="js/jquery.mobile-1.4.5.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery.mobile-1.4.5.js"></script>
  <style>
.center {
    margin: 0 auto !important;
    width: 30%;
}
.para{

}
  </style>
</head>
<body>
<div data-role="page" id="pageone" data-theme="a">
<a href="#myPanel" data-role="button" data-iconpos="notext" data-icon="bars">Menu</a>
	<div data-role="panel" id="myPanel">
		<h2>Menu</h2>
	   <a href="../assignment_mobile/home.html" data-ajax="false" data-role="button">Home</a>
	  <a href="../assignment_mobile/doctor.html" data-ajax="false" data-role="button">Connect with Doctor</a>
	  <a href="../assignment_mobile/disease.html" data-ajax="false" data-role="button">View Disease</a>
	  <a href="../assignment_mobile/feedback.html" data-ajax="false" data-role="button">Online feedback</a>
	  <a href="../assignment_mobile/search.html" data-ajax="false" data-role="button">Search(antibiotics)</a>  
	<a href="../assignment_mobile/treatement.html" data-ajax="false" data-role="button">Treatment guidelines</a>
	<a href="../assignment_mobile/set_reminder.html" data-ajax="false" data-role="button">Set New Reminder</a>
	<a href="../assignment_mobile/input.html" data-ajax="false" data-role="button">My Med List</a>
	<a href="../assignment_mobile/geolocation.html" data-ajax="false" data-role="button">Laboratory</a>
	<a href="../assignment_mobile/call.html" data-ajax="false" data-role="button">Emergency Call</a>

 	 </div>
     	
	
     <div role="main" class="ui-content">
        <h1>Search Your Symptoms</h1>
        <p> Get all Information on Health Topics</p><br>
        <label>Term: </label>
<input type="text" id="txt" placeholder="Eg:Type Cancer">

      <button onClick="SubmitVal()" id="scol">Search</button><br><br>
    <div id="jsonresult"></div>
</div>
</div>

<script>

function SubmitVal() {

       var txt=document.getElementById("txt").value;
       var pageUrl="https://api.nhs.uk/conditions/"+txt;
            
            var subscriptionkey = "275915a8a56a44b2b2d62602453b0b30";
          $.ajax({
              type: 'GET',
              url: pageUrl,
              headers: {
               'subscription-key':subscriptionkey,
               'Content-Type':'application/json'
           },
              dataType: 'json',
              success: function (data) {


                $(data).each(function (index, row) {

                           $("#jsonresult").html("<h2>Search For: "+row.name+"</h2><br>"+row.mainEntityOfPage[0].mainEntityOfPage[0].text+"<br>"+row.mainEntityOfPage[1].text+"<br>"+row.mainEntityOfPage[1].mainEntityOfPage[0].text+"<br>"+row.mainEntityOfPage[2].text+"<br>"+row.mainEntityOfPage[2].mainEntityOfPage[0].text+
                           "<br>"+row.mainEntityOfPage[3].text+"<br>"+row.mainEntityOfPage[3].mainEntityOfPage[0].text);
                       });

     alert(JSON.stringify(data));


              }
          });



 }
 </script>

