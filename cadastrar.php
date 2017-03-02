<?php
    include_once 'common/header.php';
    
    include_once 'common/conecta.php';

    $consulta = mysqli_query($conn, "SELECT * FROM tb_usuarios");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = md5($_POST['senha']);

    while($mostra_user = mysqli_fetch_array($consulta)){
        if(strcasecmp($email, $mostra_user['email']) == 0) {
            $_SESSION['serrocadastro'] = 1;
            header('Location: cadastro.php');
            
            
        }elseif(strcasecmp($cp, $mostra_user['cpf']) == 0){
            $_SESSION['serrocadastro'] = 2;
            header('Location: cadastro.php');
           
        }
    }

    $query = "INSERT INTO tb_usuarios (nome, email, cpf, senha) VALUES ('$nome', '$email','$cpf','$senha')";
    
    if (mysqli_query($conn, $query)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}