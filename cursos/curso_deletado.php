<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Deletar Curso</title>
    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/cursos.css";
    </style>
</head>

<body>
  <?php
    $cod_del = $_POST['cod_del'];
    $nome = $_POST['nome'];
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $result=mysqli_query($ok, "delete from cursos where cod_curso='$cod_del'") 
    or die ("Não é possível excluir este curso!");
    echo "<div class='aviso'><h2>$nome deletado com sucesso!</h2></div>";
  ?>
  <button><a href="lista_curso.php">Voltar</a></button>
</body>
</html>





