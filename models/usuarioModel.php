<?php

class usuarioModel {
  public $db = null;
  public $id = 0;
  public $nomeCompletoModel = null;
  public $telefoneModel = null;
  public $emailModel = null;
  public $senhaModel = null;

  public function __construct($conexaoBanco){
    $this->db = $conexaoBanco;
  }

  public function logar(){
    $retorno = ['status' => 0, 'dados' => null];
    try{
      $stmt = $this->db->prepare('
      SELECT id, email FROM usuarios
      WHERE email = :email
      AND senha = :senha
      LIMIT 1');
      $stmt->bindValue(':email', $this->emailModel);
      $stmt->bindValue(':senha', $this->senhaModel);
      $stmt->execute();
      $dado = $stmt->fetch();
      if ($dado['id'] && $dado['id'] > 0){
        $retorno['status'] = 1;
        $retorno['dados'] = $dado;
      }
    }
      catch(PDOException $ex){
        echo 'Erro ao logar: '.$ex->getMessage();
      }
      return $retorno;
  }
}