<?php

 class CameraService{

   public function getCameras($caracteristicas = []){

        return $this->getCamerasDB($caracteristicas);;
    }

    function getCamerasDB($caracteristicas){

        echo "-----------------";
        $dir = 'sqlite:camplanner.db';
        $dbh  = new PDO($dir) or die("cannot open the database");
        $query =  "SELECT * FROM cameras WHERE 1=1";
        foreach ($caracteristicas as $c => $a){
            if(!empty($a)) $query .= " AND ($c = $a)";
        }
        $cameras = [];
        foreach ($dbh->query($query) as $row)
        {
            $cameras[] = $row;
        }
        $dbh = null;
        return $cameras;
    }

}


?>
