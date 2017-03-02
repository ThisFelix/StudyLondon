<?php
	SESSION_START();
    $login = $_POST['cxmatricula'];
	$senha = md5($_POST['cxsenha']);
	
    include_once 'common/conecta.php';

	   $verifica = mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE matricula = '$login' AND senha = '$senha'") or die("erro ao selecionar");
        $exibir = mysqli_fetch_array($verifica);
        if($exibir){
            
            $_SESSION['slogin'] = $exibir['Nome'];
            $_SESSION['smatricula'] = $exibir['Matricula'];
            header('Location:principal.php');
        }else{
           /* echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";*/
            $_SESSION['serrologin'] = 4;
            header('Location: index.php');
            die();
        }
    ?>
    
       
		
	
	