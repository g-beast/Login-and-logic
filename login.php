<!-- To pass info from a previous page START -->
<?php 
if($_GET['hotel']){
    $uniIdKey = $_GET['hotel'];
}else{ 
    // if the data is not as indicated reroute to the index page to avoid errors
    header("Location: index.html");
}
?>
<!--  To pass info from a previous page END-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1.0, user-scalable=0">
	<title>Lorem ipsum dolor sit amet.</title>
	<link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/d64db55dde.js" crossorigin="anonymous"></script>
    <!-- script To call in the icons -->
</head> 
<body>
	<!-- start of header -->
    <header class="head">
        <a href="#" class="logo">
            <img src="lorem.png" alt="">
        </a>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
        <div class="navbar">
            
            <nav>
                <a href="a url back to the webpage">Home</a>
                <a href="a url back to the webpage#about">About</a>
                <a href="a url back to the webpage#menu">Universities</a>   
            </nav>
        </div> 
    </header>
    <!-- end of header -->
    <div class="container">
        <!-- To display the specific error that has occured START -->
        <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
            if (strpos($fullUrl, "signup=registerFirst") == true) {
                echo "<p class='error'>You do not have an account with us.<br>Register to log in</p?";
                //exit();
            }elseif (strpos($fullUrl, "signup=incorrectCredentials") == true) {
                echo "<p class='error'>Incorrect Email or password.</p?";
                //exit();
            }elseif (strpos($fullUrl, "signup=verifyYourAccount") == true) {
                echo "<p class='error'>This account has not been verified.<br>An Email was sent to your email.</p?";
                //exit();    
            }elseif (strpos($fullUrl, "signup=contLogin") == true) {
                echo "<p class='success'>Proceed to logging in.</p?";
                //exit();    
            }elseif (strpos($fullUrl, "signup=checkmail") == true) {
                echo "<p class='success'>Check your email to change your password.</p?";
                //exit();    
            }
        ?>
        <!-- To display the specific error that has occured END -->
        <h1>Login</h1>
       	<form  method = "post" action="a url to the login Controller file" enctype="multipart/form-data" id="register" class="input-group-register"> 
    
           	<input type="email" name="email" class="input-field" placeholder='email@gmail.com' required>
                                
           	<input type="password" name="password" class="input-field" placeholder='password' required>
        
           	<input type="checkbox"  name = "hostel" class="checkBox" value = "<?php echo $uniIdKey; ?>" required>

           	<a href="a url back to the terms and conditions" id="termsandconditions">I have read and agreed to these Terms and Conditions.</a>
        
           	<button type="submit" name="loginBtn" class="submit-btn">Login</button>
           	
           	<a href="a url back to Change password file" class="forgotten"><h3>forgotten password?</h3></a>
           	
           	
            <button class="registerBtn"><a href="a url back to the register webpage" class="back">Register</a></button>

   		</form>
   </div>
   <!-- script to control the navigation bar -->
<script type="text/javascript">
    let navbar = document.querySelector('.navbar');

    document.querySelector('#menu-btn').onclick = () =>{
        navbar.classList.toggle('active')
    }
</script>
</body>
</html>