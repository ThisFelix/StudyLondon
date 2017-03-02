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
    include_once 'conecta.php';
    include_once 'header.php';
    include_once 'nav.php';
    ?>
    <div class="container">
        <div class="col-md-12 mt-2">
            <?php
   
    $trabalhos = mysqli_query($conn, "SELECT * FROM tb_trabalho WHERE cod_aluno = '$matricula'");
    $linha = mysqli_num_rows($trabalhos);
    if($linha > 0){
    ?>
                <table class="table table-striped table-hover" cellspacing="0" cellpadding="0">
                    <thead class="mdb-color darken-4 white-text">
                        <tr>
                            <th colspan="4">
                                <center>Trabalhos</center>
                            </th>
                        </tr>
                    </thead>
                </table>
                <?php 
                        $disciplina = mysqli_query($conn, "SELECT DISTINCT disciplina FROM tb_trabalho");
                        while($mostra_disc = mysqli_fetch_array($disciplina)){
                    ?>
                    <table class="table table-striped table-hover" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="stylish-color-dark white-text" colspan="5"> Disciplina:
                                    <?php echo $disc = $mostra_disc['disciplina']; ?>
                                </th>
                            </tr>
                            <tr>
                                <th>Tema</th>
                                <th>Tipo</th>
                                <th>Data Entrega</th>
                                <th>Data Entregue</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pesquisa_trab = mysqli_query($conn, "SELECT * FROM tb_trabalho WHERE disciplina = '$disc'");
                            
                            while($mostra_trab = mysqli_fetch_array($pesquisa_trab)){
                            $entrega = $mostra_trab['data_entrega'];
                            $data = $mostra_trab['data_entregue'];
                            if($data > $entrega){
                                $atualiza_situacao = mysqli_query($conn, "UPDATE tb_trabalho SET situacao = 'Atrasado' WHERE data_entrega <  '$data'");
                            }
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $mostra_trab['tema']; ?>
                                    </td>
                                    <td>
                                        <?php echo $mostra_trab['tipo']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/y', strtotime($mostra_trab['data_entrega']));?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/y', strtotime($mostra_trab['data_entregue']));?>
                                    </td>
                                    <td>
                                        <?php echo $mostra_trab['situacao']; ?>
                                    </td>
                                </tr>
                                <?php }} ?>
                        </tbody>
                    </table>
                    <?php
    }else{
        echo "Não Existem Trabalhos Disponiveis";
    }
    ?>
        </div>
    </div>
    <?php
        include_once 'footer.php';
    ?>