<?php

    class Mesa{
        public $id_mesa;
        public $capacidad_mesa;
        public $ocupacion_mesa;
        public $id_sala;

        function __construct($id_mesa,$capacidad_mesa,$ocupacion_mesa,$id_sala){
            $this->id_mesa=$id_mesa;
            $this->capacidad_mesa=$capacidad_mesa;
            $this->ocupacion_mesa=$ocupacion_mesa;
            $this->id_sala=$id_sala;
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
         * Get the value of capacidad_mesa
         */ 
        public function getCapacidad_mesa()
        {
                return $this->capacidad_mesa;
        }

        /**
         * Set the value of capacidad_mesa
         *
         * @return  self
         */ 
        public function setCapacidad_mesa($capacidad_mesa)
        {
                $this->capacidad_mesa = $capacidad_mesa;

                return $this;
        }

        /**
         * Get the value of ocupacion_mesa
         */ 
        public function getOcupacion_mesa()
        {
                return $this->ocupacion_mesa;
        }

        /**
         * Set the value of ocupacion_mesa
         *
         * @return  self
         */ 
        public function setOcupacion_mesa($ocupacion_mesa)
        {
                $this->ocupacion_mesa = $ocupacion_mesa;

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