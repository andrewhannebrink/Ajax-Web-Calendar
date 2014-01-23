<!DOCTYPE html>
<html>
<head>
    <title>  FreeCal -- Log In</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Cantora+One' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
</head>
<body>
 
<div class="portalContainer">    
        <h1> FreeCal </h1>
        
        <h2 class="tagline"> Log in </h2>
        
        
            <p class="loginErrorWarning">
                    <?php
                        if(@ $_GET['loginErrorWarning']=="l0"){
                            echo @"Please enter both your username and password.";
                        }
                        if(@ $_GET['loginErrorWarning']=="l3"){
                            echo "New user account created. Log in using the information you just provided.";
                        }
                        if(@ $_GET['loginErrorWarning']=="q"){
                            echo "You have been logged out.";
                        }
                        if(@ $_GET['loginErrorWarning']=="lX"){
                            echo "Username is an invalid format. Please try again.";
                        }
                        if(@ $_GET['loginErrorWarning']=="uX"){
                            echo "Username not found. Remember, it's case sensitive.";
                        }
                        if(@ $_GET['loginErrorWarning']=="l4"){
                            echo "Username and password do no match. Please try again.";
                        }
                        if(@ $_GET['loginErrorWarning']=="dx"){
                            echo "Your account, your stories, and your comments have all been deleted.";
                        }
                    ?>
            </p>
            <form id="login" action="loginPortal.php" method="POST">
                <label>
                     Username:<br>
                     <input class="formBox" type="text" name="username"/>
                </label><br>
        
                <label>
                    Password:<br>
                        <input class="formBox" type="password" name="password"/>
                </label>
                <br>
            </form>
            <input form="login" class="portalSubmit" type="submit" name="submit"/>
                              
        <p class="alternatePortalLink"> Not a user yet? <a href="register.php"> Register for an account.</a></p>    

</div>
</body>

</html>