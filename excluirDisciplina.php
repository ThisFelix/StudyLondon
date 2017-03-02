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
    include_once 'common/header.php';
    include_once 'common/nav.php';
    
    $cod = $_GET['codigo_disciplina'];
    $disciplina = $_GET['nome'];

    $excluir = "DELETE FROM tb_disciplina WHERE nome = '$disciplina' AND codigo_disciplina = '$cod' AND cod_aluno = '$matricula'";
            $excluir = mysqli_query($conn, $excluir);
                
            if($excluir){
                echo 'Dados Excluidos Com Sucesso';
            }else{
                echo 'Erro ao Excluir';
            }
    
    include_once 'common/footer.php';
    ?>

        