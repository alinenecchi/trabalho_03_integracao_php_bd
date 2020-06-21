<?php
	$Matricula=$_GET['cod_aluno'];
	require("conecta.inc.php");
	$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	$resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where cidades.cod_cidade=aluno.cidade, cursos.cod_curso = aluno.curso and cod_cidade = '$cod_cidade', cod_curso = '$cod_curso'") or die ("Não é possível retornar dados do Aluno!");
	$linha=mysqli_fetch_array($resultado1);
	$Matricula=$linha["cod_aluno"];
	$Nome=$linha["nomea"];
	$Endereco=$linha["endereco"];
  $Cidade=$linha["nome_cid"];
  $Cod_cidade=$linha["cod_cidade"];
  $Estado=$linha["nome_est"];
  $Cod_estado=$linha["cod_estado"];
  $Curso=$linha["nome_cur"];
	$Cod_curso=$linha["cod_curso"];
	print("<h3>Alterando os dados do aluno:</h3><p>");
?>
<form action="confirma_alteracao_aluno.php" method="get">
Matrícula: <?php print($Matricula)?>
<input type="hidden" name="cod_alter" value="<?php print($Matricula)?>">
<br>Nome: <input type="text" name="nome_alter" value="<?php print($Nome)?>">
<br>Endereco: <input type="text" name="endereco_alter" value="<?php print($Endereco)?>">
<br>Cidade: <select name="cidade_alter">
<option value="<?php print("$Cod_cidade");?>" selected><?php print("$Cidade");?></option> 
<?php
$resultado2=mysqli_query($ok, "Select * cidades, where cod_cidade <> '$Cidade' order by nome_cid") or die ("Não é possível consultar as cidades"); 
while ($linha=mysqli_fetch_array($resultado2))
{
   $Cod_cidade=$linha["cod_cidade"];
   $Cidade=$linha["nome_cid"];
   print("<option value='$Cod_cidade'>$Cidade</option>");
}
?>
<br>Estado: <select name="estado_alter">
<option value="<?php print("$Cod_estado");?>" selected><?php print("$Estado");?></option> 
<?php
$resultado3=mysqli_query($ok, "Select * estados, where cod_estado <> '$Estado' order by nome_est") or die ("Não é possível consultar os Estados"); 
while ($linha=mysqli_fetch_array($resultado3))
{
   $Cod_estado=$linha["cod_estado"];
   $Estado=$linha["nome_est"];
   print("<option value='$Cod_estado'>$Estado</option>");
}
?>
<br>Curso: <select name="curso_alter">
<option value="<?php print("$Cod_curso");?>" selected><?php print("$Curso");?></option>
<?php
$resultado4=mysqli_query($ok, "Select * cursos, where cod_curso <> '$Curso' order by nome_cur") or die ("Não é possível consultar os cursos"); 

while ($linha=mysqli_fetch_array($resultado4))
{
   $Cod_curso=$linha["cod_curso"];
   $Curso=$linha["nome_cur"];
   print("<option value='$Cod_curso'>$Curso</option>");
}
?>
</select>
<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="index.php">Cancelar e voltar</a>
