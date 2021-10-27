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
extract($exame);
extract($tecnica);
$protocolo = 'LV' . $amostra_id . date("/y\ ", strtotime($data)); //data registro
$especie = formatEspecie($especie);
$materialrecebido = formatMaterial($materialrecebido);
$dataformatada = formatarData($data);
$dataRegistroFormatada = formatarData($data_registro);
$retornaResultados =  retornaResultadosExame($exame);
$header = retornaCabecalho();
$dadosCliente = retornaDadosProprietario($amostra);
$identificacaoAmostra= retornaIdentificacaoAmostra($amostra);
$tipocriacao = formatTipoCriacao($criacao);
$propriedade = formatPropriedade($propriedade);
$espaces = '&nbsp';
$html =
<<<EOD
$header
<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
        border-color: #93a1a1;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: #93a1a1;
        color: #002b36;
        background-color: #fdf6e3;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: #93a1a1;
        color: #fdf6e3;
        background-color: #657b83;
    }

    .tg .tg-cly1 {
        text-align: left;
        vertical-align: middle
    }

    .tg .tg-alz1 {
        background-color: #eee8d5;
        text-align: left;
        vertical-align: top
    }
</style>
<h6 align="center">Laudo do Exame Virológico-{$protocolo}</h6>
<h6><i>Dados do Cliente</i></h6>
<br />
<font align="left" size="10">Proprietário: $nomeproprietario </font>
<font align="center" size="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Endereço: $enderecoproprietario</font>
<font align="left" size="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cidade: $cidadeproprietario </font>
<br />
<font align="left" size="10">Fone: $telefoneproprietario</font>

<h6><i>Identificação da amostra</i> </h6>
<font align="left" size="10">Responsável pela coleta: $nomeveterinario</font>
<font align="left" size="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Material: $materialrecebido</font>
<br />
<font align="left" size="10">Espécie: $especie</font>
<br />
<font align="left" size="10">Recebimento: $dataformatada</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font align="left" size="10">Data Registro: $dataRegistroFormatada</font>

<h6>Médico Veterinário Responsável</h6>
<font align="left" size="10">Nome: $nomeveterinario&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> 
<font align="left" size="10">CRMV: $crmvveterinario</font>
<br/><font align="left" size="10">Email: $emailveterinario</font>
<br/><font align="left" size="10">Telefone: $telefoneveterinario</font>
<br/><font align="left" size="10">Observações: $observacaoveterinario</font>

<h6>Histórico e Suspeita Clínica</h6>
<font align="left" size="10">Propriedade: $propriedade</font>
<br />
<font align="left" size="10">Número total de animais: $totalanimais </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font align="left" size="10">Número de animais acometidos: $animaisacometidos</font>
<br />
<font align="left" size="10">Tipo de Criação : $tipocriacao </font>

<br />
<font align="left" size="10">Principais Suspeitas: $suspeita</font>
<h6>Resultados dos Exames </h6>
<table border="1" cellspacing="5" cellpadding="5">
	<tr>
		<th><h6>Amostra</h6></th>
		<th width="200"><h6>Técnica</h6></th>
		<th ><h6>Suspeita</h6></th>
		<th><h6>Resultado</h6></th>
	</tr>
    
    </table>
	

EOD;

$footer=<<<EOD
<br/><br/>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>
<font align="center" size="10">Mário Celso Sperotto Brum</font>
<br/><font align="center" size="10">Laboratório de Virologia</font>
<br/><font align="center" size="10">CRMV-RS 7331</font>
<br/><font align="center" size="10">Campus Uruguaiana - UNIPAMPA</font>
EOD;
// Print text using writeHTMLCell()
// Print text using writeHTMLCell()
$pdf->SetTitle("Laudo Virológico");

$pdf->writeHTMLCell(0, 0, '', '', $html.$retornaResultados.$footer, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('LaudoVirológico.pdf', 'I');