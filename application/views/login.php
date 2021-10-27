<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Sistema de Cadastro de amostras - SCA</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Unipampa">
      <link rel="shortcut icon" href="<?=base_url()?>assets/images/Lab.-de-Virologia_logo1.jpg" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animate/animate.css"> -->
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/select2/select2.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/util.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/main.css">
   </head>
   <body>
      <div class="limiter">
         <div class="container-login100">
            <div class="wrap-login100">
               <div class="login100-pic py-5">
                  <img src="<?=base_url()?>assets/images/Lab.-de-Virologia_logo1.jpg" alt="IMG">
               </div>
               <form class="login100-form validate-form" role="form" method="post" onsubmit="return checkEmptyInput();" action="<?=base_url()?>login">
                  <span class="login100-form-title">
                  Login
                  </span>
                  <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                     <input class="input100" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"> </i>
                     </span>
                  </div>
                  
                  <div class="wrap-input100 validate-input" data-validate = "Password is required">
                     <input class="input100" id="password" placeholder="Password" name="password" type="password" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     </span>
                  </div>
                <div class="container-login100-form-btn">
                     <button class="login100-form-btn"  type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                     Login
                     </button>
                  </div>
                  <div class="text-center p-t-12">
                     <span class="txt1">
                     Esquesceu
                     </span>
                     <a class="txt2" data-toggle="modal" data-target="#forgot" href="#forgot">
                     senha?
                     </a>
                     <!-- Retorna msg sucesso ou falha para recuperacao email -->
                     <strong>
                        <p class='flashMsg flashSuccess text-center' style="color: #2ce14a"> <?=$this->session->flashdata('flashSuccess')?> </p>
                     </strong>
                     <strong>
                        <p class='flashMsg flashFail text-center' style="color: #ff4d4d"> <?=$this->session->flashdata('flashFail')?>
                        </p>
                     </strong>
                     <strong>
                        <p class='flashMsg flashSuccess text-center' style="color: #2ce14a"> <?=$this->session->flashdata('flashCreated')?> </p>
                     </strong>
                     <strong>
                        <p class='flashMsg flashFail text-center' style="color: #ff4d4d"> <?=$this->session->flashdata('flashError')?>
                        </p>
                     </strong>
                  </div>
                  <!-- <div class="text-center p-t-136">
                     <a class="txt2" href="<?=base_url()?>authentication/register/">
                     Crie sua conta
                     <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                     </a>
                  </div> -->
               </form>
            </div>
         </div>
      </div>
      <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="ModalForgot" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="ModalForgot">Esquesceu a senha</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?=base_url()?>recuperar_senha">
                     <fieldset>
                        <div class="form-group">
                           <input class="form-control"  placeholder="E-mail" name="email" type="email" value="" autofocus>
                        </div>
                        <div>Um email temporario será enviado a sua caixa de email</div>
                     </fieldset>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <input style="background: #d68e39; border-color: #333300;" id="login-submit" id="login-submit" type="submit" class="btn btn-primary" value="Enviar">
               </div> </form>
            </div>
         </div>
      </div>
      <script src="<?=base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
      <script src="<?=base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
      <script src="<?=base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?=base_url()?>assets/login/vendor/select2/select2.min.js"></script>
      <script src="<?=base_url()?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
      <!-- <script>
         $('.js-tilt').tilt({
            scale: 1.1
         })
      </script> -->
   </body>
</html>
