<?php

   session_start();
   require_once("login/assets/koneksi.php");
  $username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
    if (strpos($username, "'") !== false || strpos($username, "\"") !== false ||
    strpos($username, "#") !== false || strpos($username, ";") !== false ||
    strpos($username, "--") !== false) {
    // tolak
	echo 'di tolak kamu mau mencoba nge hack ya';
} 
 else{ 


	 $query = $mysqli->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
   print_r($query);
	if(mysqli_num_rows($query) == 0){
		echo '<div class="alert alert-danger">Maaf Login gagal.</div>';
	}else{
		$row = mysqli_fetch_assoc($query);

		if($row){
			$_SESSION['admin']=$username;
			header("Location: login/index.php?page=home");
		}
	} 
}
?>