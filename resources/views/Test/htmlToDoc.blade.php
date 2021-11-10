
<?php
include_once 'phpFile/HTML_TO_DOC.php';
$htd = new HTML_TO_DOC();


$htmlContent ="";
$requirement = 20;
$start = 4;
for($i = $start; $i < ($requirement + $start)/2; $i++){
	$code1 = rand(1000,9999);
	$code2 = rand(1000,9999);

    $seat1 = $i+1000;
    $seat2 = $i+ceil($requirement/2)+1000 - $start ;

	$htmlContent .= "<table border = 2px solid><thead ><tr>";

	$htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th>";
	$htmlContent .= "<th ></th>";
	$htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th></tr></thead>";

	$htmlContent .= "<tbody> <tr>"; 
	$htmlContent .= "<td style='font:21px;'>አስተናጋጆች አልመጡምን? ምንም አይጨነቁ <i style='color:blue; font:21px'> warkaorder.com </i> ይግቡና ያሉበትን ካፌ ይምረጡ። ደስ ያሎትን  ወደ ማዘዣው ያስገቡ። ቀጥሎም ትዕዛዝ ለመላክ የሚለውን ይንኩ  የወንበር ቁጥር = $seat1 ኮድ = $code1 በማስገባት ይዘዙን፣ ትዕዛዝዎ ያሉበት ድረስ እናመጣሎታለን።</td>";
    $htmlContent .= "<td > </td>";
    $htmlContent .= "<td style='font:21px;'>አስተናጋጆች አልመጡምን? ምንም አይጨነቁ <i style='color:blue; font:21px'> warkaorder.com </i> ይግቡና ያሉበትን ካፌ ይምረጡ። ደስ ያሎትን  ወደ ማዘዣው ያስገቡ። ቀጥሎም ትዕዛዝ ለመላክ የሚለውን ይንኩ  የወንበር ቁጥር = $seat2 ኮድ = $code2 በማስገባት ይዘዙን፣ ትዕዛዝዎ ያሉበት ድረስ እናመጣሎታለን።";

    $htmlContent .= "</td></tr></tbody></table><br>";
}
$htd->createDoc($htmlContent, "my-document", 1);

?>





