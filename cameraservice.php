<?php

 class CameraService{

   public function getCameras($caracteristicas = [],$graureconhecimento, $largura, $profundidade){

        return $this->getCamerasDB($caracteristicas);
    }

    function getCamerasDB($caracteristicas){

        //echo "-----------------";
        $dir = 'sqlite:camplanner.db';
        $dbh  = new PDO($dir) or die("cannot open the database");
        $query =  "SELECT * FROM cameras WHERE 1=1";
        foreach ($caracteristicas as $c => $a)
            if(!empty($a)) $query .= " AND ($c = $a)";
        //echo $query;die;
        $cameras = [];
        $lista = $dbh->query($query);
        //print_r($dbh->query($query));
        if(is_object($lista))
            foreach ($lista as $row)
                $cameras[] = $row;
        
        $dbh = null;

        return $cameras;
    }

}


?>
