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
                <div class="row" style="margin-top: 30px;">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                Nova Amostra
                            </h1>

                            <form method="POST" action="<?php echo base_url() ?>amostra/insert">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <h3>Identificador da Amostra</h3>

                                        <div class=" col-lg-3 form-group">
                                            <label for="date">Data de Recebimento</label>
                                            <div>
                                                <input id="data" type="date" name="data" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="encaminhamento">Encaminhamento</label>
                                            <select name="encaminhamento" class="form-control" required>
                                                <option selected disabled value=""> Selecione </option>
                                                <option value="0">Vacina</option>
                                                <option value="1">Exame</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="formaenvio">Forma de Envio</label>
                                            <select name="formaenvio" class="form-control" required>
                                                <option selected disabled value=""> Selecione </option>
                                                <option value="0">Correios</option>
                                                <option value="1">Rodoviária</option>
                                                <option value="2">Transportadora</option>
                                                <option value="3">Entrega no laboratório</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="especie">Espécie</label>
                                            <select name="especie" class="form-control" required>
                                                <option selected disabled value=""> Selecione </option>
                                                <option value="0">Bovina</option>
                                                <option value="1">Equina</option>
                                                <option value="2">Ovina</option>
                                                <option value="3">Suína</option>
                                                <option value="4">Canina</option>
                                                <option value="5">Felina</option>
                                                <option value="6">Selvagens</option>
                                                <option value="7">Morcegos</option>
                                                <option value="8">Outro</option>
                                            </select>
                                        </div>



                                        <div class="col-lg-3 form-group">
                                            <label for="materialrecebido">Material Recebido</label>
                                            <select name="materialrecebido" class="form-control" required>
                                                <option selected disabled value=""> Selecione </option>
                                                <option value="0">Sangue total</option>
                                                <option value="1">Soro</option>
                                                <option value="2">Crostas</option>
                                                <option value="3">Neoplasias</option>
                                                <option value="4">Tecidos</option>
                                                <option value="5">Swab Nasal</option>
                                                <option value="6">Swab Ocular</option>
                                                <option value="7">Swab de Vesículas/Lesões</option>
                                                <option value="8">Outro</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="acondicionamento">Acondicionamento</label>
                                            <select name="acondicionamento" class="form-control" required>
                                                <option selected disabled value=""> Selecione </option>
                                                <option value="0">Refrigerada</option>
                                                <option value="1">Congelada</option>
                                                <option value="2">Temperatura Ambiente</option>
                                                <option value="3">Formol</option>
                                                <option value="4">Parafinizada</option>
                                                <option value="5">Outro</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="condicaomaterial">Condição do material</label>
                                            <select name="condicaomaterial" class="form-control" required>
                                                <option selected disabled value=""> Selecione </option>
                                                <option value="0">Bom</option>
                                                <option value="1">Hemolisado</option>
                                                <option value="2">Coagulado</option>
                                                <option value="3">Putrefação</option>
                                                <option value="4">Swab Seco</option>
                                                <option value="5">Descongelado</option>
                                                <option value="6">Outro</option>
                                            </select>
                                        </div>


                                        <div class="col-lg-12 form-group">
                                            <label for="observacao">Observações Gerais</label>
                                            <div>
                                                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacao" name="observacao"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="gprc_1" id="gprc_1">Número de Amostras: </span>
                                        <button class="btn btn-success" type="button" onclick="education_fields()">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                    </div>

                                    <div class="panel-body">
                                        <div id="education_fields">

                                        </div>
                                    </div>
                                </div>

                                <h3>Identificador do Proprietário</h3>

                                <div class="col-lg-4 form-group">
                                    <label for="">Nome</label>
                                    <div>
                                        <input id="" name="nomeproprietario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">CEP</label>
                                    <div>
                                        <input id="" name="cepproprietario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="">Email</label>
                                    <div>
                                        <input id="" name="emailproprietario" class="form-control input-md">
                                    </div>
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label for="enderecoproprietario">Endereço</label>
                                    <div>
                                        <input id="enderecoproprietario" name="enderecoproprietario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">Cidade</label>
                                    <div>
                                        <input id="" name="cidadeproprietario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">Estado</label>
                                    <div>
                                        <input id="" name="estadoproprietario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">Telefone</label>
                                    <div>
                                        <input id="" name="telefoneproprietario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacaoproprietario">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacaoproprietario" name="observacaoproprietario"></textarea>
                                    </div>
                                </div>

                                <h3>Médico Veterinário Responsável</h3>

                                <div class="col-lg-3 form-group">
                                    <label for="">Nome</label>
                                    <div>
                                        <input id="" name="nomeveterinario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">CRMV</label>
                                    <div>
                                        <input id="" name="crmvveterinario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Email</label>
                                    <div>
                                        <input id="" name="emailveterinario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Telefone</label>
                                    <div>
                                        <input id="" name="telefoneveterinario" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacaoveterinario">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacaoveterinario" name="observacaoveterinario"></textarea>
                                    </div>
                                </div>

                                <h3>Histórico e Suspeita Clínica</h3>

                                <div class="col-lg-3 form-group">
                                    <label for="propriedade">Propriedade</label>
                                    <select name="propriedade" class="form-control" required>
                                        <option selected disabled value=""> Selecione </option>
                                        <option value="0">Rural</option>
                                        <option value="1">Haras</option>
                                        <option value="2">Granja</option>
                                        <option value="3">Canil</option>
                                        <option value="4">Gatil</option>
                                        <option value="5">Não se Aplica</option>
                                    </select>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Número total de animais</label>
                                    <div>
                                        <input id="" name="totalanimais" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Número de animais acometidos</label>
                                    <div>
                                        <input id="" name="animaisacometidos" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="criacao">Tipo de Criação</label>
                                    <select name="criacao" class="form-control" required>
                                        <option selected disabled value=""> Selecione </option>
                                        <option value="0">Intensiva</option>
                                        <option value="1">Extensiva</option>
                                        <option value="2">Semiextensiva</option>
                                        <option value="3">Aberta</option>
                                        <option value="4">Fechada</option>
                                        <option value="5">Não se Aplica</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="suspeita">Principais Suspeitas</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="suspeita" name="suspeita"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacaoclinica">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacaoclinica" name="observacaoclinica"></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">

                                    <button id="amostrat-submit" type="submit" onclick="return validar()" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url('amostras'); ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i>
                                    <?= $this->lang->line('btn-back') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
</body>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
<script>
    var room = 0;
    var total = 0;
    var count = 0;
    window.onload = initPage();

    function initPage() {
        document.getElementById("gprc_1").textContent = 'Número de Amostras: ' + parseFloat(count);
    }


    function education_fields() {
        count++;
        document.getElementById("gprc_1").textContent = 'Número de Amostras: ' + parseFloat(count);
        room--;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        divtest.setAttribute("id", 'removeclass[' + room + ']');
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div style="padding-top: 10px;" class="col-sm-4"> <div class="input-group"><label for="identificador">Amostra</label> <input type="text" class="form-control elasticteste" id="identificador[]" name="identificador[]" value=> &nbsp; <button class="btn btn-danger" type="button" id="button[' +
            room + ']" onclick="remove_education_fields(' + room +
            ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div></div>';


        objTo.appendChild(divtest);

    }

    function remove_education_fields(rid) {
        count--;
        document.getElementById("gprc_1").textContent = 'Número de Amostras: ' + parseFloat(count);
        $('.removeclass' + rid).remove();
    }

    function validar() {

        if (count == 0) {
            alertify.alert('Cadastre no minimo uma amostra!').setting({
                title: 'Alerta!',
            }).show();
            return false;
        }
    }
</script>

<script>
    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab

        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        };
    }
</script>
<?php $this->load->view('frame/footer_view') ?>