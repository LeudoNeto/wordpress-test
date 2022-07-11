<?php 

require_once "Competidor.php";

$id = $_REQUEST["id"] ?? 0;

$competidor = new Competidor;
$competidor->setId($id);

try
{
  $data = $competidor->readByName();
  echo "sucesso <br>";
  print_r($data);
}
catch (Exception $e)
{
  echo $e->GetMessage();
}

?>