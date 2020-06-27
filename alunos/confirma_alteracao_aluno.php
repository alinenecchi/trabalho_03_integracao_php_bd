<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Alunos</title>

    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/alunos.css";
    </style>
  </head>

  <body>

    <div id="header">
      <h1>Confirmar - Alterar Alunos</h1>
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

    <div id="alteracaoConfirmada">
      <?php
        $Matricula=$_GET['cod_alter'];
        $nome_alter=$_GET['nome_alter'];
        $endereco_alter=$_GET['endereco_alter'];
        $cidade_alter=$_GET['cidade_alter'];
        $curso_alter=$_GET['curso_alter'];
        //falta verificar se campos estão preenchidos
        require("../conecta.inc.php");	
        $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
        mysqli_query($ok, "update alunos set nome_aluno='$nome_alter', endereco='$endereco_alter', cidade='$cidade_alter', curso ='$curso_alter' where matricula='$Matricula'") or die ("Não é possível alterar dados do Aluno!!");
        print("<p>Alteração realizada:</p>");
        $pesquisa = mysqli_query($ok, " select * from alunos, cidades, cursos where alunos.matricula = '$Matricula' and cidades.cod_cidade=alunos.cidade and cursos.codigo=alunos.curso") or die ("Não é possível acessar dados do Aluno");
        
        $linha=mysqli_fetch_array($pesquisa);
        $cod_aluno  =$linha["matricula"];
          $Nome_aluno =$linha["nome_aluno"];
          $Endereco   =$linha["endereco"];
          $Cidade     =$linha["nome_cid"];
          $Curso      =$linha["nome_curso"];
        print("<br>Matrícula: $cod_aluno
            <br>Nome: <b>$Nome_aluno</b>
            <br>Endereço: $Endereco 
            <br>Cidade: $Cidade 
            <br>Curso: $Curso<br><br>");
            
        print("<b>Dados alterados com sucesso!</b>");
      ?>
    </div>

    <section id="cancelarNav";>
			<a href="lista_alunos.php">
				<div id="CancelarButton">
					<img src="../images/back.png" id="cancelarIcon">
				</div>

				<div id="cancelarText">
					Voltar para listagem de Alunos
				</div>
			</a>
		</section>
  </body>
</html>
