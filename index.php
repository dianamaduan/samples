<!DOCTYPE html>
<html>
<head>
	<title>MadMovieS</title>
	<meta name="viewport" content="width=device-width,iniatial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script> 
</head>
<body>
  <center>
<main>
  <div class="roww">
     <div class="section1">
       <img src="img/ccc.jpg">
     </div>
     <div class="section2">
         <div class="signup">
          <input id="tab1" type="radio" name="tabs" checked>
              <label for="tab1">Sign up</label>
              <input id="tab2" type="radio" name="tabs">
              <label for="tab2">Login</label>
     <section id="content1">
      <div class="signup">
                <form onsubmit="saveuser(event)">
                <input type="text" id="fname" class="login-input" placeholder="First name" required>
                <input type="text" id="lname" class="login-input" placeholder="Last name" required>
                <input type="email" id="login" class="login-input" placeholder="Email Address" required>
                <input type="password" id="password" class="login-input" placeholder="Password" required>
                <button class="signup-submit" type="submit" >SIGN UP</button>
                </form>
           </div>
  
   </section>
 
   <section id="content2">
        <div class="signup">
           <form action="auth/login.php" method="post" >
              <input type="email" id="log" name="login" class="login-input" placeholder="Email Address" required>
              <input type="password" id="pass" name="password" class="login-input" placeholder="Password" required>
              <button class="signup-submit" type="submit" >LOGIN</button>
           </form>
       </div>
   </section>
 </div></div>
</div>
</main>
</center>
<script src="js/register.js"></script>
</body>
</html>