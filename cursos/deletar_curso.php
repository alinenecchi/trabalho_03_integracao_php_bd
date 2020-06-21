
<?php
$cod_curso = $_GET['cod'];
require("conecta.inc.php");
$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$result=mysqli_query($ok, "select * from cursos where
cod_curso ='$cod_curso'") or die ("Não é possível retornar dados dos cursos!");
$linha=mysqli_fetch_array($result);
$cod_curso = $linha["cod_curso"];
$nome_curso =$linha["nome_curso"];
$data_abertura=$linha["data_abertura"];

print("<h3>Deletando o curso:</h3><p>");
print("cod_curso: $cod_curso<br>");
print("nome_curso: <b>$nome_curso</b><br>");
print("data_abertura: $data_abertura");
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
<input type="hidden" name="cod_del" value="<?php print($cod_curso)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="lista_curso.php">Cancelar e voltar</a>

<?php
            $visibilidade = isset($_GET['submit']) ? "" : "display='none'";
            echo "<div $visibilidade>";            
            if(isset($_GET['submit']))
            {
								$curso = $_GET['cod_del'];
                mysqli_query($ok, "")
                or die ("Não é possível excluir este curso!");
                echo "<script>alert('Excluido com sucesso!')</script>";
            }

            echo "</div>";
        ?> 