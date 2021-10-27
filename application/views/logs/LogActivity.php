  <style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
  </style>

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
              <section class="content-header">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h3 class="panel-title" style="text-align: center;">
                                      <i class="fas fa-history"></i>
                                      <strong>Auditoria de Uso
                                          <!-- <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Definir"><i class="glyphicon glyphicon-comment"></i></a> -->
                                      </strong>
                                  </h3>
                              </div>
                          </div>
                      </div>
              </section>
              <section class="content" style="padding-top: 1px;">

                  <!-- row -->
                  <div class="row">
                      <div class="col-md-12">
                          <div class="panel-body">
                              <!-- The time line -->
                              <ul class="timeline">
                                  <!-- timeline time label -->
                                  <?php
                  // ksort ordena uma array pelo id em ordem descrescente
                  krsort($log_list);
                  $inicio = true;
                  $date;
                   // isso aqui ta pronto, é pra ordenar as datas, confere a foto q vou lhe enviar!
                  foreach ($log_list as $l) {
                    if ($inicio || $l->date != $date) {
                      $date = $l->date;
                      $inicio = false; ?>

                                  <li class="time-label" align="center">
                                      <span class="bg-red">
                                          <?php echo formatarData($l->date) ?>
                                      </span>
                                  </li>

                                  <?php } ?>

                                  <li>

                                      <?php
                    // var_dump($l->action);
                    // exit;
                    // die;
                      if ($l->action_type == 'insert') { ?>
                                      <i class=" fa fa-save bg-green"></i>
                                      <?php } elseif ($l->action_type  == 'update') { ?>
                                      <i class="fa fa-pencil bg-orange"></i>
                                      <?php } elseif ($l->action_type == 'delete') { ?>
                                      <i class="fa fa-trash bg-red"></i>

                                      <?php } ?>



                                      <div class="timeline-item" align="center">
                                          <span class="time"><i class="fa fa-clock-o"></i> <?php echo $l->time ?>
                                          </span>
                                          <h3 class="timeline-header"></i><a href="#"></a>
                                              <?php

                          //isso aqui estrutura a forma como a mensagem vai aparecer
                          // o nome do usuario em negrito e a tela(amostra) em italico
                          // $reItalico = '/-([^&$@#%""]+[^ \t\n\r\f\v])-/';
                          // $replacementItalico = '<i>$1</i>';
                          // $negrito = '/"([^&@#$%<>]+[^ \t\n\r\f\v])"/';
                          // $replacementNegrito = '<b>$1</b>';
                          
                          // $l->action ;
                          // preg_replace(
                          //   array($negrito, $reItalico),
                          //   array($replacementNegrito, $replacementItalico),
                          //   $l->action
                          // );

                          echo $l->action ?></h3>
                                      </div>
                                  </li>

                                  <?php } ?>
                              </ul>
                          </div>
                          <!-- /.col -->
                      </div>
                  </div>
                  <!-- /.row -->
              </section>
          </div>
      </div>
  </body>

  <!-- /.content-wrapper -->

  <?php $this->load->view('frame/footer_view') ?>