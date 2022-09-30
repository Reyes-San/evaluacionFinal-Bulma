<?php
use modelo\DataBase;
class Cliente{
    private $clienteRut;
    private $clienteNombre;
    private $clientepass;
    private $clienteMonto;
    public function__construct()
    {
        include_once '../modelo/DataBase.php';
        include_once '../modelo/Constantes.php';
        $this->db = new DataBase();
    }
    public function __get($key){
        return $this->$key;

    }

    public function __get($key,$value){
        return $this->$key =$value;
    }
    public function login (){
        $consulta="SELECT *
            FROM cliente
            WHERE clienteRut = :rut
            AND clientePassword= :password";
            try{
                $this->db->beginTransaction();
                $this->db->bin(':rut', $this->clienteRut);
                $this->db->bin(':password', $this->clientepass);

                if($resultado = $this->db->single()){
                    $this->db->endTransacction();
                    $respuesta['valor'] = true;
                    $respuesta['mensaje'] = 'Iniciando sesion..';
                    $respuesta['rut'] =$resultado ['clienterut'];
                    $respuesta['tipo'] = 2;               }
            }
            else{
            $this->db->cancelTransaction();
            $respuesta['valor'] =false;
            $respuesta['mensaje'] = 'Usuario no encontrado';
        }
    }
}