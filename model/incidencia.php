<?php

    class Incidencia{
        public $id_incidencia;
        public $observacion;
        public $id_mesa;
        public $id_sala;

        function __construct($id_incidencia,$observacion,$id_mesa,$id_sala){
            $this->id_incidencia=$id_incidencia;
            $this->observacion=$observacion;
            $this->id_mesa=$id_mesa;
            $this->id_sala=$id_sala;   
        }

        /**
         * Get the value of id_incidencia
         */ 
        public function getId_incidencia()
        {
                return $this->id_incidencia;
        }

        /**
         * Set the value of id_incidencia
         *
         * @return  self
         */ 
        public function setId_incidencia($id_incidencia)
        {
                $this->id_incidencia = $id_incidencia;

                return $this;
        }
        
        /**
         * Get the value of observacion
         */ 
        public function getObservacion()
        {
                return $this->observacion;
        }

        /**
         * Set the value of observacion
         *
         * @return  self
         */ 
        public function setObservacion($observacion)
        {
                $this->observacion = $observacion;

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
        
        /**
         * Get the value of id_sala
         */ 
        public function getId_sala()
        {
                return $this->id_sala;
        }

        /**
         * Set the value of id_sala
         *
         * @return  self
         */ 
        public function setId_sala($id_sala)
        {
                $this->id_sala = $id_sala;

                return $this;
        }
    }
?>