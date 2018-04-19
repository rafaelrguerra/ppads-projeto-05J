drop table vaga;
drop table arquivo;

create table vaga(
    id_vaga smallint primary key auto_increment,
    nome_vaga varchar(50) not null,
    salario_vaga float,
    descricao_vaga varchar (300),
    requisitos_vaga varchar (300)
);

create table arquivo (
    id_arquivo smallint primary key auto_increment,
    arquivo varchar (40) not null,
    id_vaga smallint not null,
    email_candidato varchar (100) not null,
    data datetime not null
);



insert into vaga (nome_vaga,salario_vaga,descricao_vaga,requisitos_vaga) 
values ("Analista de Projetos","8000","Atuar com rotinas gerais relacionadas a projetos de TI;<br> Realizar cota��o para os projetos (ISP), mantendo contato e bom relacionamento com fornecedores e clientes;<br> Acompanhar os custos dos projetos bem como previs�o e faturamento", "Conhecimento em processos da �rea de projetos;<br> Experi�ncia na �rea de redes;<br> Pacote Office;<br> Ingl�s avan�ado");

insert into vaga (nome_vaga,salario_vaga,descricao_vaga,requisitos_vaga) 
values ("Programador j�nior","4500", "Buscamos um profissional para desenvolvimento, implanta��o e manuten��o de sistemas", "Superior Completo na �rea Tecnologia da Informa��o ou afins;<br> Conhecimento em #C.Net, SQL, ASP,MVC.<br> Habilidade para resolu��o de problemas sist�micos");

insert into vaga (nome_vaga,salario_vaga,descricao_vaga,requisitos_vaga) 
values ("Analista de Suporte Pleno","6500", "Corre��es sist�micas para solucionar ou encaminhar para equipe de solu��es criticas;<br> Prover libera��o de acessos aos sistemas", "Ensino t�cnico ou superior nas �reas de TI, Ci�ncias da Computa��o, Sistema de Informa��es, Engenharia da Informa��o, Engenharia da Computa��o ou �reas correlatas;<br> Conhecimento de GIT;<br> Familiaridade com APIs");


