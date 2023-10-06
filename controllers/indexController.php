<?php 
    require_once 'models/IndexModel.php';

    class indexController extends IndexModel 
    {
        public function dataAll($pagina) {
            $inicio = 0;
            $cantidad = 10;
            if ($pagina > 1) {
                $inicio = ($cantidad * ($pagina - 1)) + 1;
                $cantidad = $cantidad * $pagina;
            }
            $respuesta = $this->get_dataAll($inicio, $cantidad);
            echo json_encode($respuesta);
        }

        public function dataOne($id){
            $respuesta = $this->get_dataOne($id);
            echo json_encode($respuesta);
        }

        public function insertTicket($data) {
            
            $data = json_decode($data, true);
            if (!isset($data['usuario']) || !isset($data['fecha_creacion']) || !isset($data['fecha_actualizacion']) || !isset($data['estatus'])) {
                $respuesNegativa[] = array(
                    'Codigo' => 400,
                    'Mensaje' => 'Datos Erroneos'
                );

                echo json_encode($respuesNegativa);
            }else{
                $resultado= array();
                $respuesta = $this->set_inserTicket($data);
                if ($respuesta == 'true') {
                    $resultado[] = array(
                        'Codigo' => 200,
                        'Mensaje' => 'Usuario registrado'
                    );
                }else{
                    $resultado[] = array(
                        'Codigo' => 400,
                        'Mensaje' => 'No se registro el usuario'
                    );
                }
                echo json_encode($resultado);
            }
        }

        public function editTicket($data) {
            
            $data = json_decode($data, true);
            if (!isset($data['id'])) {
                $respuesNegativa[] = array(
                    'Codigo' => 400,
                    'Mensaje' => 'Datos Erroneos'
                );
                
                echo json_encode($respuesNegativa);

            }else{
                
                $resultado= array();
                $respuesta = $this->set_editarTikect($data);
                if ($respuesta == 'true') {
                    $resultado[] = array(
                        'Codigo' => 200,
                        'Mensaje' => 'Usuario editado'
                    );
                }else{
                    $resultado[] = array(
                        'Codigo' => 400,
                        'Mensaje' => 'No se edito el usuario'
                    );
                }
                echo json_encode($resultado);
            }
        }

        public function deleteTicket($data) {
            
            $data = json_decode($data, true);
            if (!isset($data['id'])) {
                $respuesNegativa[] = array(
                    'Codigo' => 400,
                    'Mensaje' => 'Datos Erroneos'
                );
                
                echo json_encode($respuesNegativa);

            }else{
                
                $resultado= array();
                $respuesta = $this->delete_tikect($data);
                if ($respuesta == 'true') {
                    $resultado[] = array(
                        'Codigo' => 200,
                        'Mensaje' => 'Usuario eliminado'
                    );
                }else{
                    $resultado[] = array(
                        'Codigo' => 400,
                        'Mensaje' => 'No se elimino el usuario'
                    );
                }
                echo json_encode($resultado);
            }
        }
    }
    
    
