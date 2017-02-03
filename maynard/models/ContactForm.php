<?php

Class ContactForm {
    protected $nome;

    protected $telefone;

    protected $nuPassageiros;

    protected $localSaida;

    protected $localDestino;

    protected $veiculo;

    protected $email;

    protected $dataSaida;
    
    protected $dataRetorno;

    protected $textoConsulta;
    
    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNuPassageiros() {
        return $this->nuPassageiros;
    }

    function getLocalSaida() {
        return $this->localSaida;
    }

    function getLocalDestino() {
        return $this->localDestino;
    }

    function getVeiculo() {
        return $this->veiculo;
    }

    function getEmail() {
        return $this->email;
    }

    function getDataSaida() {
        return $this->dataSaida;
    }

    function getDataRetorno() {
        return $this->dataRetorno;
    } 
    function getTextoConsulta() {
        return $this->textoConsulta;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setNuPassageiros($nuPassageiros) {
        $this->nuPassageiros = $nuPassageiros;
    }

    function setLocalSaida($localSaida) {
        $this->localSaida = $localSaida;
    }

    function setLocalDestino($locaDestino) {
        $this->localDestino = $localDestino;
    }

    function setVeiculo($veiculo) {
        $this->veiculo = $veiculo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;
    }

    function setDataRetorno($dataRetorno) {
        $this->dataRetorno = $dataRetorno;
    }
    
    function setTextoConsulta($textoConsulta) {
        return $this->textoConsulta = $textoConsulta;
    }


}
?>

