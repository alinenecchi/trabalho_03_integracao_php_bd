<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Resultados</title>

    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/resultados.css";
    </style>
  </head>

  <body>

    <div id="header">
      <h1>Resultados</h1>
      <h3>Alanda | Aline Cruz | Aline Dias | Bruna Rossoni</h3>
    </div>

    <section id="backNav">
      <a href="../index.php">
        <div id="backButton">
          <img src="../images/back.png" id="backIcon">
        </div>

        <div id="backText">
          Voltar para home
        </div>
      </a>
    </section>

<?php
$id=$_GET["id"];
require("../conecta.inc.php");
$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$pesquisou=false;
if ($id==1)
{
	$cidade=$_GET["cidade"];
	if (empty($cidade))
		print("Preencha com uma cidade.");
	else
	{
		$resultado=mysqli_query($ok, "Select * from cidades where nome_cid LIKE '%$cidade%'") or die ("Não é possível pesquisar o nome da cidade.");
		if (mysqli_num_rows($resultado)=='')
			print("Registro(s) não encontrados(s)...");
		else
			while ($linha=mysqli_fetch_array($resultado))
			{
			$Cidade=$linha["nome_cid"];
			
			print("$Cidade<br>");
		}
	}
}
elseif ($id==2)
{
	$estado=$_GET['estado'];
	if (empty($estado))
		print("Preencha com um Estado.");
	else
	{
		$resultado=mysqli_query($ok, "Select nome_est from estados where nome_est like '%$estado%'") or die ("Não é possível pesquisar o nome do estado.");
		if (mysqli_num_rows($resultado)=='')
			print("Registro(s) não encontrados(s)...");
		else
		while ($linha=mysqli_fetch_array($resultado))
		{
			$Estado=$linha["nome_est"];
			print("$Estado<br>");
		}
	}
}
elseif ($id==3)
{
	$cidades=$_GET['cidades'];
	if (empty($cidades))
		print("Escolha uma cidade.");
	else
	{
		$resultado=mysqli_query($ok, "Select nome_aluno, endereco from alunos, cidades where alunos.cidade=cidades.cod_cidade and cidades.cod_cidade like '$cidades'") or die ("Não é possível pesquisar as informações dos alunos.");
		if (mysqli_num_rows($resultado)=='')
			print("Registro(s) não encontrados(s)...");
		else
		print("Alunos da cidade selecionada:");
		while ($linha=mysqli_fetch_array($resultado))
		{
			$Nome_aluno=$linha["nome_aluno"];
			$Endereco=$linha["endereco"];
			print("<br>Nome: $Nome_aluno
			<br> Endereço: $Endereco <br>");
		}
	}
}
elseif ($id==4)
{
	$cursos=$_GET['cursos'];
	if (empty($cursos))
		print("Escolha um departamento.");
	else
	{
		$resultado=mysqli_query($ok, "Select matricula, nome_aluno, endereco, nome_cid, curso from alunos, cursos, cidades where alunos.curso=cursos.codigo and cidades.cod_cidade=alunos.cidade and cursos.codigo like '$cursos'") or die ("Não é possível pesquisar os alunos.");
		if (mysqli_num_rows($resultado)=='')
			print("Registro(s) não encontrados(s)...");
		else
		print("Alunos do curso selecionado:");
		while ($linha=mysqli_fetch_array($resultado))
		{
			$Matricula=$linha["matricula"];
			$Nome_aluno=$linha["nome_aluno"];
			$Endereco=$linha["endereco"];
			$Cidade=$linha["nome_cid"];
			print("
			<br>Matrícula: $Matricula
			<br>Nome: $Nome_aluno
			<br> Endereço: $Endereco 
			<br> Cidade: $Cidade<br>");
		}
	}
}
else
	print("Informe um critério...");

?>
    </body>
</html>