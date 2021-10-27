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
                                <?php
                                extract($amostra);
                                echo 'Amostra: LV' . $amostra_id . date("/y\ ", strtotime($data_registro))
                                ?>
                            </h1>

                            <form method="POST" action="<?php echo base_url() ?>amostra/update/<?php echo $amostra_id; ?>">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-lg-12">

                                        <h3>Identificador da Amostra</h3>

                                        <div class=" col-lg-3 form-group">
                                            <label for="date">Data de Recebimento</label>
                                            <div>
                                                <input id="date" value="<?= $data ?>" type="date" name="data" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="encaminhamento">Encaminhamento</label>
                                            <select disabled name="encaminhamento" class="form-control">
                                                <option value="0" <?php if ($encaminhamento == 0) echo 'selected'; ?>>
                                                    Vacina</option>
                                                <option value="1" <?php if ($encaminhamento == 1) echo 'selected'; ?>>
                                                    Exame</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="formaenvio">Forma de Envio</label>
                                            <select name="formaenvio" class="form-control">
                                                <option value="0" <?php if ($formaenvio == 0) echo 'selected'; ?>>
                                                    Correios</option>
                                                <option value="1" <?php if ($formaenvio == 1) echo 'selected'; ?>>
                                                    Rodoviária</option>
                                                <option value="2" <?php if ($formaenvio == 2) echo 'selected'; ?>>
                                                    Transportadora</option>
                                                <option value="3" <?php if ($formaenvio == 3) echo 'selected'; ?>>
                                                    Entrega no laboratório</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="especie">Espécie</label>
                                            <select name="especie" class="form-control">
                                                <option value="0" <?php if ($especie == 0) echo 'selected'; ?>>Bovina
                                                </option>
                                                <option value="1" <?php if ($especie == 1) echo 'selected'; ?>>Equina
                                                </option>
                                                <option value="2" <?php if ($especie == 2) echo 'selected'; ?>>Ovina
                                                </option>
                                                <option value="3" <?php if ($especie == 3) echo 'selected'; ?>>Suína
                                                </option>
                                                <option value="4" <?php if ($especie == 4) echo 'selected'; ?>>Canina
                                                </option>
                                                <option value="5" <?php if ($especie == 5) echo 'selected'; ?>>Felina
                                                </option>
                                                <option value="6" <?php if ($especie == 6) echo 'selected'; ?>>Selvagens
                                                </option>
                                                <option value="7" <?php if ($especie == 7) echo 'selected'; ?>>Morcegos
                                                </option>
                                                <option value="8" <?php if ($especie == 8) echo 'selected'; ?>>Outro
                                                </option>
                                            </select>
                                        </div>


                                        <div class="col-lg-3 form-group">
                                            <label for="materialrecebido">Material Recebido</label>
                                            <select name="materialrecebido" class="form-control">
                                                <option value="0" <?php if ($materialrecebido == 0) echo 'selected'; ?>>
                                                    Sangue total</option>
                                                <option value="1" <?php if ($materialrecebido == 1) echo 'selected'; ?>>
                                                    Soro</option>
                                                <option value="2" <?php if ($materialrecebido == 2) echo 'selected'; ?>>
                                                    Crostas</option>
                                                <option value="3" <?php if ($materialrecebido == 3) echo 'selected'; ?>>
                                                    Neoplasias</option>
                                                <option value="4" <?php if ($materialrecebido == 4) echo 'selected'; ?>>
                                                    Tecidos</option>
                                                <option value="5" <?php if ($materialrecebido == 5) echo 'selected'; ?>>
                                                    Swab Nasal</option>
                                                <option value="6" <?php if ($materialrecebido == 6) echo 'selected'; ?>>
                                                    Swab Ocular</option>
                                                <option value="7" <?php if ($materialrecebido == 7) echo 'selected'; ?>>
                                                    Swab de Vesículas/Lesões</option>
                                                <option value="8" <?php if ($materialrecebido == 8) echo 'selected'; ?>>
                                                    Outro</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label for="acondicionamento">Acondicionamento</label>
                                            <select name="acondicionamento" class="form-control">
                                                <option value="0" <?php if ($acondicionamento == 0) echo 'selected'; ?>>
                                                    Refrigerada</option>
                                                <option value="1" <?php if ($acondicionamento == 1) echo 'selected'; ?>>
                                                    Congelada</option>
                                                <option value="2" <?php if ($acondicionamento == 2) echo 'selected'; ?>>
                                                    Temperatura Ambiente</option>
                                                <option value="3" <?php if ($acondicionamento == 3) echo 'selected'; ?>>
                                                    Formol</option>
                                                <option value="4" <?php if ($acondicionamento == 4) echo 'selected'; ?>>
                                                    Parafinizada</option>
                                                <option value="5" <?php if ($acondicionamento == 5) echo 'selected'; ?>>
                                                    Outro</option>
                                            </select>
                                        </div>


                                        <div class="col-lg-3 form-group">
                                            <label for="condicaomaterial">Condição do Material</label>
                                            <select name="condicaomaterial" class="form-control">
                                                <option value="0" <?php if ($condicaomaterial == 0) echo 'selected'; ?>>
                                                    Bom</option>
                                                <option value="1" <?php if ($condicaomaterial == 1) echo 'selected'; ?>>
                                                    Hemolisado</option>
                                                <option value="2" <?php if ($condicaomaterial == 2) echo 'selected'; ?>>
                                                    Coagulado</option>
                                                <option value="3" <?php if ($condicaomaterial == 3) echo 'selected'; ?>>
                                                    Putrefação</option>
                                                <option value="4" <?php if ($condicaomaterial == 4) echo 'selected'; ?>>
                                                    Swab Seco</option>
                                                <option value="5" <?php if ($condicaomaterial == 5) echo 'selected'; ?>>
                                                    Descongelado</option>
                                                <option value="6" <?php if ($condicaomaterial == 6) echo 'selected'; ?>>
                                                    Outro</option>
                                            </select>
                                        </div>


                                        <div class="col-lg-12 form-group">
                                            <label for="observacao">Observações Gerais</label>
                                            <div>
                                                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacao" name="observacao"><?= $observacao ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="gprc_1" id="gprc_1">Número de Amostras: </span>
                                        <!-- <button class="btn btn-success" type="button" onclick="education_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button> -->
                                    </div>

                                    <div class="panel-body">
                                        <div id="education_fields"></div>
                                        <?php
                                        $count = 1;
                                        foreach ($amostra_qtd as $item) {
                                        ?>

                                            <!-- <div  class="form-group removeclass<?php echo $count ?>" id="removeclass[<?php echo $count ?>]"> -->
                                                <div style="padding-top: 10px;" class="col-sm-4">
                                                    <div class="input-group">
                                                        <label for="identificador">Amostra</label>
                                                        <input disabled type="text" class="form-control elasticteste" id="identificador[]" name="identificador[]" value="<?php echo $item->identificador ?>">
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </div>
                                </div>

                                <h3>Identificador do Proprietário</h3>

                                <div class="col-lg-4 form-group">
                                    <label for="">Nome</label>
                                    <div>
                                        <input id="" name="nomeproprietario" class="form-control input-md" value="<?= $nomeproprietario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">CEP</label>
                                    <div>
                                        <input id="" name="cepproprietario" class="form-control input-md" value="<?= $cepproprietario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="">Email</label>
                                    <div>
                                        <input id="" name="emailproprietario" class="form-control input-md" value="<?= $emailproprietario ?>">
                                    </div>
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label for="enderecoproprietario">Endereço</label>
                                    <div>
                                        <input id="enderecoproprietario" name="enderecoproprietario" class="form-control input-md" value="<?= $enderecoproprietario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">Cidade</label>
                                    <div>
                                        <input id="" name="cidadeproprietario" class="form-control input-md" value="<?= $cidadeproprietario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">Estado</label>
                                    <div>
                                        <input id="" name="estadoproprietario" class="form-control input-md" value="<?= $estadoproprietario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="">Telefone</label>
                                    <div>
                                        <input id="" name="telefoneproprietario" class="form-control input-md" value="<?= $telefoneproprietario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacaoproprietario">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacaoproprietario" name="observacaoproprietario"><?= $observacaoproprietario ?></textarea>
                                    </div>
                                </div>

                                <h3>Médico Veterinário Responsável</h3>

                                <div class="col-lg-3 form-group">
                                    <label for="">Nome</label>
                                    <div>
                                        <input id="" name="nomeveterinario" class="form-control input-md" value="<?= $nomeveterinario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">CRMV</label>
                                    <div>
                                        <input id="" name="crmvveterinario" class="form-control input-md" value="<?= $crmvveterinario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Email</label>
                                    <div>
                                        <input id="" name="emailveterinario" class="form-control input-md" value="<?= $emailveterinario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Telefone</label>
                                    <div>
                                        <input id="" name="telefoneveterinario" class="form-control input-md" value="<?= $telefoneveterinario ?>">
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacaoveterinario">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacaoveterinario" name="observacaoveterinario"><?= $observacaoveterinario ?></textarea>
                                    </div>
                                </div>


                                <h3>Histórico e Suspeita Clínica</h3>

                                <div class="col-lg-3 form-group">
                                    <label for="propriedade">Propriedade</label>
                                    <select name="propriedade" class="form-control">
                                        <option value="0" <?php if ($propriedade == 0) echo 'selected'; ?>>Rural
                                        </option>
                                        <option value="1" <?php if ($propriedade == 1) echo 'selected'; ?>>Haras
                                        </option>
                                        <option value="2" <?php if ($propriedade == 2) echo 'selected'; ?>>Granja
                                        </option>
                                        <option value="3" <?php if ($propriedade == 3) echo 'selected'; ?>>Canil
                                        </option>
                                        <option value="4" <?php if ($propriedade == 4) echo 'selected'; ?>>Gatil
                                        </option>
                                        <option value="5" <?php if ($propriedade == 5) echo 'selected'; ?>>Não se Aplica
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-3 form-group">

                                    <label for="">Número total de animais</label>
                                    <div>
                                        <input id="" name="totalanimais" class="form-control input-md" value="<?= $totalanimais ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="">Número de animais acometidos</label>
                                    <div>
                                        <input id="" name="animaisacometidos" class="form-control input-md" value="<?= $animaisacometidos ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="criacao">Tipo de Criação</label>
                                    <select name="criacao" class="form-control">
                                        <option value="0" <?php if ($criacao == 0) echo 'selected'; ?>>Intensiva
                                        </option>
                                        <option value="1" <?php if ($criacao == 1) echo 'selected'; ?>>Extensiva
                                        </option>
                                        <option value="2" <?php if ($criacao == 2) echo 'selected'; ?>>Semiextensiva
                                        </option>
                                        <option value="3" <?php if ($criacao == 3) echo 'selected'; ?>>Aberta</option>
                                        <option value="4" <?php if ($criacao == 4) echo 'selected'; ?>>Fechada</option>
                                        <option value="5" <?php if ($criacao == 5) echo 'selected'; ?>>Não se Aplica
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="suspeita">Principais Suspeitas</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="suspeita" name="suspeita"><?= $suspeita ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="observacaoclinica">Observações</label>
                                    <div>
                                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacaoclinica" name="observacaoclinica"><?= $observacaoclinica ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <button id="amostrat-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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
            </section>
        </div>
    </div>
</body>

<script>
    var room = 0;
    var total = 0;
    var count = parseFloat(<?php echo $count; ?>);
    window.onload = initPage();

    function initPage() {
        document.getElementById("gprc_1").textContent = 'Número de Amostras: ' + parseFloat(count - 1);
    }

    function education_fields() {
        room--;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        divtest.setAttribute("id", 'removeclass[' + room + ']');
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div style="padding-top: 10px;" class="col-sm-4"> <div class="input-group"><label for="identificador">Identificador</label> <input type="text" class="form-control elasticteste" id="identificador[]" name="identificador[]" ><button class="btn btn-danger" type="button" id="button[' +
            room + ']" onclick="remove_education_fields(' + room +
            ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div></div>';


        objTo.appendChild(divtest);

    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
    m
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