<?php 
session_start();
if(!$_SESSION['usr_logged'] == true){
    header('Location: ../index.php');
    exit();
}

?>
<!--
    
if( $_SERVER['REQUEST_METHOD']=='POST' )
	{
		$request = md5( implode( $_POST ) );
		
		if( isset( $_SESSION['last_request'] ) && $_SESSION['last_request']== $request )
		{
			echo 'refresh';
		}
		else
		{
			$_SESSION['last_request']  = $request;
			echo 'post';
		}
	}

..>