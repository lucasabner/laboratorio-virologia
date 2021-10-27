<body class="hold-transition skin-green sidebar-mini">
    <script>
    (function() {
        if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' sidebar-collapse';
        }
    })();
    </script>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">

                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                Editar Usuário : <?php extract($usuario); echo $name;?>
                            </h1>
                            <form action="<?= base_url('update_meu_perfil')?>" name="formuser" method="post">

                                <!-- colocar campos a serem editados aki -->
                                <div class=" col-lg-3 form-group">
                                    <label for="name">Nome</label>
                                    <div>
                                        <input id="name" name="name" class="form-control input-md"
                                            value="<?php echo $name; ?>">
                                    </div>
                                </div>
                                <div class=" col-lg-3 form-group">
                                    <div class="form-floating mb-3">
                                        <label for="email">Endereço de e-mail</label>
                                        <input disabled type="email" name="email" class="form-control" id="email"
                                            placeholder="exemplo@exemplo.com" value="<?= $email ?>">

                                    </div>
                                </div>

                                <div class=" col-lg-3 form-group">
                                    <div class="form-floating mb-3">
                                        <label for="password">Senha ou Nova Senha</label>
                                        <input placeholder="Senha" name="password" type="password" class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class=" col-lg-3 form-group">
                                    <div class="form-floating mb-3">
                                        <label for="password">Confirmar Senha</label>
                                        <input placeholder="Confirmar Senha" name="rep_senha" type="password"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class=" col-lg-12 form-group">
                                    <div class="form-group">
                                        <label for="selectAccessLevel">Nível de acesso</label>
                                        <select disabled class="form-control" id="selectAccessLevel" name="role">
                                            <option value="1" <?php if ($role == 1) echo 'selected'; ?>>Professor
                                            </option>
                                            <option value="2" <?php if ($role == 2) echo 'selected'; ?>>Aluno</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12">
                                        <button id="activity-submit" onclick="return validar()" type="submit"
                                            value="Save" class="btn btn-lg btn-success pull-right">
                                            <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                        </button>
                            </form>

                            <form action="<?php echo base_url('amostras'); ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i
                                        class="glyphicon glyphicon-chevron-left"></i>
                                    <?= $this->lang->line('btn-back') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
<script>
function validar() {
    var senha = formuser.password.value;
    var rep_senha = formuser.rep_senha.value;

    if (senha != rep_senha) {
        alertify.alert('As senhas estão diferentes!').setting({
            title: 'Alerta!',
        }).show();
        formuser.password.focus();
        return false;
    }
}
</script>

<?php $this->load->view('frame/footer_view') ?>