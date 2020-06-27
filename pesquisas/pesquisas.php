<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Pesquisar no site</title>

		<style type="text/css">
			@import "../css/stylesheet.css";
			@import "../css/pesquisar.css";
		</style>
	</head>

	<body>

		<div id="header">
			<h1>Pesquisar no Site</h1>
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

		<form action="resultados.php" method="get" class="form">
			Cidade: <input type="text" name="cidade">
			<input type="hidden" name="id" value="1">
			<input type="submit" value="Pesquisar Cidade">
		</form>

		<form action="resultados.php" method="get" class="form">
			Estado: <input type="text" name="estado">
			<input type="hidden" name="id" value="2">
			<input type="submit" value="Pesquisar Estado">
		</form>

		<form action="resultados.php" method="get" class="form">
			Cidades: <select name="cidades">
			<option value="" disabled selected>escolha...</option>
			<?php
			require("../conecta.inc.php");
			$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
			$resultado2=mysqli_query($ok, "Select * from cidades order by nome_cid") or die ("Não é possível consultar as cidades"); 
			while ($linha=mysqli_fetch_array($resultado2))
			{
				$Cod_cidade=$linha["cod_cidade"];
				$Cidade=$linha["nome_cid"];
				print("<option value='$Cod_cidade'>$Cidade</option>");
			};
			?>
			</select>
			<input type="hidden" name="id" value="3">
		&nbsp;&nbsp;<input type="submit" value="Pesquisar Alunos">
		</form>

		<form action="resultados.php" method="get" class="form">
			Cursos: <select name="cursos" id="cursos">
			<option value="" selected>escolha...</option>
			<?php
			$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
			$resultado=mysqli_query($ok, "Select * from cursos") or die ("Não é possível consultar as cidades.");
			while ($linha=mysqli_fetch_array($resultado))
			{
			$Cod_curso=$linha["codigo"];
			$Curso=$linha["nome_curso"];
			print("<option value='$Cod_curso'>$Curso</option>");
			};
			?>
		</select>
		<input type="hidden" name="id" value="4">
		&nbsp;&nbsp;<input type="submit" value="Pesquisar Alunos">
		</form>

		</body>
</html>
