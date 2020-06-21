<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cursos</title>
    </head>

    <body>
        <h2>Inserir Curso</h2>
        <form action="" method="GET">
            <label for="nome_curso" id="nome_curso">Nome do Curso:</label>
                <input type="text" name="nome_curso" id="nome_curso" required><br><br>
            <label for="cod_curso" id="cod_curso">Codigo do Curso:</label>
                <input type="text" name="cod_curso" id="cod_curso" required><br><br>
            <label for="data_abertura" id="data_abertura">Data de abertura:</label>
                <input type="text" name="data_abertura" placeholder="dd-mm-aaaa">
            <input name ="submit" type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        </form>
        <?php
            $visibilidade = isset($_GET['submit']) ? "" : "display='none'";
            echo "<div $visibilidade>";            
            if(isset($_GET['submit']))
            {
                $nome_curso = mb_strtoupper($_GET['nome_curso']);
                $cod_curso = $_GET['cod_curso'];
                $data_abertura = $_GET['data_abertura'];
                require("conecta.inc.php");
                $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.>");
                mysqli_query($ok, "insert into cursos (nome_curso,codigo,data_abertura) values('$nome_curso', '$cod_curso', '$data_abertura')")
                or die ("Não é possível inserir curso!");
                print("$nome_c inserida(o) com sucesso!");
            }
            echo "<br><a href='./index.php'>Voltar</a>";
            echo "</div>";
        ?> 
    </body>
</html>