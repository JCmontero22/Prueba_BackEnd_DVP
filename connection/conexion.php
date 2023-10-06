<?php 

    class conexion
    {
        private $server;
        private $user;
        private $password;
        private $database;
        private $conexion;

        public function __construct() {
            $listaDatos = $this->datosConexion();

            foreach ($listaDatos as $key => $value) {
                $this->server = $value['server'];
                $this->user = $value['user'];
                $this->password = $value['password'];
                $this->database = $value['database'];
            }

            $this->conexion = new PDO('mysql:host='.$this->server.';'.'dbname='.$this->database, $this->user, $this->password);
            
        }

        private function datosConexion(){
            $direccion = dirname(__FILE__);
            $jsonData = file_get_contents($direccion . "/" . "config");
            return json_decode($jsonData, true);
        }

        private function limpiarUTF8($array){
            array_walk_recursive($array, function(&$item, $key){
                if (!mb_detect_encoding($item, 'utf-8', true)) {
                    $item = utf8_encode($item);
                }
            });

            return $array;
        }

        public function getQueryAll($query) {
            $result = $this->conexion->query($query);
            $data= array();
            while($registro = $result->fetchObject()){
                array_push($data, $registro);
            }

            return $data;
        }

        public function getQueryOne($query) {
            $result = $this->conexion->query($query);
            return $result->fetchObject();
        }

        public function setQuery($query) {
            $result = $this->conexion->query($query);
            if ($result->rowCount() > 0) {
                return true;    
            }else{
                return false;
            }
        }
    }
    