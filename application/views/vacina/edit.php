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
                <?php endif;
                extract($vacina);
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                <?php echo 'Vacina da LV' . $amostra_id . date("/y\ ", strtotime(getDataRegistro($amostra_id))) ?>
                            </h1>
                            <form method="POST" name="form_vacina"
                                action="<?php echo base_url() ?>vacina/update/<?php echo $amostra_id ?>/<?php echo $vacina_id ?>">

                                <!-- colocar campos a serem editados aki -->
                                <div class="col-lg-3 form-group">
                                    <label for="">Número de vacinas produzidas</label>
                                    <div>
                                        <input id="" type="number" name="qtd_vacinas" class="form-control input-md"
                                            value="<?= $qtd_vacinas ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="peso">Peso</label>
                                    <div>
                                        <input id="" name="peso" class="form-control input-md" value="<?= $peso ?>">
                                    </div>
                                </div>

                                <div class=" col-lg-3 form-group">
                                    <label for="date">Data de Conclusão</label>
                                    <div>
                                        <input id="date" value="<?= $data_conclusao ?>" type="date"
                                            name="data_conclusao" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option selected disabled value=""> Selecione </option>
                                            <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Em Andamento
                                            </option>
                                            <option value="2" <?php if ($status == 2) echo 'selected'; ?>>Aguardando
                                                liberação</option>
                                            <option value="3" <?php if ($status == 3) echo 'selected'; ?>>Liberada
                                            </option>
                                            <option value="4" <?php if ($status == 4) echo 'selected'; ?>>Impropia
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacao">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste"
                                            id="observacao" name="observacao"><?= $observacao ?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <button id="activity-submit" type="submit" value="Save"
                                        class="btn btn-lg btn-success pull-right">
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

<?php $this->load->view('frame/footer_view') ?>