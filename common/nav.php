<?php
    include_once 'common/conecta.php';

    $socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
    
    if ($socket){
    if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0))){
        stream_set_timeout($socket, 1);
        $unpack0 = unpack("N12", fread($socket, 48));
        $data = date('Y-m-d', $unpack0[7]);
    }
        fclose($socket);
    }   
  
            ?>
<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark elegant-color-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <a class="navbar-brand" href="#"> <strong>Navbar</strong> </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="principal.php">Home <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="trabalhos.php">Trabalhos</a> </li>
                <li class="nav-item"> <a class="nav-link" href="disciplina.php">Disciplina</a> </li>
            </ul>
            <?php
            $trabalhos = 0;
            $query = "SELECT * FROM tb_trabalho";
            $pesquisa = mysqli_query($conn, $query);
            while($mostra_data = mysqli_fetch_array($pesquisa)){
                $data_entrega = $mostra_data['data_entrega'];
                $diff = strtotime($data_entrega) - strtotime($data);
                $dias = $diff/86400;
                if($dias <= 15 && $mostra_data['situacao'] != 'entregue'){
                    $trabalhos +=1;
                }
            }?>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item"><a class="nav-link waves-effect waves-light"><?php echo $trabalhos; ?>&nbsp;&nbsp;<i class="fa fa-envelope"></i></a></li>
               <!-- <li class="nav-item avatar dropdown">
                    <a class="waves-effect waves-light img-responsive" href="#" aria-haspopup="true" id="imgLogin" aria-expanded="false"><img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle z-depth-0 img-responsive"></a>
                </li> -->
                <li class="nav-item dropdown btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $logado; ?>
                    </a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1"><a class="dropdown-item">Perfil</a> <a class="dropdown-item" href="sair.php">Sair</a></div>
                </li>
            </ul>
        </div>
    </div>
</nav>