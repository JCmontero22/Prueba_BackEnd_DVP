<?php 

    require_once 'controllers/indexController.php';

    $controlador = new  indexController;

    switch($_SERVER['REQUEST_METHOD']){
        
        case 'GET':

                $pagina = 1;
                $respuesta;
                
                if (isset($_GET['id'])) {
                    $respuesta = $controlador->dataOne($_GET['id']);
                }else{
                    if (isset($_GET['pagina'])) {
                        $pagina = $_GET['pagina'];
                        $respuesta = $controlador->dataAll($pagina);    
                    }else{
                        $respuesta = $controlador->dataAll($pagina);
                    }
                }
                
                echo $respuesta;
            break;

        case 'POST':

            $dataPost = file_get_contents("php://input");
            $respuesta = $controlador->insertTicket($dataPost);
            echo $respuesta;
            break;

        case 'PUT':
            
            $dataPut = file_get_contents("php://input");
            $respuesta = $controlador->editTicket($dataPut);
            echo $respuesta;
            break;

        case 'DELETE':
            $dataDelete = file_get_contents("php://input");
            $respuesta = $controlador->deleteTicket($dataDelete);
            echo $respuesta;
            
            break;
    }