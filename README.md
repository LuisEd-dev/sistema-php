# sistema-php

### Para Windows: 

* Instale XAMPP

* Clone ou faça o download do projeto

* No Painel de Controle do XAMPP inicie os serviços Apache e MySQL

__Configuração do Apache:__

Se utilizou as opções padrões para instalação do XAMPP, vá para o diretório: “C:/xampp/htdocs”, delete todo conteúdo da pasta e mova todos os arquivos do projeto para cá

__Configuração do MySQL:__

No Painel de Controle do XAMPP abra uma shell

Execute os seguintes comandos:

- mysql --user=root
- DROP DATABASE test;
- CREATE DATABASE adminsistema;
- USE adminsistema;
    CREATE TABLE admin ( 
    id INT NOT NULL AUTO_INCREMENT ,
    usuario VARCHAR(255) NOT NULL ,
    senha VARCHAR(255) NOT NULL ,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));
- INSERT INTO admin (usuario, senha, email) VALUES ("admin", MD5("admin"), "admin@email.com");
- CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT ,
    produto VARCHAR(255) NOT NULL ,
    valor VARCHAR(255) NOT NULL ,
    estoque VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));
- CREATE TABLE newsletter(
	  id INT NOT NULL AUTO_INCREMENT,
	  nome VARCHAR(255) NOT NULL,
	  email VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));

### Para Linux: 

* Instale Apache, MariaDB e MySQL

Inicie todos os serviços

__Configuração do Apache:__

Clone o projeto no diretório /var/www/html

__Configuração do MySQL:__

Abra uma shell

Execute os seguintes comandos:

- mysql --user=root
- DROP DATABASE test;
- CREATE DATABASE adminsistema;
- USE adminsistema;
    CREATE TABLE admin ( 
    id INT NOT NULL AUTO_INCREMENT ,
    usuario VARCHAR(255) NOT NULL ,
    senha VARCHAR(255) NOT NULL ,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));
- INSERT INTO admin (usuario, senha, email) VALUES ("admin", MD5("admin"), "admin@email.com");
- CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT ,
    produto VARCHAR(255) NOT NULL ,
    valor VARCHAR(255) NOT NULL ,
    estoque VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));
- CREATE TABLE newsletter(
	  id INT NOT NULL AUTO_INCREMENT,
	  nome VARCHAR(255) NOT NULL,
	  email VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));

__Configuração do Newsletter:__

- No arquivo C:\xampp\php\php.ini remova o ';' que antecede "extension=openssl"
- No arquivo C:\xampp\php\php.ini encontre '[mail function]' e cole a seguinte configuração:

SMTP=smtp.gmail.com<br>
smtp_port=587<br>
sendmail_from = __seu-email@gmail.com__<br>
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"<br>

- No Arquivo C:\xampp\sendmail\sendmail.ini realize as seguintes configurações:

smtp_server=smtp.gmail.com<br>
smtp_port=587<br>
error_logfile=error.log<br>
debug_logfile=debug.log<br>
auth_username=seu-email@gmail.com<br>
auth_password=sua-senha<br>
force_sender=luised-dev@sistemaphp.com<br>

- Configure o Gmail para aceitar o uso de apps menos seguros
