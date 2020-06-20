<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cursos</title>
    </head>

    <body>
        <h2>Inserir Curso</h2>
        <form action="" method="GET">
            <label for="nome_c" id="nome_c">Nome do Curso:</label>
                <input type="text" name="nome_c" id="nome_c" required><br><br>
            <label for="cod_c" id="cod_c">Codigo do Curso:</label>
                <input type="text" name="cod_c" id="cod_c" required><br><br>
            <label for="data_a" id="data_a">Data de abertura:</label>
                <input type="text" name="data_a" placeholder="dd-mm-aaaa">
            <input name ="submit" type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        </form>
        <?php
            $visibilidade = isset($_GET['submit']) ? "" : "display='none'";
            echo "<div $visibilidade>";            
            if(isset($_GET['submit']))
            {
                $nome_c = mb_strtoupper($_GET['nome_c']);
                $cod_c = $_GET['cod_c'];
                $data_a = $_GET['data_a'];
                require("conecta.inc.php");
                $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.>");
                mysqli_query($ok, "insert into curso (nome_c,cod_c,data_a) values('$nome_c', '$cod_c', '$data_a')")
                or die ("Não é possível inserir curso!");
                print("$nome_c inserida(o) com sucesso!");
            }
            echo "<br><a href='./index.php'>Voltar</a>";
            echo "</div>";
        ?> 
    </body>
</html>