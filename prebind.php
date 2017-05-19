<?php
require("preclass.php");
//before showing the whole dash we need to prebind.
if(!isset($_POST['ps'])){
	$params = [
        "user" => $_POST['username'],
        "password" => $_POST['ps'],
        "tld" => $_POST['tld'],
        "boshUrl" => $_POST['bosh']
        //For openfire it's something like http://<your-xmpp-fqdn>:7070/http-bind/
    ];
    $xmpp = new XmppPrebind($params);
	echo json_encode($xmpp->connect());
}
?>
