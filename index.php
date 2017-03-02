<?php session_start() ?>
    <?php 
    include_once 'common/header.php';
    include_once 'common/navlogin.php';
?>
        <?php
            $erro1 = ""; 
			$erro2 = ""; 
			$erro3 = "<br><br>";
			if(isset($_SESSION['serrologin'])){
				if($_SESSION['serrologin'] == 4){
					$erro3 = "<div class='alert alert-danger'>
                            <strong> Erro!</strong> Usuario ou senha incorretos! Tente Novamente
                            </div>";
					unset($_SESSION['serrologin']);
				}
			}
        ?>
            <!--Mask-->
            <div class="view hm-black-strong">
                <div class="full-bg-img flex-center">
                    <div class="container">
                        <form action="login.php" id="loginForm" method="post">
                            <!--Form without header-->
                            <div class="card">
                                <div class="card-block">
                                    <!--Header-->
                                    <div class="text-center">
                                        <h3><i class="fa fa-lock"></i> Login:</h3>
                                        <hr class="mt-2 mb-2"> </div>
                                    <!--Body-->
                                    <div class="md-form"> <i class="fa fa-envelope prefix"></i>
                                        <input type="text" id="form2" class="form-control required" pattern="[0-9]+" maxlength="7" name="cxmatricula" required>
                                        <label for="form2">Matricula</label>
                                    </div>
                                    <div class="md-form"> <i class="fa fa-lock prefix"></i>
                                        <input type="password" id="form4" class="form-control" name="cxsenha" required>
                                        <label for="form4">Senha</label>
                                    </div>
                                        <?php echo $erro3; ?>
                                        <div class="text-center">
                                            <button class="btn btn-deep-purple">Login</button>
                                        </div>
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <div class="options">
                                        <p>Não é membro? <a href="cadastro.php">Cadastre-se!</a></p>
                                        <p>Recuperar <a href="#">Senha</a></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Form without header-->
                        </form>
                    </div>
                </div>
            </div>
            <!--/.Mask-->
            <!--/.Navigation & Intro-->
            <?php 
    include_once 'common/footer.php' 
?>