<?php
	$codigo=$_GET['cod'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	$resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where matricula= '$codigo'");
	$linha=mysqli_fetch_array($resultado1);
	$Matricula  =$linha["matricula"];
	$Nome       =$linha["nome_aluno"];
	$Endereco   =$linha["endereco"];
   $Cidade     =$linha["nome_cid"];
   $Cod_cidade =$linha["cod_cidade"];
   $Curso      =$linha["nome_curso"];
	$Cod_curso  =$linha["codigo"];
	print("<h1>Alterando os dados do aluno: $Nome</h1><p>");
?>
<form action="./confirma_alteracao_aluno.php" method="get">
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
<p><input type="submit" value="Alterar Dados"></p>
</form>
<br><a href="../index.php">Cancelar e voltar</a>
