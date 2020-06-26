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

<?php
    $codigo = $_GET['codigo'];
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where cidades.cod_cidade=alunos.cidade and cursos.codigo=alunos.curso and matricula= '$codigo'")or die ("Não é possível retornar os dados");
    $linha=mysqli_fetch_array($resultado1);
    $Matricula  =$linha["matricula"];
    $Nome       =$linha["nome_aluno"];
    $Endereço   =$linha["endereco"];
    $Cidade     =$linha["nome_cid"];
    $Curso      =$linha["nome_curso"];
    
    print("<h3>Deletando o aluno(a)</h3><p>");
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
      <input name ="submit" type="submit" value="Confirmar Deletar"/>
    </form>
    <button><a href="./lista_alunos.php">Cancelar e voltar</a></button>
  </div>

</body>
</html>
