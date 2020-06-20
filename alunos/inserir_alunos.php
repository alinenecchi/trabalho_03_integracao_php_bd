<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alunos</title>
    </head>

    <body>
        <h2>Inserir Aluno</h2>
        <form action="" method="GET">
            <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required><br><br>
            <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" required><br><br>
            <label for="cidade">Cidade:</label>
                <select name="cidade" id="cidade" required>
                <?php
                include("./conecta.inc.php");
                $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
                $resultado=mysqli_query($ok, "Select * from cidades order by nome_cid") or die ("Não é possível consultar departamentos.");
                while ($linha=mysqli_fetch_array($resultado))
                {
                $Cidade=$linha["cod_cidade"];
                $NomeCid=$linha["nome_cid"];
                print("<option value='$Cidade'>$NomeCid</option>");
                };
                echo "</select><br><br>";
            echo "<label for='curso'>Curso:</label>";
                echo "<select name='curso' id='curso' required>";
                $resultado2=mysqli_query($ok, "Select * from cursos order by nome_curso") or die ("Não é possível consultar departamentos.");
                while ($linha2=mysqli_fetch_array($resultado2))
                {
                $Codigo=$linha2["codigo"];
                $NomeCur=$linha2["nome_curso"];
                print("<option value='$Codigo'>$NomeCur</option>");
                };
                ?>
                </select><br><br>
            <input name ="submit" type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        </form>
        <?php
            $visibilidade = isset($_GET['submit']) ? "" : "display='none'";
            echo "<div $visibilidade>";            
            if(isset($_GET['submit']))
            {
                $nome = mb_strtoupper($_GET['nome']);
                $endereco = $_GET['endereco'];
                $curso = $_GET['curso'];
                $cidade = $_GET['cidade'];
                require("conecta.inc.php");
                $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.>");
                mysqli_query($ok, "insert into alunos (nome_aluno, endereco, curso) values ('$nome', '$endereco', '$cidade', '$curso')")
                or die ("Não é possível inserir aluno!");
                print("$nome inserida(o) com sucesso!");
            }
            echo "<br><a href='index.php'>Voltar</a>";
            echo "</div>";
        ?> 
    </body>
</html>
