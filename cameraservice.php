<?php

 class CameraService{

   public function getCameras(){
        $cameras = [];
        $c1 = ["modelo"=>"VIP100", "tipo"=>"Bullet"];
        $c2 = ["modelo"=>"VIPSE10", "tipo"=>"Speed Dome"];
        $cameras[]=$c1;
        $cameras[]=$c2;

        return $cameras;
    }

}


?>
