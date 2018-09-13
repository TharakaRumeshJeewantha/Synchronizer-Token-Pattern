<?php

session_start();

if(empty($_SESSION['key']))
{
    $_SESSION['key']=bin2hex(random_bytes(32));
    
}

$token = hash_hmac('sha256',"This is token:client.php",$_SESSION['key']);
$_SESSION['CSRF_tok'] = $token; 
ob_start(); 
echo $token;


if(isset($_POST['bttLogin']))
{
    ob_end_clean();
    loginvalidate($_POST['CSR_tok'],$_COOKIE['session_id'],$_POST['uname'],$_POST['pwd']);

}



function loginvalidate($CSRF,$usessionID, $uname, $pword)
{
    if($uname=="admin" && $pword=="admin123" && $CSRF==$_SESSION['CSRF_tok'] && $usessionID==session_id())
    {
        echo "<script> alert('Login Successfully') </script>";
        echo "Tokens matches & Credentials valid Successfully!"."<br/>"; 
       
    }
    else
    {
        echo "<script> alert('Invalid Credentials. Try again!') </script>";
        echo "Tokens not match & Credentials Invalid! ";
        
    }
}


?>