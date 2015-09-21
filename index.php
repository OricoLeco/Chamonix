

<<!DOCTYPE html>
<HTML>
    <HEAD>
        <LINK rel="stylesheet" href="css/style.css">
    </HEAD>    
    <BODY>

<div id="full-size">
    <div id="wrapper">

<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'XmlToJson.php';
$json= XmlToJson::Parse("https://api.flickr.com/services/feeds/photos_public.gne?tags=chamonix,ski,snow");
$pictures=json_decode($json,true);
foreach ($pictures['entry'] as $singlePic)
{
        $author=$singlePic['author']['name'];
       
        $title=$singlePic['title'];
       
         $link=$singlePic['link'][1]['@attributes']['href'];
        $imagelink=$singlePic['link'];
        
        //this link goes to author conection, we need author's picture
         $peoplePage=$singlePic['author']['uri']; 
        
       
         $authorPage=str_replace('people','photos',$peoplePage);
//        print $authorPage;
         
 ?>   

<ul id="grid">
    <li><a href="<?= $authorPage?>"><img src="<?= $link?>" ></a></li>
</ul>      
<?php   
  } 

?>     
       

    </div>
</div>
    </BODY>
     
</HTML>
