<?php

$this->load->library('Pdf');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
               require_once(dirname(__FILE__).'/lang/eng.php');
               $pdf->setLanguageArray($l);
}
// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

extract($amostra);
$especie = formatEspecie($especie);
$materialrecebido = formatMaterial($materialrecebido);
$data = formatarData($data);
$encaminhamento = $encaminhamento == 0 ? 'Exame' : 'Vacina';
$formaenvio = formatEnvio($formaenvio);
$acondicionamento = formatAcondicionamento($acondicionamento);
$materialrecebido = formatMaterial($materialrecebido);
$condicaomaterial = formatMaterialCondicao($condicaomaterial);
$espacos = espaces(10);
$data = formatarData($data);
$data_registro = formatarData($data_registro);
$tipocriacao = formatTipoCriacao($criacao);
$propriedade = formatPropriedade($propriedade);
$html =
<<<EOD

<h6 align="center">LABORTAT??RIO DE VIROLOGIA</h6>
        <font align="center" size="10">Curso de Medicina Veterin??ria</font>
        <br/><font align="center" size="10">Casa 4, Campus Uruguaiana, UNIPAMPA</font>
        <br/><font align="center" size="10">BR 472, km 592, CEP 97.500-008. Uruguaiana, RS</font>
        <br/><font align="center" size="10">e-mail para contato: <link href='#'>mario.brum@unipampa.edu.br</link></font>
</br>

<style type="text/css">

.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>
<h6 align="center" >Dados-LV 0000/0{$amostra_id}</h6>    
<h6><i>Dados do Propriet??rio</i></h6>

<br/><font align="left" size="10">Nome Propriet??rio: $nomeproprietario </font>
<br/><font align="left" size="10">Endere??o: $enderecoproprietario</font>
<br/><font align="left" size="10">Cidade: $cidadeproprietario </font>
<br/><font align="left" size="10">CEP: $cepproprietario </font>
<font size="10">Fone: $telefoneproprietario</font>
<br/><font align="left" size="10">Observa????es: $observacaoproprietario </font>
<font align="left" size="10" >&nbsp; Fax: </font>

<h6><i>Identifica????o da amostra</i> </h6>
<font align="left" size="10">Respons??vel pela coleta: $nomeveterinario</font>
<br/><font align="left" size="10">CRMV: $crmvveterinario </font>
<br/><font align="left" size="10">Email: $emailveterinario </font>
<br/><font align="left" size="10">Fone: $telefoneveterinario </font>
<br/><font align="left" size="10">Observa????es: $observacao </font>
<br/><font align="left" size="10">Encaminhamento: $encaminhamento</font>
<br/><font align="left" size="10">Forma de envio: $formaenvio </font>
<font align="left" size="10">Acondicionamento: $acondicionamento</font>
<br/><font align="left" size="10">Condi????o do Material : $condicaomaterial </font>
<font align="left" size="10">Observa????es Gerais: $observacaoveterinario </font>
<font align="left" size="10">Data: $data</font>
<font align="left" size="10">Material: $materialrecebido</font> 
<br /> <font align="left" size="10">Esp??cie: $especie</font> 

<br/><font align="left" size="10">Recebimento: $data</font> 
<font align="left" size="10">Finaliza????o da An??lise: $data</font>

<h6>M??dico Veterin??rio Respons??vel</h6>
<font align="left" size="10">Nome: $nomeveterinario</font>
<br/><font align="left" size="10">CRMV: $crmvveterinario</font>
<br/><font align="left" size="10">Email: $emailveterinario</font>
<br/><font align="left" size="10">Telefone: $telefoneveterinario</font>
<br/><font align="left" size="10">Observa????es: $observacaoveterinario</font>

<h6>Hist??rico e Suspeita Cl??nica</h6>
<font align="left" size="10">Propriedade: $propriedade</font>
<br/><font align="left" size="10"> N??mero total de animais: $totalanimais </font>
<font align="left" size="10">N??mero de animais acometidos: $animaisacometidos</font>
<br/><font align="left" size="10">Tipo de Cria????o : $tipocriacao </font> 

<br/><font align="left" size="10">Principais Suspeitas: $suspeita</font>

<br/><br/>

<font align="center" size="10">M??rio Celso Sperotto Brum</font>
<br/><font align="center" size="10">Laborat??rio de Virologia</font>
<br/><font align="center" size="10">CRMV-RS 7331</font>
<br/><font align="center" size="10">Campus Uruguaiana - UNIPAMPA</font>


EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('LaudoVirol??gico.pdf', 'I');