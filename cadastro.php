<?php 
    session_start();
    include_once 'common/conecta.php';
    include_once 'common/header.php';
    include_once 'common/navlogin.php';
    ?>
    <?php
            $erro1 = ""; 
			$erro2 = ""; 
			$erro = "";
			if(isset($_SESSION['serrocadastro'])){
				if($_SESSION['serrocadastro'] == 1){
					$erro = "<div class='alert alert-danger'>
                                <strong> Erro!</strong> Email já cadastrado! Tente Novamente
                            </div>;";
				}elseif($_SESSION['serrocadastro'] == 2){
					$erro = "<div class='alert alert-danger'>
                                <strong> Erro!</strong> Cpf já cadastrado! Tente Novamente
                            </div>;";
				}
                unset($_SESSION['serrocadastro']);
			}
        ?>
        <!--Mask-->
        <div class="view hm-black-strong">
            <div class="full-bg-img flex-center mt-2">
                <div class="container">
                        <?php echo $erro; ?>
                    <form action="cadastrar.php" id="loginForm" method="post">
                        <!--Form without header-->
                        <!--Form without header-->
                        <div class="card">
                            <div class="card-block">
                                <!--Header-->
                                <div class="text-center">
                                    <h3><i class="fa fa-users"></i> Cadastro</h3>
                                    <hr class=""> </div>
                                <!--Body-->
                                <div class="md-form"> <i class="fa fa-user prefix"></i>
                                    <input type="text" id="nome" class="form-control" pattern="[a-zA-Z]" maxlength="50" name="nome" required>
                                    <label for="form2">Nome</label>
                                </div>
                                <div class="md-form"> <i class="fa fa-envelope prefix"></i>
                                    <input type="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="70" name="email" required>
                                    <label for="form2">Email</label>
                                </div>
                                <div class="md-form"> <i class="fa fa-wpforms prefix"></i>
                                    <input type="text" id="cpf" class="form-control" pattern="[0-9]+" maxlength="11" name="cpf" required>
                                    <label for="form2">CPF</label>
                                </div>
                                <div class="md-form"> <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="senha" class="form-control" name="senha" required>
                                    <label for="form4">Digite sua Senha</label>
                                </div>
                                <?php echo $erro; ?>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-deep-purple">Cadastrar</button>
                                    <button type="reset" class="btn btn-danger">Limpar</button>
                                </div>
                            </div>
                            <!--Footer-->
                        </div>
                        <!--/Form without header-->
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        <?php
    include_once 'common/footer.php';
    ?>