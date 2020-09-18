<?php
header("Content-Type: application/json; charset=UTF-8");
require 'database.php';
require 'concert.php';

$req=$_GET['req'] ?? null;
$db=new database();
$concert= new concert($db->connect());

switch($req)
{
    case 'insert':
        $obj=$_GET['object'];
        $temp=json_decode($obj);
        echo $concert->insertconcertdetail($temp);
        break;

    case 'list':
        echo $concert->getconertdetails();
        break;

    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>