<?php 

//Implementar la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8" , "root" , "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Fem la consulta
$stmt = $pdo->prepare("SELECT * FROM article ORDER BY datart DESC LIMIT 5");
$stmt->execute();

$dataset = $stmt-> fetchAll();

//Indicarem a php que el que estem fent es per a crear un arxiu XML
header('Content-type: text/xml; charset="unicode-UTF-8"', true);

?>



<rss version="2.0" >
<channel>
 <title>Coffee Talks</title>
 <description>Este el RSS de la pagina web de Joan</description>
 <link>http://localhost:8080/</link>
 <copyright>Tito Bambino. DomaxX26. xD  </copyright>
 <lastBuildDate><?=date("r")?></lastBuildDate>
 <pubDate><?=date("D, d M Y H:i:s T")?></pubDate>
 <ttl>1800</ttl>
<?php foreach ($dataset as $data) : ?>
 <item>
  <title><?=$data["titart"]?></title>
  <description><?=$data["bodyart"]?></description>
  <link>http://localhost:8080/posts_show.php?id=<?=$data["codart"]?></link>
  <guid isPermaLink="false">7bd204c6-1655-4c27-aeee-53f933c5395f</guid>
  <pubDate><?=date("D, d M Y H:i:s T", $timestampDate = strtotime($data["datart"]))?></pubDate>
 </item>
 <?php endforeach; ?>
</channel>
</rss>