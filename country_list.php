<?php
    // Read txt file
    $file_countries = realpath(dirname(__FILE__)) . "/country.txt";
    $handler = fopen($file_countries, "r") or die("Unable to open file!");
    $content = fread($handler,filesize($file_countries));        
    fclose($handler);
    
    // Prase txt to array
    $countries = explode("\n", $content);
    
    // Sort by country name
    foreach($countries as $country) {
        $code_end = strpos($country, " "); 
        $country_name = trim(substr($country, $code_end));
        $arr_countries[$country_name] = substr($country, 0, $code_end);       
    }
    ksort($arr_countries);

    // Generate output
    $output = '<table cellpadding="2" border="0">';
    foreach($arr_countries as $key => $val) { 
        $output .= '<tr><td>' . $key . '</td><td>' . $val . '</td></tr>';    
    }
    $output .= '</table>';
    echo $output;
    
?>