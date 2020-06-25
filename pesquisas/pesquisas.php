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
      &nbsp;&nbsp;<input type="submit" value="Pesquisar Cidade">
    </form>

    <form action="resultados.php" method="get" class="form">
      Estado: <input type="text" name="fone">
      <input type="hidden" name="id" value="2">
      &nbsp;&nbsp;<input type="submit" value="Pesquisar Estado">
    </form>

    <form action="resultados.php" method="get" class="form">
      Cidades: <select name="cidades">
    <option value="Escolha" selected></option>

<?php
require("conecta.inc.php");
$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$resultado=mysqli_query($ok, "Select * from cidades") or die ("Não é possível consultar as cidades.");
while ($linha=mysqli_fetch_array($resultado))
{
    $Cod_cidade     =$linha["cod_cidade"];
    $Nome_cidade    =$linha["nome_cid"];
    print("<option value='$Cod_cidade'>$Nome_cidade</option>");
}
?>

</select>
<input type="hidden" name="id" value="3">
&nbsp;&nbsp;<input type="submit" value="Pesquisar Alunos">
</form>
<hr>
<p><a href="../index.php">Página inicial</a>
<?php
?>
    </body>
</html>