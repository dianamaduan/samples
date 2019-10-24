<?php 
  include "db.php";
  session_start();

  if(isset($_SESSION["moview"])) {
    $id = $_SESSION["moview"];
    $user_id = $_SESSION["user.id"];
    $query = $db->query("SELECT * FROM movies WHERE mov_id=$id");
    if($query->num_rows>0) {
      $user = $query->fetch_object();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Moview</title>
	<meta name="viewport" content="width=device-width,iniatial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/moview.css">
	<script
  src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
	             <form  class="form">
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



<center>
<section class="description">
	<div class="row1">
		<div class="column0">
			 <?php
	 include "db.php";
      $query = $db->query("SELECT * FROM movies WHERE mov_id=$id");
foreach ($query as $print) { ?> 
	<div class="stroke00">
		<a>
			<img src="<?php echo $print['poster'] ; ?>" class="img">
		</a>
		<form onsubmit="addqueue(event)">
		     <button class="add" type="submit">Add to queue</button>
		</form>
		<fieldset class="rating" onclick="saverating(event)">
    <input type="radio" id="star5" name="rating" value="5" class="ra" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" class="ra"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" class="ra" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" class="ra" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" class="ra" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
   
</fieldset>
<div id="rating"></div>
	</div>
<?php } ?>
	  
			
		</div>
		<div class="column00">
			 <?php
	 include "db.php";
      $query = $db->query("SELECT * FROM movies WHERE mov_id=$id");
foreach ($query as $print) { ?> 
	<h1 class="title"><?php echo $print['title']; ?></h1><hr>
	<h1 class="txtdesc"><?php echo $print['content']; ?></h1><hr>
	<h1 class="txtdesc"><?php echo $print['date']; ?></h1><hr>
	<h1 class="txtdesc">Director:  <?php echo $print['director']; ?></h1><hr>
	<h1 class="txtdesc">Starring:  <?php echo $print['actors']; ?></h1><hr>
	<h1 class="txtdesc">Country:  <?php echo $print['country']; ?></h1><hr>
<?php } ?>
 <?php
	 include "db.php";
      $query = $db->query("SELECT * FROM genre g,movgenre mg WHERE g.genre_id=mg.genre_id AND mg.mov_id=$id");
?>
<h1 class="txtdesc">Category:   <?php foreach ($query as $print) {  echo $print['genre']."," ; }?></h1><hr>

		</div>
	</div>

</section>
</center>

<?php
	 include "db.php";
      $query = $db->query("SELECT * FROM movies where mov_id=$id");
foreach ($query as $print) { ?> 
	<div class="moview">
<iframe
src="<?php echo $print['video'] ; ?>">
</iframe></div>
<?php } ?>



<!---COMMENTS--->
	<div class="row bootstrap snippets">
    <div class="col-md-6 col-md-offset-2 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Comment panel
                </div>
                <div class="panel-body">
                	<form onsubmit="addcomment(event)">
                          <textarea class="form-control" id="comment" placeholder="write a comment..." rows="3"></textarea>
                          <br>
                          <button type="submit" class="btn btn-info pull-right">Post</button>
                     </form>
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list" id="media-list">
                       
                      
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<!---FOOTER--->
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
      header("Location: main.php?error=4");
    }
  } else {
    header("Location: main.php?error=5");
  }

?>
</body>


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
<script src="js/movies.js"></script>
<script src="js/search.js"></script>
<script src="js/ninja-slider.js"></script>
</html>



