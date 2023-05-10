<?php
    class Usuario{
        public $_nombre;
        public $_apellido;
        public $_clave;
        public $_mail;
        public $_localidad;
        public $_fechaReg;

        public static $listaUsuarios=[];

        public function __construct($nombre,$apellido,$clave,$mail,$localidad)
        {
            $this->_nombre=$nombre;
            $this->_apellido=$apellido;
            $this->_clave=$clave;
            $this->_mail=$mail;
            $this->_localidad=$localidad;
            $this->_fechaReg=date('d/M/Y');
        }
    }
?>