<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Deletar Aluno</title>

    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/alunos.css";
    </style>
</head>

<body>

  <div id="header">
    <h1>Deletar Aluno</h1>
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
<div id="infos">
  <?php
      $codigo = $_GET['cod'];
      require("../conecta.inc.php");
      $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
      $resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where cidades.cod_cidade=alunos.cidade and cursos.codigo=alunos.curso and matricula= '$codigo'")or die ("Não é possível retornar os dados");
      $linha=mysqli_fetch_array($resultado1);
      $Matricula  =$linha["matricula"];
      $Nome       =$linha["nome_aluno"];
      $Endereço   =$linha["endereco"];
      $Cidade     =$linha["nome_cid"];
      $Curso      =$linha["nome_curso"];
      
      print("<p><b>Deletando o aluno(a)</b></p>");
      print("Matricula: $Matricula<br>");
      print("Nome: <b>$Nome</b><br>");
      print("Endereço: $Endereço<br>");
      print("Cidade: $Cidade<br>");
      print("Curso: $Curso");

  ?>
    <div>
      <form action="./aluno_deletado.php" method="POST">
        <input type="hidden" name="cod_del" value="<?php print($Matricula)?>">
        <input type="hidden" name="nome" value="<?php print($Nome)?>">
        <input id="confirmaDeletar" name ="submit" type="submit" value="Confirmar Deletar"/>
      </form>
    </div>
  </div>

  <section id="cancelarNav";>
			<a href="lista_alunos.php">
				<div id="CancelarButton">
					<img src="../images/cancel.png" id="cancelarIcon">
				</div>

				<div id="cancelarText">
					Cancelar
				</div>
			</a>
		</section>

</body>
</html>
