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
values ("Analista de Projetos","8000","Atuar com rotinas gerais relacionadas a projetos de TI;<br> Realizar cotação para os projetos (ISP), mantendo contato e bom relacionamento com fornecedores e clientes;<br> Acompanhar os custos dos projetos bem como previsão e faturamento", "Conhecimento em processos da área de projetos;<br> Experiência na área de redes;<br> Pacote Office;<br> Inglês avançado");

insert into vaga (nome_vaga,salario_vaga,descricao_vaga,requisitos_vaga) 
values ("Programador júnior","4500", "Buscamos um profissional para desenvolvimento, implantação e manutenção de sistemas", "Superior Completo na área Tecnologia da Informação ou afins;<br> Conhecimento em #C.Net, SQL, ASP,MVC.<br> Habilidade para resolução de problemas sistêmicos");

insert into vaga (nome_vaga,salario_vaga,descricao_vaga,requisitos_vaga) 
values ("Analista de Suporte Pleno","6500", "Correções sistêmicas para solucionar ou encaminhar para equipe de soluções criticas;<br> Prover liberação de acessos aos sistemas", "Ensino técnico ou superior nas áreas de TI, Ciências da Computação, Sistema de Informações, Engenharia da Informação, Engenharia da Computação ou áreas correlatas;<br> Conhecimento de GIT;<br> Familiaridade com APIs");


