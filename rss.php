<?php 

//Implementar la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8" , "root" , "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Fem la consulta
$stmt = $pdo->prepare("SELECT * FROM article ORDER BY datart DESC");
$stmt->execute();

$dataset = $stmt-> fetchAll();

//Indicarem a php que el que estem fent es per a crear un arxiu XML
header('Content-type: text/xml; charset="unicode-UTF-8"', true);

?>


<!---->
<rss version="2.0" >
<channel>
 <title>Coffee Talks</title>
 <description>This is an example of an RSS feed</description>
 <link>http://localhost:8080/</link>
 <copyright>Tito Bambino. DomaxX26. xD  </copyright>
 <lastBuildDate>Mon, 06 Sep 2010 00:01:00 +0000 </lastBuildDate>
 <pubDate><?=date("D, d M Y H:i:s T")?></pubDate>
 <ttl>1800</ttl>
<?php foreach ($dataset as $data) : ?>
 <item>
  <title>Example entry</title>
  <description>Here is some text containing an interesting description.</description>
  <link>http://www.example.com/blog/post/1</link>
  <guid isPermaLink="false">7bd204c6-1655-4c27-aeee-53f933c5395f</guid>
  <pubDate>Sun, 06 Sep 2009 16:20:00 +0000</pubDate>
 </item>
 <?php endforeach; ?>
</channel>
</rss>