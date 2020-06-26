<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inserir Alunos</title>

      <style type="text/css">
        @import "../css/stylesheet.css";
        @import "../css/alunos.css";
      </style>
    </head>

    <body>
        <div id="header">
          <h1>Inserir Alunos</h1>
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form">
            <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required><br><br>
            <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" required><br><br>
            <label for="cidade">Cidade:</label>
                <select name="cidade" id="cidade" required>
                  <option disabled selected value=''>Selecione...</option>
                <?php
                require("../conecta.inc.php");
                $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
                $resultado=mysqli_query($ok, "Select * from cidades order by nome_cid") or die ("Não é possível consultar departamentos.");
                while ($linha=mysqli_fetch_array($resultado))
                {
                $Cidade=$linha["cod_cidade"];
                $NomeCid=$linha["nome_cid"];
                print("<option value='$Cidade'>$NomeCid</option>");
                };
                ?>
                </select><br><br>
            <label for="curso">Curso:</label>
                <select name="curso" id="curso" required>
                  <option disabled selected value=''>Selecione...</option>
                <?php
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
            $visibilidade = isset($_POST['submit']) ? "" : "display='none'";
            echo "<div $visibilidade>";            
            if(isset($_POST['submit']))
            {
                $nome = mb_strtoupper($_POST['nome']);
                $endereco = $_POST['endereco'];
                $curso = $_POST['curso'];
                $cidade = $_POST['cidade'];
                $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.>");
                mysqli_query($ok, "insert into alunos (nome_aluno, endereco, cidade, curso) values ('$nome', '$endereco', '$cidade', '$curso')")
                or die ("Não é possível inserir aluno!");
                echo "<script>alert('$nome inserida(o) com sucesso!')</script>";
            }
            echo "</div>";
        ?> 
    </body>
</html>
 