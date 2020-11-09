<?php

    class Empleado{
        public $DNI_empleado;
        public $nombre_empleado;
        public $apellido1_empleado;
        public $apellido2_empleado;
        public $tipo_empleado;
        public $password_empleado;

        function __construct($DNI_empleado,$password_empleado){
            $this->DNI_empleado=$DNI_empleado;
            $this->password_empleado=$password_empleado;
        }
        
        /**
         * Get the value of DNI_empleado
         */ 
        public function getDNI_empleado()
        {
                return $this->DNI_empleado;
        }

        /**
         * Set the value of DNI_empleado
         *
         * @return  self
         */ 
        public function setDNI_empleado($DNI_empleado)
        {
                $this->DNI_empleado = $DNI_empleado;

                return $this;
        }
       

        /**
         * Get the value of nombre_empleado
         */ 
        public function getNombre_empleado()
        {
                return $this->nombre_empleado;
        }

        /**
         * Set the value of nombre_empleado
         *
         * @return  self
         */ 
        public function setNombre_empleado($nombre_empleado)
        {
                $this->nombre_empleado = $nombre_empleado;

                return $this;
        }

        /**
         * Get the value of apellido1_empleado
         */ 
        public function getApellido1_empleado()
        {
                return $this->apellido1_empleado;
        }

        /**
         * Set the value of apellido1_empleado
         *
         * @return  self
         */ 
        public function setApellido1_empleado($apellido1_empleado)
        {
                $this->apellido1_empleado = $apellido1_empleado;

                return $this;
        }

        /**
         * Get the value of apellido2_empleado
         */ 
        public function getApellido2_empleado()
        {
                return $this->apellido2_empleado;
        }

        /**
         * Set the value of apellido2_empleado
         *
         * @return  self
         */ 
        public function setApellido2_empleado($apellido2_empleado)
        {
                $this->apellido2_empleado = $apellido2_empleado;

                return $this;
        }

        /**
         * Get the value of tipo_empleado
         */ 
        public function getTipo_empleado()
        {
                return $this->tipo_empleado;
        }

        /**
         * Set the value of tipo_empleado
         *
         * @return  self
         */ 
        public function setTipo_empleado($tipo_empleado)
        {
                $this->tipo_empleado = $tipo_empleado;

                return $this;
        }

        /**
         * Get the value of password_empleado
         */ 
        public function getPassword_empleado()
        {
                return $this->password_empleado;
        }

        /**
         * Set the value of password_empleado
         *
         * @return  self
         */ 
        public function setPassword_empleado($password_empleado)
        {
                $this->password_empleado = $password_empleado;

                return $this;
        }
    }
?>