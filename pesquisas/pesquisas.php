<?php
//=>mostrar dados das cidades a partir de parte do nome da cidade que é informado
	SELECT * FROM cidades where nome_cid LIKE '%busca%'

//=>mostrar nome e endereço dos alunos q residem em uma cidade escolhida em uma listagem
	SELECT nome_aluno, endereco FROM alunos, cidades WHERE alunos.cidade=cidades.cod_cidade and cidades.cod_cidade=$busca_cidade

//=>mostrar os dados de tds os alunos que fazem o curso escolhido na lista ( tipo a funcionalidade de cima)
	SELECT nome_aluno, endereco, cidade, curso FROM alunos, cursos WHERE alunos.curso=cursos.codigo and cursos.codigo=%busca_codigo

//=>mostrar o nome dos estados a partir de parte do nome que é informada, por ex, numa caixa de texto
    SELECT nome_est FROM estados where nome_est = '%busca_estado%'
    
?>