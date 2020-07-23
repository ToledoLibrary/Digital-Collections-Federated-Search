<?php
    $url = "https://tlcpllochhis.omeka.net/api/items";

    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    
	//var_dump(json_decode($json, true));
	print("<pre>".print_r($data,true)."</pre>");
    
    $fp = fopen('php://output', 'w');

foreach ($data as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
?>