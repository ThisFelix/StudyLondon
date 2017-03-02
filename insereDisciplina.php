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
            
            $nome = $_POST['nome'];
            $professor = $_POST['professor'];
            $curso = $_POST['curso'];
            $hora_inicio = $_POST['horaIni'];
            $hora_fim = $_POST['horaFim'];
            $dia = $_POST['dia'];
            
            $inserir = mysqli_query($conn, "INSERT INTO tb_disciplina (nome,professor,curso,hora_inicio,hora_fim,dia,cod_aluno) VALUES ('$nome','$professor','$curso','$hora_inicio', '$hora_fim','$dia','$matricula')");
    
            if($inserir){
                echo '<h3> Dados Inseridos Com Sucesso </h3';
            }else{
                echo '<h3> Erro ao inserir </h3';
            }
            include_once 'common/header.php';
            include_once 'common/nav.php';
            include_once 'common/footer.php';