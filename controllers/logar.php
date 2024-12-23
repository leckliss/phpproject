<?php
require_once('../config/conexao.php');
require_once('../models/usuarioModel.php');

//entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$loginController = $reqbody->emailView;
$senhaController = $reqbody->senhaView;

//processamento
$conexao = new Conexao();
$banco = $conexao->abrirConexao();
$usuarioModel = new usuarioModel($banco);
$usuarioModel->emailModel = $loginController;
$usuarioModel->senhaModel = $senhaController;
$retorno = $usuarioModel->logar();

//saída
echo json_encode($retorno);
?>