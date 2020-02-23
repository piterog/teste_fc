## Requisitos
* PHP 7.2;
* Bootstrap 4;
* jQuery 3.4.1;
* Docker 19.03.6;
* Mysql 5.7.29

## Como usar
* Foi inicializado um servidor local utilizando `php -S localhost:8888`;
* O arquivo de configuração do banco de dados se encontra em: src/model/config-banco-dados.php;
* O Sql para o bando de dados se encontra em db.sql;
* Caso queria testar somente a validação do backend, no arquivo `src/view/medicos/edit.php` na linha 55, tem um switch para este propósito;