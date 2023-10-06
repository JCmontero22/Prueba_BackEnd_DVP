<?php

    require_once 'connection/conexion.php';

    class IndexModel extends conexion 
    {
        private $tabla = 'ticket';

        public function get_dataAll($inicio, $cantidad){
            $query = "SELECT * FROM ".$this->tabla." WHERE estado = 1 LIMIT $inicio,$cantidad ";
            return $this->getQueryAll($query);
        }

        public function get_dataOne($id) {
            $query = "SELECT * FROM ".$this->tabla." WHERE id= ".$id;
            return $this->getQueryOne($query);
        }

        public function set_inserTicket($data) {
            $query = "INSERT INTO ".$this->tabla." (usuario, fecha_creacion, fecha_actualizacion, estatus) VALUES ("."'".$data['usuario']."'".", "."'".$data['fecha_creacion']."'".", "."'". $data['fecha_actualizacion']."'".", "."'".$data['estatus']."'".")";
            return $this->setQuery($query);
        }

        public function set_editarTikect($data) {
            $filtro='SET ';
            foreach ($data as $key => $value) {
                if ($key != 'id') {
                    $filtro.=  $key.' = '. "'".$value."'".",";   
                }
            }
            $filtro = substr($filtro, 0, -1);
            $query = "UPDATE ".$this->tabla." ".$filtro." WHERE id = ".$data['id'];
            return $this->setQuery($query);
        }

        public function delete_tikect($data) {
            $query = "UPDATE ".$this->tabla." SET estado = 0  WHERE id = ".$data['id'];
            return $this->setQuery($query);
        }
    }
    