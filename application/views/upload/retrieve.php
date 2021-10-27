<?php

$this->db->where('amostra_id', $amostra_id);
$images = $this->db->get('upload')->result_array();

?>

<div class="row" style="padding-top: 1px">

    <div class="col-lg-12">
            <table class="table table-bordered table-striped" id="table">
                <thead>
                    <tr>
                        <th>Formato</th>
                        <th>Descrição</th>
                        <th><?= $this->lang->line('btn-actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   
                    //$images = $this->db->get('upload')->result_array();
                    foreach ($images as $row) {
                        $pieces = explode(".", $row['path']);
                        echo '<tr>';
                        if (!empty($row['path'])) {
                            echo '<td>' . $pieces[1]  . '</td>';
                            echo '<td> <a href="' . base_url() . $row['path'] . '"'  . '"><span>' .$row['alt'] .'</span>
            </a> </td>';
                    ?>
                            <td style="max-width: 20px">
                                <div class="row center">
                                    <div class="col-sm-4">
                                    <button type="submit" class="btn btn-danger" onclick="deletar(<?= $row['id'] ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
                                    </div>
                                </div>
                            </td>
                            </tr>
                    <?php
                        } else {
                            echo 'No images found.';
                        }
                    }

                    ?>
                </tbody>
            </table>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
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

                $.post("<?php echo base_url() ?>Midia/image_delete/" + id);

                alertify.success('Item Deletado com Sucesso.');
                location.reload();
            },
            'oncancel': function() {
                alertify.error('Item Não Deletado.');
            }
        }).show();
    }
</script>