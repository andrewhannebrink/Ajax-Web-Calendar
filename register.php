<!DOCTYPE html>
<html>
    <title>  FreeCal -- Register</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Cantora+One' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
<head>

</head>
<body>
<div class="portalContainer">
    <h1> FreeCal </h1>
    
    <h2 class="tagline"> Register for an Account</h2>
        <p class="loginErrorWarning">
            <?php
                if(@ $_GET['loginErrorWarning']=="r0"){
                    echo "Please complete all fields.";
                }
                 if(@ $_GET['loginErrorWarning']=="rX"){
                    echo "Username contains invalid character(s). Please try again.";
                 }
                if(@$_GET['loginErrorWarning']=="r1"){
                    echo "Passwords do not match. Try again.";
                }
                if(@ $_GET['loginErrorWarning']=="r2"){
                    echo "Username already taken. Try a different username.";
                }
            ?>
        </p>   
   
    
    <form id="register" action="registerPortal.php" method="POST">
        <label>
            Desired Username:<br>
            <input type="text" name="username"/>
        </label><br>
        <label>
            Password:<br>
                <input type="password" name="password"/>
        </label><br>
        <label>
            Verify Password:<br>
                <input type="password" name="passwordVerify"/>
        </label><br>
    </form>
        <input form="register" class="portalSubmit" type="submit" name="submit"/>

        
        <p class="alternatePortalLink"> Already a user? <a href="index.php"> Log in.</a></p>    

</div>
</body>

</html>