<?php

 class CameraService{

   public function getCameras(){
        $cameras = [];
        $c1 = ["modelo"=>"VIP100", "tipo"=>"Bullet"];
        $c2 = ["modelo"=>"VIPSE10", "tipo"=>"Speed Dome"];
        $cameras[]=$c1;
        $cameras[]=$c2;

        //$this->getCamerasDB();
        return $cameras;
    }

    function getCamerasDB(){
        echo "-----------------";
        $dir = 'sqlite:camplanner.db';
$dbh  = new PDO($dir) or die("cannot open the database");
$query =  "SELECT * FROM cameras WHERE 1=1";
foreach ($dbh->query($query) as $row)
{
    print_r($row);
}
$dbh = null;
    }

}


?>
