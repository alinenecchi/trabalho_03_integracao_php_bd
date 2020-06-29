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
	
	<section id="backNav">
		<a href="pesquisas.php">
			<div id="backButton">
			<img src="../images/back.png" id="backIcon">
			</div>

			<div id="backText">
				Voltar para Pesquisas
			</div>
		</a>
    </section>

	<div id="resultado">
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
		$select_cidade = mysqli_query($ok, "select nome_cid from cidades where '$cidades' = cod_cidade") or die ("Não é possível pesquisar as informações dessa cidade.");
		while ($row=mysqli_fetch_array($select_cidade)){
			$cid_escolhida=$row["nome_cid"];
			print("<b>Alunos de $cid_escolhida:</b><br>");
		}
		
		$resultado=mysqli_query($ok, "Select nome_aluno, endereco from alunos, cidades where alunos.cidade=cidades.cod_cidade and cidades.cod_cidade = '$cidades'") 
		or die ("Não é possível pesquisar as informações dos alunos.");
		if (mysqli_num_rows($resultado)=='')
			print("Registro(s) não encontrados(s)...");
		else
			while ($linha=mysqli_fetch_array($resultado))
			{
				$Nome_aluno=$linha["nome_aluno"];
				$Endereco=$linha["endereco"];
				print("<br><b>Nome: </b>$Nome_aluno
				<br><b>Endereço: </b>$Endereco <br>");
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
		$select_curso = mysqli_query($ok, "select nome_curso from cursos where '$cursos' = codigo") or die ("Não é possível pesquisar as informações desse curso.");
		while ($row=mysqli_fetch_array($select_curso)){
			$c_escolhido=$row["nome_curso"];
			print("<b>Alunos de $c_escolhido:</b><br>");
		}
		$resultado=mysqli_query($ok, "Select nome_aluno, endereco, nome_cid from alunos, cursos, cidades where alunos.cidade=cidades.cod_cidade and alunos.curso=cursos.codigo and cursos.codigo='$cursos'") 
		or die ("Não é possível pesquisar departamento do funcionário.");
		if (mysqli_num_rows($resultado)=='')
			print("Registro(s) não encontrados(s)...");
		else
		while ($linha=mysqli_fetch_array($resultado))
		{
			$Nome_aluno=$linha["nome_aluno"];
			$Endereco=$linha["endereco"];
			$Cidade=$linha["nome_cid"];
			print("
			<br><b>Nome: </b>$Nome_aluno
			<br><b>Endereço: </b>$Endereco 
			<br><b>Cidade: </b>$Cidade <br>");
		}
	}
}
else
	print("Informe um critério...");

?>
		</div>
    </body>
</html>
