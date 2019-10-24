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
<script src="js/ninja-slider.js"></script>
</head>
<body style="background: rgb(38,38,45);">
<header class="header" style="background-color:#1a1a1a;">
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
  	                            	 <li><a  href="profile.php">PROFILE</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=2'>DRAMA</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=1'>COMEDY</a></li>
		                             <li><a href='actions/categoryopen.php?genre_id=6'>THRILLER</a></li>
	                            	 <li><a href='actions/categoryopen.php?genre_id=3'>HORROR</a></li>
	                            	 <li><a href='actions/categoryopen.php?genre_id=5'>DOCUMENTARY</a></li>
	                        	</ul>
	                     </div>
		                 <div class="column">
		                    	<ul>
		                            
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
	              <div id="result" class="latest">
	              	
	              </div>
              </div>

             <span style=" cursor:pointer" onclick="search('show')"><img src="img/search.png" width="36px" height="36px"></span>
             </div>
         </div>
	 </div>
  </div>
</header>
<!--slider---> <!--start-->
    <div id="ninja-slider" style="height: 50%;">
        <div class="slider-inner">
            <ul>
                <li>
                    <a class="ns-img" href="img/tad.png"></a>
                    <div class="caption">Tad: The Lost Explorer</div>
                </li>
                <li>
                    <a class="ns-img" href="img/sum.jpg"></a>
                    <div class="caption">Twilight</div>
                </li>
                <li>
                    <a class="ns-img" href="img/the.jpg"></a>
                    <div class="caption">The Fate of the Furious</div>
                </li>
              
            </ul>
            <div class="navsWrapper">
                <div id="ninja-slider-prev"></div>
                <div id="ninja-slider-next"></div>
            </div>
        </div>
    </div>
    <!--end-->

<section class="films">

<hr>
<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">COMEDY</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='comedy' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">

	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>

<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>
	  
</div><hr>

<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">THRILLER</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='thriller' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">
	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>
<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>
	  </div><hr>
	  
<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">HORROR</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='horror' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">
	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>
<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>
	  
</div><hr>
<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">ROMANCE</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='romance' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">
	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>
<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>
	  
</div><hr>
<center>
	<button onclick="load(event)" class="loadbtn">LOAD MORE</button>
</center>


<main class="hide1"> 
<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">DOCUMENTARY</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='documentary' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">
	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>
<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>	 
</div><hr>


<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">FANTACY</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='fantacy' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">
	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>
<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>
	  
	  
</div><hr>
<p style="color:white;font-size: 22px;font-family: sans-serif; margin-left: 50px;margin-bottom: 15px;">ANIMATION</p>
<div class="latest">	 <?php
	 include "db.php";
      $query = $db->query("SELECT m.poster,g.genre,m.title,m.date,m.mov_id FROM movies m,movgenre mg,genre g where m.mov_id=mg.mov_id and mg.genre_id=g.genre_id and g.genre='animation' order by m.date limit 5");
foreach ($query as $print) { ?> 
	<div class="stroke">
	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
		<div class="movcontent">
		<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
	</div></a>
<h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['genre']; ?></h1>
<h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
</div>
<?php } ?>	  
</div>
</main>
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
      header("Location: index.php?error=4");
    }
  } else {
    header("Location: index.php?error=5");
  }

?>
</body>



</html>

<script>
 $(document).ready(function(){ 
           $(".hide1").hide(); 
         }); 

function load(e){
e.preventDefault();
$('.hide1').show();
$('.loadbtn').hide();
}

</script>
<script src="js/search.js"></script>
<script src="js/movies.js"></script>
<script type="text/javascript">
	function showmenu(action){
if (action=='show'){
document.getElementById('nav').className='header_nav active';
}
else {
document.getElementById('nav').className='header_nav';
}

}
</script>

