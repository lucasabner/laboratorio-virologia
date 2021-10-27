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

                <style>
                    @media (min-width: 1200px) {
                        .texttd {
                            display: block;
                            width: 650px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1199px) {
                        .texttd {
                            display: block;
                            width: 450px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1160px) {
                        .texttd {
                            display: block;
                            width: 300px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 767px) {
                        .panel-body {
                            margin-top: 50px;
                        }
                    }
                </style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                            <!-- Titulo  -->
                            <h1 class="page-header">
                                Amostras
                            </h1>

                            <!-- botao criar amostra  -->
                            <div class="row">
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>amostra/criar/'"><i class="fa fa-plus-circle"></i> Criar Amostra</button>
                                </div>
                            </div>

                            <br><br> <!-- espaçamento (Enter)  -->

                            <table class="table table-bordered table-striped" id="table_amostras">
                                <thead>
                                    <tr>
                                        <th>Protocolo</th>
                                        <th>Encaminhamento</th>
                                        <th>Status</th>
                                        <th>Proprietário</th>
                                        <th>Data Recebimento</th>
                                        <th>Data Registro</th>
                                        <th>Abrir</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Abro a tag php pra fazer um foreach da amostra
                                    // ou seja vai repetir as linhas abaixo para cada amostra retornada
                                    foreach ($amostra as $item) {
                                    ?>
                                        <tr>
                                            <td><?php echo 'LV' . $item->amostra_id . date("/y\ ", strtotime($item->data_registro)) ?>
                                            </td>
                                            <td><?php echo $item->encaminhamento == 1 ? "Exame" : "Vacina" ?></td>
                                            <!-- <td><?php echo $item->status == 1 ? "Em andamento" : "Concluído" ?></td> -->
                                             <td><?php if ($item->status == 1) {
                                                            echo "Em andamento";
                                                        } else if ($item->status == 2) {
                                                            echo "Aguardando
                                                            liberação";
                                                        } else if($item->status == 3){
                                                            echo "Liberada";
                                                        } else if($item->status == 4){
                                                            echo "Impropia";
                                                        } else if($item->status == 5){
                                                            echo "Em exame";
                                                        }else if($item->status == 6){
                                                            echo "Laudo Gerado";
                                                        }?></td> 
                                            <td><?php echo $item->nomeproprietario; ?></td>
                                            <td><?php echo date("d/m/Y\ ", strtotime($item->data)) ?></td>
                                            <td><?php echo date("d/m/Y\ ", strtotime($item->data_registro)) ?></td>
                                            <td>
                                                <?php if ($item->encaminhamento == 1) { ?>
                                                    <div class="col-sm-2">
                                                        <form action="<?php echo base_url() ?>exames/<?php echo $item->amostra_id; ?>" method="post">
                                                            <button <?php echo ($item->encaminhamento == 1) ? "" : "disabled" ?> type="submit" class="btn btn-default"><i class="fas fa-file-medical"></i></button>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-sm-2">
                                                        <form action="<?php echo base_url() ?>vacina/edit/<?php echo $item->amostra_id; ?>" method="post">
                                                            <button <?php echo ($item->encaminhamento == 0) ? "" : "disabled" ?> type="submit" class="btn btn-default"><i class="fas fa-syringe"></i></button>
                                                        </form>
                                                    </div>
                                                <?php } ?>

                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <form action="<?php echo base_url() ?>amostra/editar/<?php echo $item->amostra_id; ?>" method="post">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                        </form>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->amostra_id; ?>)"><i class="fa fa-trash"></i></button>
                                                    </div>

                                                    <div class="col-sm-2">
                                                    <form action="<?php echo base_url() ?>Midia/editar/<?php echo $item->amostra_id ?>" method="post">
                                                        <button type="submit" class="btn btn-default"><em class="fa fa-upload"></em><span class="hidden-xs"></span></button>
                                                    </form>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <form action="<?php echo base_url() ?>GerarPdf/generatePdf/<?php echo $item->amostra_id; ?>" method="post">
                                                            <button <?php echo ($item->encaminhamento != 0) ? "" : "disabled" ?> type="submit" class="btn btn-default"><i class="far fa-file-pdf"></i></button>
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
        table = $('#table_amostras').DataTable({
            "columns": [{
                    "data": "protocolo"
                },
                {
                    "data": "encaminhamento"
                },
                {
                    "data": "status"
                },
                {
                    "data": "nomeproprietario	"
                },
                {
                    "data": "data"
                },
                {
                    "data": "data_registro"
                },
                {
                    "data": "btn-open",
                    "orderable": false
                },
                {
                    "data": "btn-actions",
                    "orderable": false
                },
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

                $.post("<?php echo base_url() ?>amostra/delete/" + id);

                alertify.success('Item Deletado com Sucesso.');
                location.reload();
            },
            'oncancel': function() {
                alertify.error('Item Não Deletado.');
            }
        }).show();
    }
</script>