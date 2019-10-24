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
	<title>Profile</title>
	<meta name="viewport" content="width=device-width,iniatial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/profile.css">
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
  	                            	 <li><a  href="	main.php">HOME</a></li>
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
	              <div id="result" class="latest"></div>
              </div>

             <span style=" cursor:pointer" onclick="search('show')"><img src="img/search.png" width="36px" height="36px"></span>
             </div>
         </div>
	 </div>
  </div>
</header>

<center>
	<div class="record">
		<div class="field">
			 <?php
              $query = $db->query("SELECT avatar FROM users where user_id=$id");
             // if($query->num_rows>0){
                 while($row = $query->fetch_object()){ 
                 	if($row->avatar!=null){
                 ?>
             <button style="border:none; padding: 3px" id="ava1" onclick="openimg()">
               <img src="<?php echo $row->avatar ; ?> " class="ava2">
             </button>
             <?php }
             else {
              ?> 
             <button style="border:none;" onclick="openimg()">
             <img src="img/user.ico" width="130px" height="130px">
             </button>
             <?php }} ?>
	 	</div>
		<div class="field2">
		     <?php
			 $query = $db->query("SELECT * FROM users where user_id=$id");
             foreach ($query as $print) {
             echo 
             "<br><br><h3 id='id'>" . $print['lname'] .' ' . $print['fname'] .  "</h3>" ;
             } ?>
		</div>
	</div>
</center>

<center>
	<main>
		  <input id="tab1" type="radio" name="tabs" checked>
          <label for="tab1">MY QUEUE</label>
          <input id="tab2" type="radio" name="tabs">
          <label for="tab2">PROFILE SETTING</label>
              <section id="content1">
                 <p class="queue">QUEUE</p>
                     <div class="latest">	 <?php
	                      include "db.php";
                         $query = $db->query("SELECT * from movies m , basket b where m.mov_id=b.movie_id and b.user_id=$id");
                         foreach ($query as $print) { ?> 
                            	<div class="stroke">
                                	<a><img src="<?php echo $print['poster'] ; ?>" class="img">
                            		<div class="movcontent">
	                                	<a  href='actions/moviewopen.php?mov_id="<?php echo $print['mov_id'] ; ?>"'><img src="img/play1.png" width="190px" height="130px" class="hoverimg"></a>
                                	</div></a>
                                     <h1 style="font-size: 20px; color:white;font-weight: 700;margin-top: 10px;"><?php echo $print['title']; ?></h1>
                                     <h1 style="font-size: 15px; color:gray;font-weight: 500; "><?php echo $print['date'] ; ?></h1>
                                 </div>
                                 <?php } ?>
	                   </div>
               </section>

             <section id="content2">
                  <form action="auth/chpasswd.php" method="post">
                     <div class="container_ch">
                         <h4 class="h4p">CHANGE PASSWORD</h4>
                         <input type="password" placeholder="Enter old password" name="oldp" required>
                         <input type="password" placeholder="Enter new password" name="newp" required>
                         <input type="password" placeholder="Confirm new password" name="conp" required>
                         <button  class="chpass" type="submit">Change Password</button></div>
                  </form>

                  <form action="auth/chlogin.php" method="post">
                        <div class="container_ch">
                             <h4 class="h4p">CHANGE EMAIL</h4>
                             <input type="email" placeholder="Enter new email" name="newl" required>
                             <input type="email" placeholder="Confirm new email" name="conl" required>
                             <button  class="chpass" type="submit">Change Login</button></div>
                  </form>
                  <h4 class="h4p">DEACTIVATE MY ACCOUNT</h4>
                 <p style="margin-left: 20px" class="deactivate">Deactivating your account will immediately remove your profile from server.To deactivate your account,<a href="auth/deluser.php" >click here</a></p>
             </section>
	</main>
</center>

<form class="hidden" onsubmit="saveava(event)">
  <input type="file" id="img">
  <button type="submit" id="submit">submit</button>
</form>

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
	<div class="column1">
		<a href="#">
			<button class="btn"><img src="img/app.png"></button>
		</a>
	</div>
	<div class="column1">
		<a href="#">
			<button class="btn"><img src="img/play.png"></button>
		</a>
	</div>
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
	 $(document).ready(function(){ 
           $(".hidden").hide(); 
         }); 
	function openimg() {
 $("#img").click();
 setTimeout(function sub(){
 $("#submit").click();
},10000);
}
</script>

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
<script type="text/javascript" src="js/register.js"></script>