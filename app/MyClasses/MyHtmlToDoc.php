<?php
namespace App\MyClasses;
use App\MyClasses\HTML_TO_DOC;
use Alert;

class MyHtmlToDoc
{
    private $language;
    private $totalTables;
    public function  __construct($language, $totalTables)
    {
        $this->language = $language;
        $this->totalTables = $totalTables;
    }
    public function generateDesired()
    {
        $htd = new HTML_TO_DOC();

        $htmlContent ="";
        
        $path = '/home/warkaordercom/public_html/mystorage/public/generatedTables/satrt_of_seat.txt';
        $handle = fopen($path, 'r');
        $start = (int)fread($handle, filesize($path));
        fclose($handle);
        
        $final = ceil($this->totalTables/2 + $start);

        $code1 = rand(1000,9999);
        $code2 = rand(1000,9999);

        if ($this->language == 'amharic') {
        
        
        for($i = $start; $i < $final; $i++){
            $code1 = rand(1000,9999);
            $code2 = rand(1000,9999);

            $seat1 = $i + 1000;
            $seat2 = $i + $final + 1000 - $start;

            $htmlContent .= "<table border = 2px solid><thead ><tr>";

            $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th>";
            $htmlContent .= "<th ></th>";
            $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th></tr></thead>";

            $htmlContent .= "<tbody> <tr>"; 
            $htmlContent .= "<td style='font:19px;'>አስተናጋጅ መጠበቅ ቀረ!<i style='color:blue; font:19px;'> warkaorder.com </i> ይግቡና ያሉበትን ካፌ/ሆቴል ይምረጡ። ደስ ያሎትን መርጠው  ወደ 'Cart' ይጨምሩ። ቀጥሎም <strong>'Cart/ለማዘዝ'</strong> የሚለውን ይንኩ  የወንበር ቁጥር = $seat1 ኮድ = $code1 በማስገባት ይዘዙን፣ ትዕዛዝዎ ያሉበት ድረስ እናመጣሎታለን።</td>";
            $htmlContent .= "<td > </td>";
            $htmlContent .= "<td style='font:19px;'>አስተናጋጅ መጠበቅ ቀረ!<i style='color:blue; font:19px;'> warkaorder.com </i> ይግቡና ያሉበትን ካፌ/ሆቴል ይምረጡ። ደስ ያሎትን መርጠው  ወደ 'Cart' ይጨምሩ። ቀጥሎም ትዕዛዝ ለመላክ የሚለውን ይንኩ  የወንበር ቁጥር = $seat2 ኮድ = $code2 በማስገባት ይዘዙን፣ ትዕዛዝዎ ያሉበት ድረስ እናመጣሎታለን።";

            $htmlContent .= "</td></tr></tbody></table><br>";
            }
        }
        elseif ($this->language == 'english') {
        for($i = $start; $i < $final; $i++){
            $code1 = rand(1000,9999);
            $code2 = rand(1000,9999);

            $seat1 = $i + 1000;
            $seat2 = $i + $final + 1000 - $start; 

            $htmlContent .= "<table border = 2px solid><thead ><tr>";

            $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th>";
            $htmlContent .= "<th ></th>";
            $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th></tr></thead>";

            $htmlContent .= "<tbody> <tr>"; 
            $htmlContent .= "<td style='font:22px;'>WELCOME! Don't wait anyone.Just type <i style='color:blue; font:22px'> warkaorder.com </i> select us, Add whatever you want to the cart, then use  seat number = $seat1 code = $code1 then hit <i style='color:green;'><strong>Place Order</strong></i> we'll receive your order.</td>";
            $htmlContent .= "<td > </td>";
            $htmlContent .= "<td style='font:22px;'>WELCOME! Don't wait anyone.Just type <i style='color:blue; font:22px'> warkaorder.com </i> select us, Add whatever you want to the cart, then use  seat number = $seat2 code = $code2 then hit <i style='color:green;'><strong>Place Order</strong></i> we'll receive your order.</td>";;

            $htmlContent .= "</td></tr></tbody></table><br>";
            }
        }
        elseif ($this->language == 'oromiya') {
            for($i = $start; $i < $final; $i++){
                $code1 = rand(1000,9999);
                $code2 = rand(1000,9999);

                $seat1 = $i + 1000;
                $seat2 = $i + $final + 1000 - $start;
    
                $htmlContent .= "<table border = 2px solid><thead ><tr>";
    
                $htmlContent .= "<th><strong class='text-center'> WARKA ORDER</strong></th>";
                $htmlContent .= "<th ></th>";
                $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th></tr></thead>";
    
                $htmlContent .= "<tbody> <tr>"; 
                $htmlContent .= "<td style='font:22px;'>Kcessummeessitoonni hin dhufnee? Homaa hin dhiphatinaa! <i style='color:blue; font:22px'> warkaorder.com </i> seenaatii kaaffee keessa jirtan filadhaa! waan feetan filachuun <i style='color:green;'><strong>Add to Cart</strong></i> tuqaa! Itti aansuun <i style='color:green;'>ለማዘዝ/Cart</i> tuqaa.Itti aansuun lakkoofsa teessoo = $seat1 kood = $code1 galchuudhaan nu ajajaa! </td>";
                $htmlContent .= "<td > </td>";
                $htmlContent .= "<td style='font:22px;'>Kcessummeessitoonni hin dhufnee? Homaa hin dhiphatinaa! <i style='color:blue; font:22px'> warkaorder.com </i> seenaatii kaaffee keessa jirtan filadhaa! waan feetan filachuun <i style='color:green;'><strong>Add to Cart</strong></i> tuqaa! Itti aansuun <i style='color:green;'>ለማዘዝ/Cart</i> tuqaa.Itti aansuun lakkoofsa teessoo = $seat2 kood = $code2 galchuudhaan nu ajajaa!";
    
                $htmlContent .= "</td></tr></tbody></table><br>";
            }
        }
        $handle = fopen($path, 'w');
        fwrite($handle, $start + $this->totalTables + 1);
        fclose($handle);

        $x = $htd->createDoc($htmlContent, "Table_id_for_".auth()->user()->org, true);

        Alert::success('Table id generated and downloaded successfully');
        return redirect()->route('home');
        
        
    }

}

?>