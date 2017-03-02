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
    
    $cod = $_POST['codigo_disciplina'];
    $nome = $_POST['nome'];
    $professor = $_POST['professor']; 
    $curso = $_POST['curso']; 
    $hi = $_POST['hora_ini']; 
    $hf = $_POST['hora_fim'];
    $dia = $_POST['dia'];
        
                    
        

            $inserir = mysqli_query($conn, "UPDATE tb_disciplina SET  nome = '$nome' , professor='$professor', curso='$curso', hora_inicio = '$hi', hora_fim ='$hf', dia='$dia' WHERE cod_aluno = '$matricula' AND cod_disciplina = '$cod'");
                
            if($inserir){
                echo 'true';
            }else{
                echo 'false';
            }