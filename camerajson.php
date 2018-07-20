<?php

include("cameraservice.php");

if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
    $action = $_POST["action"];
    switch($action) { //Switch case for value of action
      case "test": test_function(); break;
    }
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function(){
  $return = $_POST;
  $id = $return["id"];
  $c = new CameraService();
  $camera = $c->getCameraById($id);
  $return["camera"] = $camera;
  
  $textoCamera = getTextoCamera($camera);
  $return["texto"] = $textoCamera;
  //Do what you need to do with the info. The following are some examples.
  //if ($return["favorite_beverage"] == ""){
  //  $return["favorite_beverage"] = "Coke";
  //}
  //$return["favorite_restaurant"] = "McDonald's";
  
  $return["json"] = json_encode($return);
  echo json_encode($return);
}

function getTextoCamera($c){

$lmax = ($c['lentemaximo'])*10;
$lmin = ($c['lenteminimo'])*10;
  $texto = "";
  foreach ($c as $key => $value) {
    $texto .= "{$key}:{$value}; ";
  }
  $texto = "Câmera: <b>{$c['modelo']} / {$c['tipo']}" . (($c["ip"])?" / IP":"") . (($c["analogica"])?" / Analógica":"") . " / Lente: Mínima({$lmax}mm) Máxima({$lmin}mm)</b>";
  return $texto;

}
?>