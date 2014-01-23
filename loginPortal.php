<?php

    require '../../../notouch/databaseAccess.php';
    
    $username =$_POST['username'];
    $password =$_POST['password'];

    if ( (empty($_POST['username'])) || (empty($_POST['password'])) ){
        //No fields can be blank
        header("Location: index.php?loginErrorWarning=l0");
            exit;
    }    
    
    if( !preg_match('/^[\w_\-]+$/', $username) ){
        //Invalid username
        header("Location: index.php?loginErrorWarning=lX");
        exit;
    }
    
    //fetch username and passwordHash
    $stmt = $mysqli->prepare("select username, passwordHash from users where username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($usrnm, $psswdHash);
        $stmt->fetch();
        //echo $psswdHash;
        
        if (0==(strcmp($username, $usrnm))){        
            $passwordCrypt = crypt($password, $psswdHash);
            //check password and username for a match
            if ($psswdHash==$passwordCrypt) {
                //Successful log in
                echo "Log in success";
                session_start();
                $_SESSION['user']=$usrnm;
                header("Location: home.php");
                exit;
            }
            else{
                //Password not a match
                header("Location: index.php?loginErrorWarning=l4");
                exit;
            }
        }
        else{
            //Username is not a match.
            header("Location: index.php?loginErrorWarning=uX");
            exit;
        }


?>