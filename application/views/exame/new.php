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
                    <strong><?php echo $this->session->flashdata('error');

								?></strong>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                <?php echo 'Cadastrar Exame na LV' . $amostra_id . date("/y\ ", strtotime(getDataRegistro($amostra_id))) ?>
                            </h1>
                            <form method="POST" action="<?php echo base_url() ?>exame/insert/<?php echo $amostra_id ?>">

                                <div class="col-lg-4 form-group">
                                    <label for="tecnica">Tecnica</label>
                                    <select name="Distrito" size="1" class="form-control" id="COMBOFAB" tabindex="1">
                                        <?php foreach ($tecnica as $t) { ?>
                                        <option value="<?= $t->tecnica_id; ?>"><?= $t->nome; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>


                                <div class="col-lg-4 form-group">
                                    <label >Suspeita</label>
                                    <select name="Concelho" class="form-control" size="1" id="COMBOCID" tabindex="1"
                                        required>
                                        <?php foreach ($tecnica_tratamento as $tt) { ?>
                                        <option data-distrito="<?= $tt->tecnica_id; ?>"
                                            value="<?= $tt->tecnica_tratamento_id; ?>">
                                            <?= getTratamentoById($tt->tecnica_tratamento_id); ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>


                                <div class="col-lg-4 form-group">
                                    <label>Valor</label>
                                    <select name="valorexame" id="valorexame" class="form-control" size="1"  tabindex="1"
                                       disabled>
                                        <?php foreach ($tecnica_tratamento as $tt) { ?>
                                        <option data-distrito="<?= $tt->tecnica_id; ?>"  data-tt="<?= $tt->tecnica_tratamento_id; ?>"
                                            value="<?= getValor($tt->tecnica_tratamento_id); ?>">
                                            <?= getValor(($tt->tecnica_tratamento_id)); ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>



                                <div class="col-lg-12">
                                    <button id="activity-submit" type="submit" value="Save"
                                        class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>
                            <form action="<?php echo base_url() ?>exames/<?php echo $amostra_id; ?>" method="post">
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

<script src="//code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>

<script>
var concelhos = $('select[name="Concelho"] option');
var valor= $('select[name="valorexame"] option');

// filtro suspeita
var novoSelect = concelhos.filter(function() {
    return $(this).data('distrito') == 1;
});
$('select[name="Concelho"]').html(novoSelect);

// filtrovalor
var novoSelect2 = valor.filter(function() {
    return $(this).data('distrito') == 1;
});
$('select[name="valorexame"]').html(novoSelect2);


$('select[name="Distrito"]').on('change', function() {
    var Distrito = this.value; //tecnica_id

    var novoSelect = concelhos.filter(function() {
        return $(this).data('distrito') == Distrito;
    });
    $('select[name="Concelho"]').html(novoSelect);

    var novoSelect2 = valor.filter(function() {
        return $(this).data('distrito') == Distrito;
    });
    $('select[name="valorexame"]').html(novoSelect2);
});


$('select[name="Concelho"]').on('change', function() {
    var tratamento = this.value;

    var novoSelect2 = valor.filter(function() {
        return $(this).data('tt') == tratamento;
    });
    $('select[name="valorexame"]').html(novoSelect2);
});

</script>
<?php $this->load->view('frame/footer_view') ?>