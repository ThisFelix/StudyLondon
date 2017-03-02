<?php
    SESSION_START();
    if($_SESSION['slogin'] && $_SESSION['smatricula']){
        $logado = $_SESSION['slogin'];
        $matricula = $_SESSION['smatricula'];
    }else{
        unset($_SESSION['slogin']);
        unset($_SESSION['smatricula']);
        SESSION_DESTROY();
        header('Location: index.html');
    }
    include_once 'common/conecta.php';
    
    $cod = $_POST['codigo'];
    $tema = $_POST['tema'];
    $tipo = $_POST['tipo']; 
    $disc = $_POST['disciplina']; 
    $data = $_POST['data_entrega']; 
    $data_e = $_POST['data_entregue'];
    $situacao = $_POST['situacao'];
        
                    
        

            $inserir = mysqli_query($conn, "UPDATE tb_trabalho SET  tema = '$tema' , tipo='$tipo', disciplina='$disc', data_entrega= '$data', data_entregue='$data_e', situacao='$situacao' WHERE cod_aluno = '$matricula' AND cod_trabalho = '$cod'");
                
            if($inserir){
                echo 'true';
            }else{
                echo 'false';
            }