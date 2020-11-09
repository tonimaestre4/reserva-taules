<?php

    class Ocupacion{
        public $id_ocupacion;
        public $fecha_ocupacion;
        public $hora_inicio;
        public $hora_final;
        public $estado_ocupacion;
        public $DNI_empleado;
        public $id_mesa;

        function __construct($id_ocupacion){
            $this->id_ocupacion=$id_ocupacion;
        }        

        /**
         * Get the value of id_ocupacion
         */ 
        public function getId_ocupacion()
        {
                return $this->id_ocupacion;
        }

        /**
         * Set the value of id_ocupacion
         *
         * @return  self
         */ 
        public function setId_ocupacion($id_ocupacion)
        {
                $this->id_ocupacion = $id_ocupacion;

                return $this;
        }     

        /**
         * Get the value of fecha_ocupacion
         */ 
        public function getFecha_ocupacion()
        {
                return $this->fecha_ocupacion;
        }

        /**
         * Set the value of fecha_ocupacion
         *
         * @return  self
         */ 
        public function setFecha_ocupacion($fecha_ocupacion)
        {
                $this->fecha_ocupacion = $fecha_ocupacion;

                return $this;
        }

        /**
         * Get the value of hora_inicio
         */ 
        public function getHora_inicio()
        {
                return $this->hora_inicio;
        }

        /**
         * Set the value of hora_inicio
         *
         * @return  self
         */ 
        public function setHora_inicio($hora_inicio)
        {
                $this->hora_inicio = $hora_inicio;

                return $this;
        }

        /**
         * Get the value of hora_final
         */ 
        public function getHora_final()
        {
                return $this->hora_final;
        }

        /**
         * Set the value of hora_final
         *
         * @return  self
         */ 
        public function setHora_final($hora_final)
        {
                $this->hora_final = $hora_final;

                return $this;
        }

        /**
         * Get the value of estado_ocupacion
         */ 
        public function getEstado_ocupacion()
        {
                return $this->estado_ocupacion;
        }

        /**
         * Set the value of estado_ocupacion
         *
         * @return  self
         */ 
        public function setEstado_ocupacion($estado_ocupacion)
        {
                $this->estado_ocupacion = $estado_ocupacion;

                return $this;
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
         * Get the value of id_mesa
         */ 
        public function getId_mesa()
        {
                return $this->id_mesa;
        }

        /**
         * Set the value of id_mesa
         *
         * @return  self
         */ 
        public function setId_mesa($id_mesa)
        {
                $this->id_mesa = $id_mesa;

                return $this;
        }
    }
?>