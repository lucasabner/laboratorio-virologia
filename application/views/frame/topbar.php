<header class="main-header" style="
    position:fixed;
    width:100%;
    height:auto;
    top:0;
    ">

    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini"><b>SCA</b></span>
        <!-- logo for regular state and mobile devices -->
        <!-- Sistema de controle de Amostra -->
        <span style="cursor: default;" class="logo-lg"><b>SCA</b></span>
        <!-- <span class="logo-lg"><b>Silver Bullet</b></span> -->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" enableRemember="true">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/images/user-icon.png" class="user-image profileImgUrl"
                            alt="User Image">
                        <span class="hidden-xs NameEdt"><?= $this->session->userdata('name'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">

                            <img src="<?= base_url() ?>assets/images/user-icon.png" class="img-circle profileImgUrl"
                                alt="User Image">

                            <p>
                                <span class="NameEdt"><?= $this->session->userdata('name'); ?></span>
                                <small>
                                    <?php if ($_SESSION['role'] == 1) {
                                            echo "Professor";
                                        } else if ($_SESSION['role'] == 2) {
                                            echo 'Aluno';
                                        } else {
                                            echo 'Administrador';
                                        }
                                        ?>
                                </small>
                                <small><?= $this->session->userdata('email'); ?></small>

                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url(); ?>meu_perfil" class="btn btn-info btn-flat">Meu Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url(); ?>logout" class="btn btn-danger btn-block">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>