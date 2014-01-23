<?php
    require '../../../notouch/databaseAccess.php';
    
    $username =$_POST['username']; 
    $password =$_POST['password'];
    $passwordVerify =$_POST['passwordVerify'];
    
    if ( (empty($_POST['username'])) || (empty($_POST['password'])) || (empty($_POST['passwordVerify'])) ){
        //No fields can be blank
        header("Location: register.php?loginErrorWarning=r0");
            exit;
    }
    
    if( !preg_match('/^[\w_\-]+$/', $username) ){
        //Invalid username, cannot contain illegal characters
        header("Location: register.php?loginErrorWarning=rX");
        exit;
    }
        
    if (!0==strcmp($password, $passwordVerify)){
        //Password not entered identically twice. Try again.
            header("Location: register.php?loginErrorWarning=r1");
            exit; 
    }
    else {
        //Password entered identically twice.
        //Proceed to check if user exists in database.
        $stmt = $mysqli->prepare("select username, passwordHash from users where username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        
        //Bind the results
        $stmt->bind_result($usrnm, $psswdHash);
        $stmt->fetch();
        
        if (!$usrnm==NULL){
            //Username already exists. Try a different username;
            $_GET['loginErrorWarning'] = "Username is already taken. Try another username.";
                header("Location: register.php?loginErrorWarning=r2");
                exit;
        }
        else{
            //Username available && passwords match
            //Create new entry in database with username and password hash
            $stmt = $mysqli->prepare("insert into users (username, passwordHash) values (?, ?)");
            $passwordCrypt = crypt($password);
            $stmt->bind_param('ss', $username, $passwordCrypt);
            $stmt->execute();
            $stmt->close();
            
            //New user created, send back to log in screen.
            $_GET['loginErrorWarning']="3";
            header("Location: index.php?loginErrorWarning=l3");
        }
    } 

?>