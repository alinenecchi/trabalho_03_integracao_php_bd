<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Alterar Informações Aluno</title>

    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/alunos.css";
    </style>
  </head>

	<body>
		<div id="header">
			<h1>Alterar Informações Aluno</h1>
			<h3>Alanda | Aline Cruz | Aline Dias | Bruna Rossoni</h3>
		</div>

		<section id="backNav";>
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
			$codigo=$_GET['cod'];
			require("../conecta.inc.php");
			$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
			$resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where cidades.cod_cidade=alunos.cidade and cursos.codigo=alunos.curso and matricula= '$codigo'");
			$linha=mysqli_fetch_array($resultado1);
			$Matricula  =$linha["matricula"];
			$Nome       =$linha["nome_aluno"];
			$Endereco   =$linha["endereco"];
			$Cidade     =$linha["nome_cid"];
			$Cod_cidade =$linha["cod_cidade"];
			$Curso      =$linha["nome_curso"];
			$Cod_curso  =$linha["codigo"];
			print("<h4>Aluno(a): $Nome</h4><p>");
		?>
		
		<form action="./confirma_alteracao_aluno.php" method="get" id="alteraAluno">
		<br>Matrícula: <?php print($Matricula)?><input type="hidden" name="cod_alter" value="<?php print($Matricula)?>">
		<br>Nome:      <input type="text" name="nome_alter" value="<?php print($Nome)?>">
		<br>Endereco:  <input type="text" name="endereco_alter" value="<?php print($Endereco)?>">
		<br>Cidade:    <select name="cidade_alter">
		<option value="<?php print("$Cod_cidade");?>" selected><?php print("$Cidade");?></option> 
		<?php
		$resultado2=mysqli_query($ok, "Select * from cidades where cod_cidade <> '$Cod_cidade' order by nome_cid") or die ("Não é possível consultar as cidades"); 
		while ($linha=mysqli_fetch_array($resultado2))
		{
			$Cod_cidade=$linha["cod_cidade"];
			$Cidade=$linha["nome_cid"];
			print("<option value='$Cod_cidade'>$Cidade</option>");
		};
		?>
		</select>

		<input type="hidden" name="id" value="3">
		<br>Curso:     <select name="curso_alter">
		<option value="<?php print("$Cod_curso");?>" selected><?php print("$Curso");?></option>
		<?php
		$resultado3=mysqli_query($ok, "Select * from cursos where codigo <> '$Cod_curso' ") or die ("Não é possível consultar os cursos"); 
		while ($linha=mysqli_fetch_array($resultado3))
		{
			$Codigo_curso=$linha["codigo"];
			$Nome_curso=$linha["nome_curso"];
			print("<option value='$Codigo_curso'>$Nome_curso</option>");
		}
		?>
		</select>
		<p><input name ="submit" type="submit" value="Confirmar alteração"/></p>
		</form>

		<p><a href="../index.php">Cancelar e voltar</a></p>
		<section id="cancelar";>
			<a href="../index.php">
				<div id="backButton">
					<img src="../images/back.png" id="backIcon">
				</div>

				<div id="backText">
					Voltar para home
				</div>
			</a>
		</section>
	</body>
</html>