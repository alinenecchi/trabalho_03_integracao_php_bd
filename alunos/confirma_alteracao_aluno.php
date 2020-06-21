<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Alunos</title>

    <style type="text/css">
      @import "../css/stylesheet.css";
    </style>
  </head>

  <body>

    <div id="header">
      <h1>Confirmar - Alterar Alunos</h1>
      <h3>Alanda | Aline Cruz | Aline Dias | Bruna Rossoni</h3>
    </div>

<?php
	$Matricula=$_GET['cod_alter'];
	$nome_alter=$_GET['nome_alter'];
	$endereco_alter=$GET['endereco_alter']
	$cidade_alter=$GET['cidade_alter']
	$estado_alter=$GET['estado_alter']
	$curso_alter=$_GET['curso_alter'];
	//falta verificar se campos estão preenchidos
	require("conecta.inc.php");
	$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	mysqli_query($ok, "update alunos set nomea='$nome_alter', endereco='$endereco_alter', cidade='$cidade_alter', estado='$estado_alter' where cod_aluno='$Matricula'") or die ("Não é possível deletar dados do Aluno!!");
	print("Alteração realizada:<p>");
	print(	"Matrícula: $Matricula 
			Nome: <b>$nome_alter</b>
			Endereço:  $endereco_alter 
			Cidade: $cidade_alter 
			Estado: $estado_alter
			Curso: $curso_alter <p>");

	print("Dados alterados com sucesso!");
?>
<p><a href="./index.php">Página Inicial</a>
  </body>
</html>