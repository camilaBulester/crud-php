<?php

    include_once('../config/config.php');
    include('../config/Database.php');

    class paciente
    {
        public $conexion;

        function __construct(){

            $db = new Database();
            $this->conexion = $db->connectToDatabase();
        }
        function save($params){
            $nombre = $params['nombre'];
            $apellidos = $params['apellidos'];
            $celular = $params['celular'];
            $email = $params['email'];
            $edad = $params['edad'];
            $niveleducativo = $params['niveleducativo'];
            $perfillaboral = $params['perfillaboral'];
            $imagen = $params['imagen'];
            
            $insert = " INSERT INTO pacientes VALUES (NULL, '$nombre', '$apellidos', '$celular', '$email', '$edad', 
            '$niveleducativo', '$perfillaboral', '$imagen' )";
            return mysqli_query($this->conexion, $insert);

        }
        function getAll(){
            $sql = "SELECT * FROM pacientes ORDER BY nombre ASC";
            return mysqli_query($this->conexion, $sql);
        }
        function getOne($id){
            $sql = "SELECT * FROM pacientes WHERE id= $id";
            return mysqli_query($this->conexion, $sql);
        }


        function update($params){
            $nombre = $params['nombre'];
            $apellidos = $params['apellidos'];
            $celular = $params['celular'];
            $email = $params['email'];
            $edad = $params['edad'];
            $niveleducativo = $params['niveleducativo'];
            $perfillaboral = $params['perfillaboral'];
            $imagen = $params['imagen'];
            $id = $params['id'];

            $update = "UPDATE pacientes SET nombre='$nombre', apellidos='$apellidos', celular='$celular', email='$email', 
            edad='$edad', niveleducativo='$niveleducativo', perfillaboral='$perfillaboral', imagen='$imagen' WHERE id = $id ";
            return mysqli_query($this->conexion, $update);
        }

        function delete($id){
            $delete = " DELETE FROM pacientes WHERE id= $id";
            return mysqli_query($this->conexion, $delete);
    }
     }