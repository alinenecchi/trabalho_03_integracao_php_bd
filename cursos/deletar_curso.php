<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Deletar Curso</title>

    <style type="text/css">
    @import "../css/stylesheet.css";
    @import "../css/alunos.css";
    </style>
</head>

<body>
<?php
    $codigo = $_GET['codigo'];
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $result=mysqli_query($ok, "select * from cursos where cod_curso='$codigo'") 
    or die ("Não é possível retornar dados dos cursos!");
    $linha=mysqli_fetch_array($result);
    $cod_curso = $linha["cod_curso"];
    $nome_curso =$linha["nome_curso"];
    $data_abertura=$linha["data_abertura"];

    print("<div><h3>Deletando o curso:</h3>");
    print("Código: $cod_curso<br>");
    print("Nome do curso: <b>$nome_curso</b><br>");
    print("Data de abertura: $data_abertura</div>");

    function deletar($numero){
        mysqli_query($GLOBALS['ok'], "delete from cursos where cod_curso = $numero") 
        or die ("Não é possível excluir este curso!");
    };
?>
    <div>
        <button onclick="<?php deletar($cod_curso) ?>"><a href="lista_curso.php">Confirma Deletar</a></button>
        <button><a href="lista_curso.php">Cancelar e voltar</a></button>
    </div>

</body>
</html>
