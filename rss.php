<?php 

//Implementar la consulta
require("DOMDocument.php");

//Fem la consulta
$stmt = $pdo->prepare("SELECT * FROM article ORDER BY datart DESC LIMIT 5");
$stmt->execute();

$dataset = $stmt-> fetchAll();

date_default_timezone_set("Europe/Paris");

//Indicarem a php que el que estem fent es per a crear un arxiu XML
header('Content-type: text/xml; charset="unicode-UTF-8"', true);

?>



<rss version="2.0" >
<channel>
 <title>Coffee Talks</title>
 <description>Este el RSS de la pagina web de Joan</description>
 <link>http://localhost:8080/</link>
 <copyright>Tito Bambino. DomaxX26. xD  </copyright>
 <lastBuildDate><?=date(DATE_RFC822)?></lastBuildDate>
 <pubDate><?=date(DATE_RFC822)?></pubDate>
 <ttl>1800</ttl>
<?php foreach ($dataset as $data) : ?>
 <item>
  <title><?=$data["titart"]?></title>
  <description><?=$data["bodyart"]?></description>
  <link>http://localhost:8080/posts_show.php?id=<?=$data["codart"]?></link>
  <guid isPermaLink="false">http://localhost:8080/posts_show.php?id=<?=$data["codart"]?></guid>
  <pubDate><?=date(DATE_RFC822 ,strtotime($data["datart"]))?></pubDate>
 </item>
 <?php endforeach; ?>
</channel>
</rss>