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
                <!-- Inicio sistema de feedbacks -->
                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
                <?php endif; ?>
                <!-- Fim sistema de feedbacks -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                            <!-- Titulo  -->
                            <h1 class="page-header">
                                <?php echo 'Exames da LV' . $amostra_id . date("/y\ ", strtotime(getDataRegistro($amostra_id))) ?>
                            </h1>

                            <!-- botao criar amostra  -->
                            <div class="row">
                                <div class="col-lg-2">
                                    <button class="btn btn-info btn-lg"
                                        onclick="window.location.href='<?php echo base_url() ?>exame/criar/<?php echo $amostra_id ?>'"><i
                                            class="fa fa-plus-circle"></i> Cadastrar Exame</button>
                                </div>
                                <!-- <div class="col-lg-2">
									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>exame/resultado/<?php echo $amostra_id ?>'"><i class="fa fa-plus-circle"></i> Cadastrar Resultado</button>
								</div> -->
                            </div>



                            <br><br> <!-- espaçamento (Enter)  -->

                            <table class="table table-bordered table-striped" id="table_exames">
                                <thead>
                                    <tr>
                                        <th>Tecnica</th>
                                        <th>Suspeita</th>
                                        <th>Valor</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									// Abro a tag php pra fazer um foreach da amostra
									// ou seja vai repetir as linhas abaixo para cada amostra retornada
									foreach ($exame as $item) {

									?>

                                    <tr>
                                        <td><?= getTecnicaById($item->tecnica_tratamento_id); ?></td>
                                        <td><?= getTratamentoById($item->tecnica_tratamento_id) ?></td>
                                        <td><?= $item->valor ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="deletar(<?= $item->exame_id; ?>)"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <form
                                                        action="<?php echo base_url() ?>exame/resultado/<?php echo $item->exame_id; ?>/<?php echo $item->amostra_id; ?>"
                                                        method="post">
                                                        <button type="submit" class="btn btn-default"><i
                                                                class="fas fa-notes-medical"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
									}
									?>

                                </tbody>
                            </table>

                            <form action="<?php echo base_url('amostras'); ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i
                                        class="glyphicon glyphicon-chevron-left"></i>
                                    <?= $this->lang->line('btn-back') ?></button>
                            </form>

                            <!-- botao Back -->
                            <!-- <form action="<?php echo base_url('tela/'); ?><?php echo $algum_valor; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form> -->

                        </div><!-- fim panel body -->
                    </div> <!-- fim col-lg-12 -->
                </div> <!-- fim rown -->
            </section> <!-- fim content -->
        </div> <!-- fim content-wrapper -->
    </div> <!-- fim wrapper -->
</body>



<?php $this->load->view('frame/footer_view') ?>


<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
<script type="text/javascript">
'use strict'
let table;

$(document).ready(function() {
    table = $('#table_exames').DataTable({
        "columns": [{
                "data": "tecnica_tratamento_id"
            },
            {
                "data": "tecnica_tratamento_id"
            },
            {
                "data": "valor"
            },
            {
                "data": "btn-actions",
                "orderable": false
            }
        ],
        "order": [
            [1, 'attr']
        ]
    });
});
</script>

<script type="text/javascript">
function deletar(id) {
    alertify.confirm('Tem certeza que deseja deletar este item?').setting({
        'title': "Deletar Item",
        'labels': {
            ok: 'Aceitar',
            cancel: 'Cancelar'
        },
        'reverseButtons': false,
        'onok': function() {

            $.post("<?php echo base_url() ?>exame/delete/" + id);

            alertify.success('Item Deletado com Sucesso.');
            location.reload();
        },
        'oncancel': function() {
            alertify.error('Item Não Deletado.');
        }
    }).show();
}
</script>