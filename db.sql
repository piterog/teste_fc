USE teste_fc;
CREATE TABLE fc_medicos (
    id integer not null auto_increment primary key,
    email varchar(112) not null,
    nome varchar(112) not null,
    senha varchar(112) not null,
    endereco_consultorio varchar(112) not null,
    data_criacao datetime not null,
    data_alteracao datetime not null
);
SET character_set_client = utf8;
SET character_set_connection = utf8;
SET character_set_results = utf8;
SET collation_connection = utf8_general_ci;