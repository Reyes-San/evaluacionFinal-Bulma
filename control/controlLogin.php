<?php
session_start();

$hacer =(isset($_GET['do'])) ? $_GET['do']:'';
switch ($hacer){
case'1':
    $rut =$_POST['rut'];
    $pass =$_POST['con'];
    $tipo =$_POST['tipo'];
    $resultado;

    if ((isset($rut)&& $rut !='') && (isset($con)&& $con !='')){
        if($tipo == 2){
            require_once '../modelo/Cliente.php';
            $cliente = new Cliente();
            $cliente->__set ('clienteRut',$rut);
            $cliente->__set('clientepass',$con);

            $resultado =$cliente->login();

            if($resultado['valor']){
                $_SESSION['user']=array(
                    'auth'=> true,
                    'rut' => $resultado['rut'],
                    'tipo'=> $resultado['tipo']
                );
                
                 
                    
                }
            }
        }else{
            $resultado['valor']= false;
            $resultado['mensaje']='Campos Vacios';
        }

        echo json_encode($resultado);
break;

    }

?>