<?php  
$bdServidor = '127.0.0.1';
$bdUsuario = 'user';
$bdSenha = '123';
$bdBanco = 'bancolivro';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
if (mysqli_connect_errno($conexao)){
	echo "Não foi possivél se conectar ao banco, verifique suas credencias";
	die();
}

function gravar_tarefa($conexao, $tarefa)
{
	$sqlGravar = "
	INSERT INTO tbtarefa (nome, descricao, prioridade, prazo, concluida) VALUES ('{$tarefa['nome']}','{$tarefa['descricao']}',{$tarefa['prioridade']}, '{$tarefa['prazo']}', {$tarefa['concluida']}) 
	";
	mysqli_query($conexao, $sqlGravar);
}


function buscar_tarefas($conexao)
{
	$sqlBusca = 'SELECT * FROM tbtarefa';
	$sqlResultado = mysqli_query($conexao, $sqlBusca);
	$tarefas = array();
	while ($tarefa = mysqli_fetch_assoc($sqlResultado)) {
	  	$tarefas[] = $tarefa;
	  }  
	  return $tarefas;
}

function buscar_tarefa($conexao, $id)
{
	$sqlBusca = 'SELECT * FROM tbtarefa WHERE id = ' .$id;
	$resultado = mysqli_query($conexao, $sqlBusca);
	return mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $tarefa)
{
	$sqlEditar = " UPDATE tbtarefa SET nome = '{$tarefa['nome']}', descricao = '{$tarefa['descricao']}', prioridade = {$tarefa['prioridade']}, prazo = '{$tarefa['prazo']}', concluida = {$tarefa['concluida']} WHERE id = {$tarefa['id']}";
	mysqli_query($conexao, $sqlEditar);
}




?>