<?php

session_start();  					// siempre iniciar la sesión antes de generar nada en la pagina !
$Afiliado = $_SESSION['Afiliado'];	// se recupera el nº de afiliado
if( !$Afiliado || strlen($Afiliado) == 0 ) die("<br /><h1>El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area</h1><br /></div></body></html>");

include_once '../funciones.php';

$db = db_connect();

$select = "SELECT * FROM signup";

$export = mysql_query($select,$db); 
//$fields = mysql_num_rows($export); // thanks to Eric
$fields = mysql_num_fields($export); // by KAOSFORGE

for ($i = 0; $i < $fields; $i++) {
    $col_title .= '<Cell ss:StyleID="2"><Data ss:Type="String">'.mysql_field_name($export, $i).'</Data></Cell>';
}

$col_title = '<Row>'.$col_title.'</Row>';

while($row = mysql_fetch_row($export)) {
    $line = '';
    foreach($row as $value) {
        if ((!isset($value)) OR ($value == "")) {
            $value = '<Cell ss:StyleID="1"><Data ss:Type="String"></Data></Cell>\t';
        } else {
            $value = str_replace('"', '', $value);
            $value = '<Cell ss:StyleID="1"><Data ss:Type="String">' . $value . '</Data></Cell>\t';
        }
        $line .= $value;
    }
    $data .= trim("<Row>".$line."</Row>")."\n";
}

$data = str_replace("\r","",$data);

header("Content-Type: application/vnd.ms-excel;");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");

$xls_header = '<?xml version="1.0" encoding="utf-8"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" xmlns:html="http://www.w3.org/TR/REC-html40">
<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
<Author></Author>
<LastAuthor></LastAuthor>
<Company></Company>
</DocumentProperties>
<Styles>
<Style ss:ID="1">
<Alignment ss:Horizontal="Left"/>
</Style>
<Style ss:ID="2">
<Alignment ss:Horizontal="Left"/>
<Font ss:Bold="1"/>
</Style>

</Styles>
<Worksheet ss:Name="Export">
<Table>';

$xls_footer = '</Table>
<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
<Selected/>
<FreezePanes/>
<FrozenNoSplit/>
<SplitHorizontal>1</SplitHorizontal>
<TopRowBottomPane>1</TopRowBottomPane>
</WorksheetOptions>
</Worksheet>
</Workbook>';

print $xls_header.$col_title.$data.$xls_footer;
exit;

?>