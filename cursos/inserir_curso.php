<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Cursos</title>

      <style type="text/css">
        @import "../css/stylesheet.css";
        @import "../css/cursos.css";
      </style>
    </head>

    <body>
      <div id="header">
        <h1>Inserir Curso</h1>
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
        
      <form action="" method="GET" id="form">
        <label for="nome_curso" id="nome_curso">Nome do Curso:</label>
        <input type="text" name="nome_curso" id="nome_curso" required style="margin-left: 3px"><br><br>
        <label for="data_abertura" id="data_abertura">Data de abertura:</label>
        <input type="text" name="data_abertura" placeholder="aaaa-mm-dd">
        
        <p><input name ="submit" type="submit" value="Salvar" id="salvar"/>
        <input type="reset" value="Limpar" id="limpar"/></p>
      </form>

        <?php
            require("../conecta.inc.php");
            $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
            
            $visibilidade = isset($_GET['submit']) ? "" : "display='none'";
            echo "<div $visibilidade>";            
            
            if(isset($_GET['submit']))
            {
                $nome_curso = mb_strtoupper($_GET['nome_curso']);
                $data_abertura = $_GET['data_abertura'];
                $results= mysqli_query($ok,"select * from cursos where cursos.nome_curso = '$nome_curso'");
                if(mysqli_num_rows($results) === 0){
                mysqli_query($ok, "insert into cursos (nome_curso, data_abertura) values('$nome_curso', '$data_abertura')")
                or die ("Não é possível inserir curso!");
                echo "<script>alert('$nome_curso inserido com sucesso!')</script>";
              }else{
                echo "<script>alert('Este curso já existe')</script>";
                exit;
               }
            }
            echo "</div>";
        ?> 
    </body>
</html>
