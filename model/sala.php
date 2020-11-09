<?php

    class Sala{
        public $id_sala;
        public $nombre_sala;
        public $tipo_sala;

        function __construct($id_sala){
            $this->id_sala=$id_sala;
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

        /**
         * Get the value of nombre_sala
         */ 
        public function getNombre_sala()
        {
                return $this->nombre_sala;
        }

        /**
         * Set the value of nombre_sala
         *
         * @return  self
         */ 
        public function setNombre_sala($nombre_sala)
        {
                $this->nombre_sala = $nombre_sala;

                return $this;
        }

        /**
         * Get the value of tipo_sala
         */ 
        public function getTipo_sala()
        {
                return $this->tipo_sala;
        }

        /**
         * Set the value of tipo_sala
         *
         * @return  self
         */ 
        public function setTipo_sala($tipo_sala)
        {
                $this->tipo_sala = $tipo_sala;

                return $this;
        }
    }
?>