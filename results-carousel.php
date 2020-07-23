<?php
$keyword_to_change = $_GET["keyword"];
$keyword = str_replace(' ', '%20', $keyword_to_change);
$errormessagenumber = 0;
?>

<?php include 'header.php';?>
	
	<!-- Stylesheets -->
 

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="./assets/owlcarousel/assets/owl.carousel.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->



    <!-- Yeah i know js should not be in header. Its required for demos.-->

    <!-- javascript -->
    <script src="./assets/vendors/jquery.min.js"></script>
    <script src="./assets/owlcarousel/owl.carousel.js"></script>
    
       <script src="./assets/vendors/highlight.js"></script>
    <script src="./assets/js/app.js"></script>

<style>

.internet-archive p img {
  max-height: 100px;
  width:auto;
}

header.main-header #primary-navigation>nav .btn-group {
margin: 0 .23vw;
}

strong {
	font-weight:bold;
}

.topmargin {
	margin-top:0%;
}

.topmargin2 {
	margin-top:0%;
}

@media screen and (max-width: 992px) {
 .topmargin {
	margin-top:15%;
}
.topmargin2 {
	margin-top:5%;
}
}

.owl-prev, .owl-next {
	font-size:2rem !important;
text-align: center;
pointer-events: all;
color:rgba(29,29,29,0.3) !important;
background:none !important;
}

.owl-prev:hover, .owl-next:hover {
color:#cd202c !important; 
background:none !important;
}


.owl-nav {
margin-top:0 !important;
position: absolute;
top: 3vw;
bottom: 0;
left: -3vw;
right: -3vw;
font-size: 1rem;
display: -ms-flexbox;
display: flex;
-ms-flex-pack: justify;
justify-content: space-between;
-ms-flex-align: center;
align-items: start;
pointer-events: none;
}



</style>


 <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                stagePadding: 50,
                margin: 10,
                nav: true,
                navText: ["<i class=\"fa fa-chevron-left\"></i>","<i class=\"fa fa-chevron-right\"></i>"],
                loop: true,
                dots: false,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 3
                  }
                }
              })
            })
          </script>



<div class="row" style="margin: 2% 3%;">

<div class="col-md-2 col-lg-2 hidden-sm-down"></div> 

<div class="col-md-8 col-lg-8 col-sm-24 topmargin2">
<?php echo '<h3 style="border-bottom: 1px solid gray;">INTERNET ARCHIVE<strong style="font-size:17px;"> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Select ebooks from our collection have also been included in the Internet Archive; we recommend viewing ebooks through this platform due to the high degree of accessibility and excellent reading experience."></i> - <a href=\'https://archive.org/search.php?query=%28'.$keyword.'%29%20AND%20collection%3A%28toledolucascountypubliclibrary%29\'>VIEW ALL</a></strong></h2>'; ?>

	
	<?php
	// THIS IS INTERNET ARCHIVE

$keyword_to_change = $_GET["keyword"];
$keyword = str_replace(' ', '%20', $keyword_to_change);


	$rss = new DOMDocument();
	$rss->load('https://archive.org/advancedsearch.php?q='.$keyword.'+AND+collection%3Atoledolucascountypubliclibrary&fl%5B%5D=description&fl%5B%5D=identifier&fl%5B%5D=source&fl%5B%5D=title&sort%5B%5D=&sort%5B%5D=&sort%5B%5D=&rows=10&page=1&callback=callback&output=rss#raw');
	
	//print_r($rss);
	
	$feed = array();
	
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	
	if(empty($feed[0])){
echo "Hmm... We didn't find any results for <strong>$keyword_to_change</strong> in Internet Archive. Please try again. ";

if($errormessagenumber == 0) {

echo "<br/>";
echo "You could try searching for: ";
echo "<ul>";

echo "<li>An area like the <button onclick=\"location.href='results.php?keyword=Maumee';\" name='keyword' value=\"Maumee\">Maumee</button></li>";

echo "<li>A topic like <button style='margin:10px 0;' onclick=\"location.href='results.php?keyword=War';\" name='keyword' value=\"War\">War</button></li>";

echo "<li>or a year like <button onclick=\"location.href='results.php?keyword=1920';\" name='keyword' value='1920'>1920</button></li>";

echo "</ul>";


$errormessagenumber = 1;

}

		}
	
	$limit = 10;
	if(!empty($feed[0])){
	
	
           echo "<div class=\"owl-carousel owl-theme\">";
           
	
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$title = substr($title, 0, 65);

		$link = $feed[$x]['link'];

		$img_id = explode("https://archive.org/details/", $link);
		

echo "<div class=\"item col-md-24 col-lg-24\">";
				echo "<div class=\"col-md-24 col-lg-24\">";
	    		    echo "<a href=\"$link\"><img style=\"height:150px;\" src=\"https://archive.org/services/get-item-image.php?identifier=$img_id[1]\"></a>";
	    		    
	    		    echo "<a href=\"$link\"><span>$title</span></a>";
				echo "</div>";
	        echo "</div>";
	        
	}
	echo "</div>";
	//echo "<button type=\"button\" role=\"presentation\" class=\"owl-next\"><i class=\"fa fa-chevron-right\"></i></button>";
	}
?>

	
    	</div>
    	
    	<!-- <div style="border-right: solid 1px black;x;max-height: 100%;height: 500px;" class="col-md-2 col-md-pull-1 col-lg-2 col-lg-pull-1 hidden-sm-down"></div> -->    <div class="col-md-2 col-lg-2 hidden-sm-down"></div>  
    
    	<div class="col-md-8 col-lg-8 col-sm-24 topmargin">
	<?php echo '<h3 style="border-bottom: 1px solid gray;">DIGITAL COLLECTIONS <span style="font-size:17px;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The bulk of our digital resources can be found here, including photographs, historical documents, correspondence, genealogical records, maps, and more."></i> - <a href=\'https://www.ohiomemory.org/digital/search/collection/p16007coll33/searchterm/'.$keyword.'/field//mode/all/conn/\'>VIEW ALL</a></span></h2>'; ?>
	
<?php

// THIS IS CDM DIGITAL COLLECTIONS

	$cdmcollection = "p16007coll33"; //change this
	$cdmserver = "server16007"; //change this
	$basecdmurl = "https://ohiomemory.org"; //change this - probably too https://$cdmserver.contentdm.oclc.org/ - you can view this by navigating to your collection and looking at the URL
	$keyword_to_change = $_GET["keyword"];
	$keyword = str_replace(' ', '%20', $keyword_to_change);

//$query_url = 'https://'.$cdmserver.'.contentdm.oclc.org/dmwebservices/index.php?q=dmQuery/p16007coll33/CISOSEARCHALL%5'.$keyword.'%5all%5and/title!subjec!descri/title/10/1/0/0/0/0/xml';



//print_r($query_url);

$xmlData = file_get_contents('https://'.$cdmserver.'.contentdm.oclc.org/dmwebservices/index.php?q=dmQuery/p16007coll33/CISOSEARCHALL^'.$keyword.'^all^and/title!subjec!descri/title/10/1/1/0/0/0/xml');

// Create the document object

$xml = simplexml_load_string($xmlData);

//print_r($xml);

$pager = array();

// How many hits did the search yield

foreach ($xml->xpath('//pager') as $hits) {
        $pager[] = array(
                'start' => (string) $hits->start,
                'total' => (string) $hits->total
        );
}

$result = array();

// Get the nodes and loop them

foreach ($xml->xpath('//record') as $record) {
        $result[] = array(
                'collection' => (string) $record->collection,
                'title' => (string) $record->title,
                'subject' => (string) $record->subjec,
                'descri' => (string) $record->descri,
                'thumb' => (string) $record->pointer
        );
}

$numberOfHits = $pager[0]["total"];
$resultCount = count($result) - 1;

if($numberOfHits == 0) {
echo "Hmm... We didn't find any results for <strong>$keyword_to_change</strong> in our Digital Collections. Please try again.";

if($errormessagenumber == 0) {

echo "<br/>";
echo "You could try searching for: ";
echo "<ul>";

echo "<li>An area like the <button onclick=\"location.href='results.php?keyword=Maumee';\" name='keyword' value=\"Maumee\">Maumee</button></li>";

echo "<li>A topic like <button style='margin:10px 0;' onclick=\"location.href='results.php?keyword=War';\" name='keyword' value=\"War\">War</button></li>";

echo "<li>or a year like <button onclick=\"location.href='results.php?keyword=1920';\" name='keyword' value='1920'>1920</button></li>";

echo "</ul>";


$errormessagenumber = 1;

}

}


?>      
               
                        <?php
           $secondcounter = 0;       
           
           echo "<div class=\"owl-carousel owl-theme\">";
           
                 
for ($i=0;$i<=$resultCount;$i++) {
        $title = $result[$i]["title"];
        $title = substr($title, 0, 65);
        
        $subject = $result[$i]["subject"];
        $description = $result[$i]["descri"];
        $description_mobile = substr($description, 0, 150);
        $thumb = $result[$i]["thumb"];
        $collection = $result[$i]["collection"];
        $collection = str_ireplace("/", "", "$collection");
        //$urlStr = 'https://server16007.contentdm.oclc.org/dmGetItemInfoWebPage.php?collection='.$collection.'&pointer='.$thumb.'';
        $urlStr = 'https://www.ohiomemory.org/digital/collection/'.$collection.'/id/'.$thumb.'/rec/1';
        $imgStr = "https://ohiomemory.org/utils/getthumbnail/collection/$collection/id/" . $thumb;
        //if ($collection == "p16007coll33" & $secondcounter <= 2) {
			echo "<div class=\"item col-md-24 col-lg-24\">";
				echo "<div class=\"col-md-24 col-lg-24\">";
	    		    echo "<a href=\"$urlStr\"><img style=\"height:150px;\" src=\"$imgStr\"></a>";
	    		    
	    		    echo "<a href=\"$urlStr\"><span>$title</span></a>";
				echo "</div>";
	        echo "</div>";
	        

          
	        
	        
	        
	        
	    //    $secondcounter++;
        //}
}

echo "</div>";

?>
                    
	
    	</div>
    	
  
 </div>
 


 
<div class="row" style="margin: 2% 3%;">
<div class="col-md-2 col-lg-2 hidden-sm-down"></div> 

    	<div class="col-md-8 col-lg-8 col-sm-24 topmargin">
    	<?php echo '<h3 style="border-bottom: 1px solid gray;">COMMUNITY PHOTO ALBUM <span style="font-size:17px;"> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="These images have been contributed to the library by members of the public."></i> - 
    	 <a href=\'https://www.ohiomemory.org/digital/search/collection/p16007coll31/searchterm/'.$keyword.'/field//mode/all/conn/\'>VIEW ALL</a></span></h2>'; ?>
    


<?php

// THIS IS CDM COMMUNITY PHOTO ALBUM

	$cdmcollection = "p16007coll31"; //change this
	$cdmserver = "server16007"; //change this
	$basecdmurl = "https://ohiomemory.org"; //change this - probably too https://$cdmserver.contentdm.oclc.org/ - you can view this by navigating to your collection and looking at the URL
	$keyword_to_change = $_GET["keyword"];
	$keyword = str_replace(' ', '%20', $keyword_to_change);

$xmlData = file_get_contents('https://'.$cdmserver.'.contentdm.oclc.org/dmwebservices/index.php?q=dmQuery/p16007coll31/CISOSEARCHALL^'.$keyword.'^all^and/title!subjec!descri/title/10/1/1/0/0/0/xml');

// Create the document object

$xml = simplexml_load_string($xmlData);

//print_r($xml);

$pager = array();

// How many hits did the search yield

foreach ($xml->xpath('//pager') as $hits) {
        $pager[] = array(
                'start' => (string) $hits->start,
                'total' => (string) $hits->total
        );
}

$result = array();

// Get the nodes and loop them

foreach ($xml->xpath('//record') as $record) {
        $result[] = array(
                'collection' => (string) $record->collection,
                'title' => (string) $record->title,
                'subject' => (string) $record->subjec,
                'descri' => (string) $record->descri,
                'thumb' => (string) $record->pointer
        );
}

$numberOfHits = $pager[0]["total"];
$resultCount = count($result) - 1;

if($numberOfHits == 0) {
echo "Hmm... We didn't find any results for <strong>$keyword_to_change</strong> in our Community Photo Album. Please try again.";


if($errormessagenumber == 0) {

echo "<br/>";
echo "You could try searching for: ";
echo "<ul>";

echo "<li>An area like the <button onclick=\"location.href='results.php?keyword=Maumee';\" name='keyword' value=\"Maumee\">Maumee</button></li>";

echo "<li>A topic like <button style='margin:10px 0;' onclick=\"location.href='results.php?keyword=War';\" name='keyword' value=\"War\">War</button></li>";

echo "<li>or a year like <button onclick=\"location.href='results.php?keyword=1920';\" name='keyword' value='1920'>1920</button></li>";

echo "</ul>";


$errormessagenumber = 1;

}

}

?>      
             
                        <?php
                        
                        echo "<div class=\"owl-carousel owl-theme\">";
                        
                        
for ($i=0;$i<=$resultCount;$i++) {
        $title = $result[$i]["title"];
        $title = substr($title, 0, 65);
        
        $subject = $result[$i]["subject"];
        $description = $result[$i]["descri"];
        $description_mobile = substr($description, 0, 150);
        $thumb = $result[$i]["thumb"];
        $collection = $result[$i]["collection"];
        $collection = str_ireplace("/", "", "$collection");
        //$urlStr = 'https://server16007.contentdm.oclc.org/dmGetItemInfoWebPage.php?collection='.$collection.'&pointer='.$thumb.'';
        $urlStr = 'https://www.ohiomemory.org/digital/collection/'.$collection.'/id/'.$thumb.'/rec/1';
        $imgStr = "https://ohiomemory.org/utils/getthumbnail/collection/$collection/id/" . $thumb;
        //if ($collection == "p16007coll31") {
	        //echo "<li><a href=\"$urlStr\"><img src=\"$imgStr\"></a> <strong>$title</strong><br /><em>$description</em></li>\n";
        //}
        echo "<div class=\"item col-md-24 col-lg-24\">";
				echo "<div class=\"col-md-24 col-lg-24\">";
	    		    echo "<a href=\"$urlStr\"><img style=\"height:150px;\" src=\"$imgStr\"></a>";
	    		    
	    		    echo "<a href=\"$urlStr\"><span>$title</span></a>";
				echo "</div>";
	        echo "</div>";
}


echo "</div>";


?>
              
	
    	</div>
    	
    	
    	 <!-- <div style="border-right: solid 1px black;x;max-height: 100%;height: 500px;" class="col-md-2 col-md-pull-1 col-lg-2 col-lg-pull-1 hidden-sm-down"></div> -->    <div class="col-md-2 col-lg-2 hidden-sm-down"></div>  
    
    		
    	<div class="col-md-8 col-lg-8 col-sm-24 topmargin">
	    	<?php echo '<h3 style="border-bottom: 1px solid gray;">NEWSPAPERS<span style="font-size:17px;"> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="This collection contains newspapers from Toledo that have been digitized and made full-text searchable."></i> - <a href=\'https://www.ohiomemory.org/digital/search/collection/p16007coll77/searchterm/'.$keyword.'/field//mode/all/conn/\'>VIEW ALL</a></span></h2>'; ?>

<?php

// THIS IS CDM NEWSPAPERS

	$cdmcollection = "p16007coll77"; //change this
	$cdmserver = "server16007"; //change this
	$basecdmurl = "https://ohiomemory.org"; //change this - probably too https://$cdmserver.contentdm.oclc.org/ - you can view this by navigating to your collection and looking at the URL
	$keyword_to_change = $_GET["keyword"];
	$keyword = str_replace(' ', '%20', $keyword_to_change);

$xmlData = file_get_contents('https://'.$cdmserver.'.contentdm.oclc.org/dmwebservices/index.php?q=dmQuery/p16007coll77/CISOSEARCHALL^'.$keyword.'^all^and/title!subjec!descri/title/10/1/1/0/0/0/xml');

// Create the document object

$xml = simplexml_load_string($xmlData);

//print_r($xml);

$pager = array();

// How many hits did the search yield

foreach ($xml->xpath('//pager') as $hits) {
        $pager[] = array(
                'start' => (string) $hits->start,
                'total' => (string) $hits->total
        );
}

$result = array();

// Get the nodes and loop them

foreach ($xml->xpath('//record') as $record) {
        $result[] = array(
                'collection' => (string) $record->collection,
                'title' => (string) $record->title,
                'subject' => (string) $record->subjec,
                'descri' => (string) $record->descri,
                'thumb' => (string) $record->pointer
        );
}

$numberOfHits = $pager[0]["total"];
$resultCount = count($result) - 1;

if($numberOfHits == 0) {
echo "Hmm... We didn't find any results for <strong>$keyword_to_change</strong> in our Newspaper Collections. Please try again.";

if($errormessagenumber == 0) {

echo "<br/>";
echo "You could try searching for: ";
echo "<ul>";

echo "<li>An area like the <button onclick=\"location.href='results.php?keyword=Maumee';\" name='keyword' value=\"Maumee\">Maumee</button></li>";

echo "<li>A topic like <button style='margin:10px 0;' onclick=\"location.href='results.php?keyword=War';\" name='keyword' value=\"War\">War</button></li>";

echo "<li>or a year like <button onclick=\"location.href='results.php?keyword=1920';\" name='keyword' value='1920'>1920</button></li>";

echo "</ul>";


$errormessagenumber = 1;

}

}

?>      
               
                        <?php
                        
                        echo "<div class=\"owl-carousel owl-theme\">";
                        
                        
for ($i=0;$i<=$resultCount;$i++) {
        $title = $result[$i]["title"];
        $title = substr($title, 0, 65);
        
        $subject = $result[$i]["subject"];
        $description = $result[$i]["descri"];
        $description_mobile = substr($description, 0, 150);
        $thumb = $result[$i]["thumb"];
        $collection = $result[$i]["collection"];
        $collection = str_ireplace("/", "", "$collection");
        //$urlStr = 'https://server16007.contentdm.oclc.org/dmGetItemInfoWebPage.php?collection='.$collection.'&pointer='.$thumb.'';
        $urlStr = 'https://www.ohiomemory.org/digital/collection/'.$collection.'/id/'.$thumb.'/rec/1';
        $imgStr = "https://ohiomemory.org/utils/getthumbnail/collection/$collection/id/" . $thumb;
        //if ($collection == "p16007coll77") {
	        //echo "<li><a href=\"$urlStr\"><img src=\"$imgStr\"></a> <strong>$title</strong><br /><em>$description</em></li>\n";
        //}
        echo "<div class=\"item col-md-24 col-lg-24\">";
				echo "<div class=\"col-md-24 col-lg-24\">";
	    		    echo "<a href=\"$urlStr\"><img style=\"height:150px;\" src=\"$imgStr\"></a>";
	    		    
	    		    echo "<a href=\"$urlStr\"><span>$title</span></a>";
				echo "</div>";
	        echo "</div>";
}


echo "</div>";


?>
                
        
	
    	</div>
    	<!-- SPLIT --><!-- SPLIT --><!-- SPLIT --><!-- SPLIT -->
    	
    	 </div>   
 

 
<div class="row" style="margin: 2% 3%;">	
    	
    	<div class="col-md-2 col-lg-2 hidden-sm-down"></div> 
    	
    	<div class="col-md-8 col-lg-8 col-sm-24 topmargin">
	<h3 style="border-bottom: 1px solid gray;">DIGITAL EXHIBITS <strong style="font-size:17px;"> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="These exhibits curate our digitized resources and create a story to better explain their significance to our community."></i></strong></h2>
	
<?php

// THIS IS OMEKA

$keyword_omeka = strtolower($_GET["keyword"]);

function find_keyword($filename, $keyword) {
	$numberOfHits = 0;
    $f = fopen($filename, "r");
    $result = false;
    
        $result .= "<div class=\"owl-carousel owl-theme\">";
           
    while ($row = fgetcsv($f)) {
		//$keyword_column = str_replace(',', '', $row[4]);
    	//$keyword_column2 = str_replace(' ', '', $keyword_column);
    	//$keyword_column3 = strtolower($keyword_column2);
    	$keyword_column3 = strtolower($row[4]);
        if (\strpos($keyword_column3,$keyword) !== false) {
            $title = $row[0];
            $title = substr($title, 0, 65);
            
            $image = $row[1];
            $url = $row[2];
            
           
            //$numberOfHits++;
            
            $result .= "<div class=\"item col-md-24 col-lg-24\">";
				$result .= "<div class=\"col-md-24 col-lg-24\">";
	    		    
	    		    $result .= "<a href=\"$url\"><img style=\"height:150px;\" src=\"$image\"></a>";
	    		    
	    		    $result .= "<a href=\"$url\"><span>$title</span></a>";
	    		    
				$result .= "</div>";
	        $result .= "</div>";
            
            
        }
    

    
    }
    
    
    
    fclose($f);
   // echo $result;
   $result .= "</div>";
    return $result;
}

//print_r(find_keyword('omeka.csv',$keyword_omeka));

$print_this = find_keyword('omeka.csv',$keyword_omeka);

print_r($print_this);

if($print_this == NULL) {
echo "Hmm... We didn't find any results for <strong>$keyword_to_change</strong> in our Digital Exhibits. Please try again.";

if($errormessagenumber == 0) {

echo "<br/>";
echo "You could try searching for: ";
echo "<ul>";

echo "<li>An area like the <button onclick=\"location.href='results.php?keyword=Maumee';\" name='keyword' value=\"Maumee\">Maumee</button></li>";

echo "<li>A topic like <button style='margin:10px 0;' onclick=\"location.href='results.php?keyword=War';\" name='keyword' value=\"War\">War</button></li>";

echo "<li>or a year like <button onclick=\"location.href='results.php?keyword=1920';\" name='keyword' value='1920'>1920</button></li>";

echo "</ul>";


$errormessagenumber = 1;

}


}



?>
        
	
    	</div>  	
    	
    	<!-- <div style="border-right: solid 1px black;x;max-height: 100%;height: 500px;" class="col-md-2 col-md-pull-1 col-lg-2 col-lg-pull-1 hidden-sm-down"></div> -->    <div class="col-md-2 col-lg-2 hidden-sm-down"></div>  
    
    <div class="col-md-8 col-lg-8 col-sm-24 topmargin">
	    	<?php echo '<h3 style="border-bottom: 1px solid gray;">AUDITOR&#39;S IMAGES<span style="font-size:17px;"> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="This collection contains images from the Lucas County Auditors Office taken between the 1930s and 1960s of buildings in Toledo."></i> - <a href=\'https://www.ohiomemory.org/digital/search/collection/p16007coll88/searchterm/'.$keyword.'/field//mode/all/conn/\'>VIEW ALL</a></span></h2>'; ?>

<?php

// THIS IS CDM AUDITOR IMAGES

	$cdmcollection = "p16007coll88"; //change this
	$cdmserver = "server16007"; //change this
	$basecdmurl = "https://ohiomemory.org"; //change this - probably too https://$cdmserver.contentdm.oclc.org/ - you can view this by navigating to your collection and looking at the URL
	$keyword_to_change = $_GET["keyword"];
	$keyword = str_replace(' ', '%20', $keyword_to_change);

$xmlData = file_get_contents('https://'.$cdmserver.'.contentdm.oclc.org/dmwebservices/index.php?q=dmQuery/p16007coll88/CISOSEARCHALL^'.$keyword.'^all^and/title!subjec!descri/title/10/1/1/0/0/0/xml');

// Create the document object

$xml = simplexml_load_string($xmlData);

//print_r($xml);

$pager = array();

// How many hits did the search yield

foreach ($xml->xpath('//pager') as $hits) {
        $pager[] = array(
                'start' => (string) $hits->start,
                'total' => (string) $hits->total
        );
}

$result = array();

// Get the nodes and loop them

foreach ($xml->xpath('//record') as $record) {
        $result[] = array(
                'collection' => (string) $record->collection,
                'title' => (string) $record->title,
                'subject' => (string) $record->subjec,
                'descri' => (string) $record->descri,
                'thumb' => (string) $record->pointer
        );
}

$numberOfHits = $pager[0]["total"];
$resultCount = count($result) - 1;

if($numberOfHits == 0) {
echo "Hmm... We didn't find any results for <strong>$keyword_to_change</strong> in our Auditor Collection. Please try again.";

if($errormessagenumber == 0) {

echo "<br/>";
echo "You could try searching for: ";
echo "<ul>";

echo "<li>An area like the <button onclick=\"location.href='results.php?keyword=Maumee';\" name='keyword' value=\"Maumee\">Maumee</button></li>";

echo "<li>A topic like <button style='margin:10px 0;' onclick=\"location.href='results.php?keyword=War';\" name='keyword' value=\"War\">War</button></li>";

echo "<li>or a year like <button onclick=\"location.href='results.php?keyword=1920';\" name='keyword' value='1920'>1920</button></li>";

echo "</ul>";


$errormessagenumber = 1;

}

}

?>      
               
                        <?php
                        
                        echo "<div class=\"owl-carousel owl-theme\">";
                        
                        
for ($i=0;$i<=$resultCount;$i++) {
        $title = $result[$i]["title"];
        $title = substr($title, 0, 65);
        
        $subject = $result[$i]["subject"];
        $description = $result[$i]["descri"];
        $description_mobile = substr($description, 0, 150);
        $thumb = $result[$i]["thumb"];
        $collection = $result[$i]["collection"];
        $collection = str_ireplace("/", "", "$collection");
        //$urlStr = 'https://server16007.contentdm.oclc.org/dmGetItemInfoWebPage.php?collection='.$collection.'&pointer='.$thumb.'';
        $urlStr = 'https://www.ohiomemory.org/digital/collection/'.$collection.'/id/'.$thumb.'/rec/1';
        $imgStr = "https://ohiomemory.org/utils/getthumbnail/collection/$collection/id/" . $thumb;
        //if ($collection == "p16007coll77") {
	        //echo "<li><a href=\"$urlStr\"><img src=\"$imgStr\"></a> <strong>$title</strong><br /><em>$description</em></li>\n";
        //}
        echo "<div class=\"item col-md-24 col-lg-24\">";
				echo "<div class=\"col-md-24 col-lg-24\">";
	    		    
	    		    echo "<a href=\"$urlStr\"><img style=\"height:150px;\" src=\"$imgStr\"></a>";
	    		    
	    		     echo "<a href=\"$urlStr\"><span>$title</span></a>";
	    		    
				echo "</div>";
	        echo "</div>";
}

echo "</div>";

?>
                
        
	
    	</div>
    		
    		
  </div>  		
    		
    		
    		<!-- SPLIT --><!-- SPLIT --><!-- SPLIT --><!-- SPLIT -->
    		
    </div>
</section>


  </div>


<?php include 'footer.php';?>