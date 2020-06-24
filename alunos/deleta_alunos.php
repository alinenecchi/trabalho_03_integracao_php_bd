<?php
	$codigo=$_GET['cod'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	$resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where cidades.cod_cidade=alunos.cidade and cursos.codigo=alunos.curso and matricula= '$codigo'")or die ("Não é possível retornar os dados");
	$linha=mysqli_fetch_array($resultado1);
	$Matricula  =$linha["matricula"];
	$Nome       =$linha["nome_aluno"];
	$Endereço   =$linha["endereco"];
	$Cidade     =$linha["nome_cid"];
	$Curso      =$linha["nome_curso"];
	
	print("<h1>Deletando o cadastro de: $Nome</h1><p>");
	print("Matricula: $Matricula<br>");
	print("Nome: <b>$Nome</b><br>");
	print("Endereço: $Endereço<br>");
	print("Cidade: $Cidade<br>");
    print("Curso: $Curso");

    function deletar($numero){
        mysqli_query($GLOBALS['ok'], "delete from alunos where matricula = $numero") 
        or die ("Não é possível excluir este cadastro!");
    };
?>
    <div>
		<button onclick="<?php deletar($Matricula) ?>"><a href="lista_alunos.php">Confirma Deletar</a></button>
		<button><a href="lista_alunos.php">Cancelar e voltar</a></button>
    </div>

