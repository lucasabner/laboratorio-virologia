<aside class="main-sidebar" style="
/* position:absolute;
height: fit-content; */
position:-webkit-sticky
 ">
    <section class="sidebar">
        <div class="user-panel">

            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/images/user-icon.png" class="img-circle profileImgUrl"
                    alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="NameEdt">
                    <?= $this->session->userdata('name') ?>
                </p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                <span style="font-size:small">
                    <i class="fa fa-address-card"></i>
                    <?php if($_SESSION['role'] == 1){
                    echo "Professor";
                    }else if($_SESSION['role'] == 2){
                        echo 'Aluno';
                    } else {
                        echo 'Administrador';
                    }
                    ?>
                </span>

            </div>
        </div>

        <!--  http://localhost/grupo01/amostras 
         $this->uri->segment(1) retorna o primeiro nome na url apos a pasta raiz
        -->
        <?php $url1 = $this->uri->segment(1);
        $url2 = $this->uri->segment(2);
        ?>
        <ul class="sidebar-menu" data-widget="tree">

            <!-- 
            role = 0 Admin Geral,
            role = 1 professor,
            role = 2 Aluno.
            -->
            <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>LogActivity">
                    <i class="fas fa-history"> </i> 
                    &nbsp; Auditoria de uso
                    </a>
                </li> -->

            <li class="<?php if ($url1 == 'LogActivity') {
                                echo 'active';
                            } ?>"> <a href="<?= base_url('LogActivity'); ?>"><i class="fas fa-history"></i>
                    <span>Auditoria de uso</span>
                </a>
            </li>
            <?php
            if ($_SESSION['role'] != 0) {
            ?>
            <!-- caso o usuario n seja o administrador geral -->
            <li class="<?php if ($url1 == 'amostras') {
                                echo 'active';
                            } ?>"> <a href="<?= base_url('amostras'); ?>"><i class="fa fa-folder fa-fw"></i>
                    <span>Amostras</span>
                </a>
            </li>

            <?php
            }
            if ($_SESSION['role'] != 2) {
            ?>
            <!-- caso seja administrador geral -->
            <li class="<?php if ($url1 == 'usuarios') {
                                echo 'active';
                            } ?>"> <a href="<?= base_url('usuarios'); ?>"><i class="fa fa-user fa-fw"></i>
                    <span>Gerenciar Usuarios</span>
                </a>
            </li>

            <?php
            }
            if ($_SESSION['role'] == 1) {
            ?>
            <!-- caso seja professor -->
            <li class="<?php if ($url1 == 'exames_valor') {
                                echo 'active';
                            } ?>"> <a href="<?= base_url('exames_valor'); ?>"><i class="fa fa-money fa-fw"></i>
                    <span>Cobranças dos Exames</span>
                </a>
            </li>

            <?php
            }
            ?>









            <!-- Codigo abaixo esta comentado -->
            <!-- Agrupamento de itens -->
            <!-- <li class="treeview <?php if ($url1 == 'usuarios') {
                                            echo 'active';
                                        } ?>"> <a href="#"> <i class="fa fa-user"></i> <span>Usuarios</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a> -->
            <!-- Acima o o nome do agrupamento e Abaixo itens agrupados-->
            <!-- <ul class="treeview-menu">

                    <li class="<?php if ($url2 == 'criar') {
                                    echo 'active';
                                } ?>"><a href="<?= base_url("usuarios/criar") ?>"><i class="fa fa-user"></i>Criar Usuario</a></li> -->

            <!-- fim dos itens agrupados -->
            <!-- </ul>
            </li> -->

            <!-- Fim itens do menu -->
        </ul>
    </section>
</aside>