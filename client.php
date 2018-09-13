<?php 
   
    session_start();
    $sessID = session_id(); 
    setcookie("session_id",$sessID,time()+3600,"/","localhost",false,true); 

?>


<!DOCTYPE html>
<html>

<head>
		<script type="text/javascript" src="load.js"> </script>
</head>
	
<body>
	<h3> Synchronizer Token Pattern </h3>
	<p><i> Login Page </i></p>
	<hr>
	<br>
	<form class="form-horizontal" method="POST" action="server.php" >
	<table>
		<tr>
			<td>
				<label><b>Username</b></label>
			</td>
			<td>
				<input type="text" placeholder="Enter Username" name="uname" required>
			</td>
		</tr>
		<tr>
			<td>
				<label><b>Password</b></label>
			</td>
			<td>
				<input type="password" placeholder="Enter Password" name="pwd" required>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input type="checkbox" checked="checked"> Remember Me
			</td>
		</tr>
		<tr>
			<td>
				<input type="hidden" id="Token" name="CSR_tok"/>  
				<button type="button" class="cancelbtn">Cancel</button>  
			</td>
			<td>
				<button type="submit" name="bttLogin">Login</button>				 
			</td>
		</tr>
	</table>	
    </form>
    
<?php  
		if(isset($_COOKIE['session_id']))
            { 
            	echo '<script> var token = loadDoc("POST","server.php","Token");  </script>';      
			}
?>

<br>
<hr>
<br>
    <div style="text-align: center;">
      Copyright &copy; Tharaka @ 2018 | SLIIT
    </div>
</body>
</html>
