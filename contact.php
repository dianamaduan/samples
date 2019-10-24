<?php 
  include "db.php";
  session_start();

  if(isset($_SESSION["user.id"])) {
    $id = $_SESSION["user.id"];
    $query = $db->query("SELECT * FROM users WHERE user_id=$id");
    if($query->num_rows>0) {
      $user = $query->fetch_object();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
	<meta name="viewport" content="width=device-width,iniatial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="all.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script> 
</head>
<body style="background: rgb(38,38,45);">
<header class="header" style="background-image: linear-gradient(black, rgb(38,38,45));">
	<div class="container">
	     <div class="header_inner">
	         <div class="header_menu">
		          <div id="nav" class="header_nav">
                     <a href="javascript:void(0)" class="header_nav_close" onclick="showmenu()">&times;</a>
                     <p class="menutxt">Menu</p>
                     <?php
                  	 include "db.php";
                     $query = $db->query("SELECT * FROM genre");
                     foreach ($query as $print) { ?> 
                      <div class="row">
                    	 <div class="column">
                              <ul>  
                              	     <li><a  href="main.php">HOME</a></li>
  	                            	 <li><a  href="profile.php">PROFILE</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=2'>DRAMA</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=1'>COMEDY</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=6'>THRILLER</a></li>
	                            	 <li><a href='actions/categoryopen.php?genre_id=3'>HORROR</a></li>
	                        	</ul>
	                     </div>
		                 <div class="column">
		                    	<ul>
		                             <li><a href='actions/categoryopen.php?genre_id=5'>DOCUMENTARY</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=8'>FANTASY</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=7'>ANIMATION</a></li>
	                                 <li><a href='actions/categoryopen.php?genre_id=4'>ROMANCE</a></li>
		                             <li><a  href="contact.php">CONTACT US</a></li>
		                             <li><a href="auth/logout.php">LOG OUT</a></li></div>
		                        </ul>
                         </div>
                 <div class="header_icons" style="margin-bottom: 100px;">
                     <div>
	                      <a href="https://facebook.com"><img src="img/face.png"></a>
                          <a href="https://instagram.com"><img src="img/insta.png"></a>
	                      <a href="https://twitter.com"><img src="img/twit2.png"></a>
	                      <a href="https://youtube.com"><img src="img/you.png"></a>
	                      <a href="https://pinteres.com"><img src="img/pint.png"></a>
	                      <a href="https://youtube.com"><img src="img/twit.png"></a>
	                 </div>
	             </div><?php } ?>

               </div>

             <div id="menu">
                  <span style="cursor:pointer" onclick="showmenu('show')"><img src="img/menu.png" width="40px" height="40px"></span>
             </div>
        	</div>

         <div class="header_logo">
	         <p class="txtlogo">MadMovies</p>
         </div>

         <div class="header_search">
	         <div class="search" id="ss">
                 <a href="javascript:search('sds')" class="search_close">&times;</a>
	             <p class="text2">Search</p>
	             <form method="post" action="actions/search.php" class="form">
		              <input type="text" id="search" class="sinput" placeholder="search" onkeyup="findblogs()">
	             </form>
	              <div id="result" class="latest"></div>
              </div>

             <span style=" cursor:pointer" onclick="search('show')"><img src="img/search.png" width="36px" height="36px"></span>
             </div>
         </div>
	 </div>
  </div>
</header>

<section class="main2">
	<div class="row11">
         <div class="column11">
	       <center>  <img src="img/add.png" class="icons_con"> </center>
	         <p class="textt">Our Address</p>
	         <p class="text22">Almaty,Kazakhstan</p>
         </div>
         <div class="column11">
	        <center>  <img src="img/mail2.png" class="icons_con"></center>
	    	  <p class="textt">Send us an Email</p>
	  	      <p class="text22">admin@madmoview.com</p>
	  	      <p class="text22">madmoview@gmail.com</p>
             </div>
         <div class="column11">
	       <center>  <img src="img/call2.png"  class="icons_con"></center>
	    	 <p class="textt">Give us a Ring</p>
	  	     <p class="text22">+774777111111</p>
	  	     <p class="text22">+747111111222</p>
         </div>
     </div>
</section>


<footer>
	<div class="footer">
		<div class="part1">
		<div> <p class="text3">MadMovie</p></div>
		 <div class="icons">
	<a href="https://facebook.com"><img src="img/face.png"></a>
<a href="https://instagram.com"><img src="img/insta.png"></a>
		<a href="https://twitter.com"><img src="img/twit2.png"></a>
	<a href="https://youtube.com"><img src="img/you.png"></a>
	<a href="https://pinteres.com"><img src="img/pint.png"></a>
	<a href="https://youtube.com"><img src="img/twit.png"></a>
		</div>
	</div>

<div class="row">
	<div class="column1">
		<a class="txt"><p>COMPANY</p></a>
		<a class="txt1"><p>Careers</p></a>
		<a class="txt1"><p>News</p></a>
		<a class="txt1"><p>Press inquires</p></a>
	</div>
	<div class="column1">
		<a class="txt"><p>SUPPORT</p></a>
		<a class="txt1"><p>Contact support</p></a>
		<a class="txt1"><p>Help center</p></a>
		<a class="txt1"><p>Supported devices</p></a>
	</div>
	<div class="column1">
		<a class="txt"><p>GET THE APPS</p></a>
		<a class="txt1"><p>IOS</p></a>
		<a class="txt1"><p>Android</p></a>
		<a class="txt1"><p>Roku</p></a>
	</div>
<div class="column1"><a class="txt"><p>TERM OF USE</p></a>
		<a class="txt1"><p>Terms of use</p></a>
		<a class="txt1"><p>Privacy Policy</p></a></div>
	
</div>
<p class="copyright">This website and its content are copyrights of DM— © DM 2019. All rights reserved.</p>
<hr>
<div class="row">
	
	<div class="column1"><a href="#"><button class="btn"><img src="img/app.png"></button></a></div>
	<div class="column1"><a href="#"><button class="btn"><img src="img/play.png"></button></a></div>
	
         </div>
      </div>

</footer>

<?php
    } else {
      header("Location: main.php?error=1");
    }
  } else {
    header("Location: main.php?error=2");
  }

?>

</html>

<script type="text/javascript">
	function showmenu(action){
if (action=='show'){
document.getElementById('nav').className='header_nav active';
 $('.slider-inner').hide();
}
else {
document.getElementById('nav').className='header_nav';
$('.slider-inner').show();
}
}

</script>
<script src="js/search.js"></script>
<script src="js/ninja-slider.js"></script>
<script src="js/movies.js"></script>