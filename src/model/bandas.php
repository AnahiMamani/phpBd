<?php

namespace App\Model;

class bandas{
    private $id;
    private $nome;
    private $genero;
    private $anoFormacao;
    private $paisOrigem;

    public function setid($id){
        $this->id = id;
    }

    public function getid(){
        return $this->id;
    }

    public function setnome($nome){
        $this->nome = nome;
    }

    public function getnome(){
        return $this->nome;
    }

    public function setgenero($genero){
        $this->genero = genero;
    }

    public function getgenero(){
        return $this->genero;
    }

    public function setanoFormacao($anoFormacao){
        $this->anoFormacao = anoFormacao;
    }

    public function getanoFormacao(){
        return $this->anoFormacao;
    }

    public function setpaisOrigem($paisOrigem){
        $this->paisOrigem = paisOrigem;
    }

    public function getpaisOrigem(){
        return $this->paisOrigem;
    }

    public function __toString(): String{
        return $this->nome." Id".$this->id;
    }    

}

?>