<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width,iniatial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script> 
</head>
<body style="background-color: skyblue">
	<a href="index" style="font-size: 20px; display: block;">index</a>
<h1>Block Users</h1>
<?php 
include "db.php";
$query=$db->query("SELECT * FROM users");
foreach ($query as $print) {
	echo 
"
<p>".$print['user_id'] ." ". $print['fname'] . " " . $print['lname'] ."  " . "  Login: " . $print['login'] . "</p>
<a href='actions/block.php?user_id=" . $print['user_id'] . "'>Delete</a><br>"
;
}
?>
<h1>Add new movie</h1>

<form onsubmit="savemoview(event)">
	<center>
	<div class="row">
	     <div class="column">
	         <h4>Title</h4>
	         <input type="textarea" id="title">
	         <h4>Description</h4>
	         <input type="textarea" id="content" >
	         <h4>Date</h4>
	         <input type="date" id="datepicker" class="ui-datepicker-calendar">
	         <h4>Category</h4>
	         <div id="genre"></div>
         </div>
	     <div class="column">
	         <h4>Director</h4>
	         <input type="textarea" id="director" >
		     <h4>Starring</h4>
	         <input type="textarea" id="actors" >
	         <h4>Country</h4>
	         <input type="textarea" id="country" >
	         <h4>Poster</h4>
	         <input type="file" id="image" style="margin-bottom: 25px; ">
	         <h4>Video</h4>
	         <input type="textarea" id="video" >
	         <button type="submit" class="create">Save</button></div></div>
	</center>
</form>

<h1>Movies</h1>

<div id="list"></div>

</body>
</html>

<style type="text/css">
	h1{
		color:Maroon;
		text-align: center;
	}
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 5px;
  margin-left: 10px;

}

.column {
  flex: 40%;
  max-width: 60%;
  padding: 10px;
  margin:20px;
  border-radius: 10px;
 background-color: white;
 align-items: center;
}
</style>

<script type="text/javascript" src="js/movies.js"></script>