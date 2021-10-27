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
                <?php endif; extract($exames_valor); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                Cobranças dos Exames: Editar Valor
                            </h1>
                            <form action="<?= base_url('exames_valor/update/')?><?php echo $tecnica_tratamento_id; ?>"
                                method="post">

                                <!-- colocar campos a serem editados aki -->
                                <div class=" col-lg-4 form-group">
                                    <label for="">Técnica</label>
                                    <div>
                                        <input disabled id="" name="" class="form-control input-md"
                                            value="<?= getTecnicaById($tecnica_tratamento_id); ?>">
                                    </div>
                                </div>
                                <div class=" col-lg-4 form-group">
                                    <div class="form-floating mb-3">
                                        <label for="">Suspeita</label>
                                        <input disabled type="" name="" class="form-control" id=""
                                            value="<?= getTratamentoById($tecnica_tratamento_id); ?>">
                                    </div>
                                </div>
                                <div class=" col-lg-4 form-group">
                                    <div class="form-floating mb-3">
                                        <label for="">Valor</label>
                                        <input type="text" name="valor" class="form-control" id=""
                                            value="<?= $valor ?>">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <button id="activity-submit" type="submit" value="Save"
                                        class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url('exames_valor'); ?>">
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

<?php $this->load->view('frame/footer_view') ?>