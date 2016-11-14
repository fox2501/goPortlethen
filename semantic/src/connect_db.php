<?PHP

// connect to your Azure server and select database (remember you connection details are all on the azure portal
$db = new mysqli(
    "us-cdbr-azure-southcentral-f.cloudapp.net",
    "b5051f6adfc120",
    "c31439e7",
    "webappalexander" );

// test our connection
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);


$query = "SELECT * FROM markers WHERE 1";
$result = $db->query($query);
if (!$result)   {
    die('nothing in result: ');

}

header("content-type: text/xml");


while ($row = $result->fetch_array()) {

    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("name", $row['name']);
    $newnode->setAttribute("address", $row['address']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
    $newnode->setAttribute("type", $row['type']);
}

$result->close();
$db->close();


echo $dom->saveXML();

?>
