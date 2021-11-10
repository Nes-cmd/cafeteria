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
        $start = 6;
        
        if ($this->language == 'amharic') {
           
        for($i = $start; $i < ($this->totalTables + $start)/2; $i++){
            $code1 = rand(1000,9999);
            $code2 = rand(1000,9999);

            $seat1 = $i+1000;
            $seat2 = $i+ceil($this->totalTables/2)+1000 - $start ;

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
        }
        elseif ($this->language == 'english') {
        for($i = $start; $i < ($this->totalTables + $start)/2; $i++){
            $code1 = rand(1000,9999);
            $code2 = rand(1000,9999);

            $seat1 = $i+1000;
            $seat2 = $i+ceil($this->totalTables/2)+1000 - $start ;

            $htmlContent .= "<table border = 2px solid><thead ><tr>";

            $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th>";
            $htmlContent .= "<th ></th>";
            $htmlContent .= "<th><strong class='text-center'>WARKA ORDER</strong></th></tr></thead>";

            $htmlContent .= "<tbody> <tr>"; 
            $htmlContent .= "<td style='font:21px;'>WELCOME! Don't wait anyone.Just type <i style='color:blue; font:21px'> warkaorder.com </i> select us, choose whatever you want, then use  seat number = $seat1 code = $code1 Hit ወደ ካፌው ትዕዛዝ ላክ, we'll receive your order</td>";
            $htmlContent .= "<td > </td>";
            $htmlContent .= "<td style='font:21px;'>WELCOME! Don't wait anyone.Just type <i style='color:blue; font:21px'> warkaorder.com </i> select us, choose whatever you want, then use  seat number = $seat2 code = $code2 Hit ወደ ካፌው ትዕዛዝ ላክ, we'll receive your order</td>";;

            $htmlContent .= "</td></tr></tbody></table><br>";
            }
        }
        elseif ($this->language == 'oromiya') {
            for($i = $start; $i < ($this->totalTables + $start)/2; $i++){
                $code1 = rand(1000,9999);
                $code2 = rand(1000,9999);
    
                $seat1 = $i+1000;
                $seat2 = $i+ceil($this->totalTables/2)+1000 - $start ;
    
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
        }
       

        $x = $htd->createDoc($htmlContent, "Table_id_for_".auth()->user()->org, true);

        Alert::success('Table id generated and downloaded successfully');
        return redirect()->route('home');
        
        
    }

}

?>