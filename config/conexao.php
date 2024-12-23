<?php

class Conexao {
  public $host = "localhost:3306";
  public $nomeBanco = "agenda";
  public $usuarioBanco = "root";
  public $senhaUsuario = "";
  public $pdo = null;

  public function abrirConexao(){
    try{
      $this->pdo = new PDO(
        'mysql:host='.$this->host.';dbname='.$this->nomeBanco,
        $this->usuarioBanco,
        $this->senhaUsuario
      );
    }
    catch(PDOException $ex){
      echo 'Erro ao conectar com o banco de dados'.$ex->getMess;
    }
    return $this->pdo;
  }

}



?>