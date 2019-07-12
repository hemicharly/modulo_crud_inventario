# Configurando Ambiente de desenvolvimento, com sistema operacional Linux Ubuntu

# Instalando os pacotes no ubuntu:
    sudo add-apt-repository ppa:ondrej/php
    sudo apt-get update
    sudo apt-get upgrade
    sudo apt-get install php7.2 php7.2-common php7.2-cli php7.2-fpm apache2 -y
    sudo apt-get install libapache2-mod-php7.2 php7.2-xml php7.2-opcache php7.2-mbstring php7.2-zip -y
    sudo apt-get install php7.2-mysql mysql-server-5.7 mysql-client-5.7 -y
    sudo a2enmod php7.2
  
# Framework Laravel
    versão: 5.8
  
# Instalando composer verifique o link:
    https://getcomposer.org/download/

# Criando database no mysql:
    create database base;

# Configurando a comunicação do projeto ao database mysql no arquivo .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=base
    DB_USERNAME=username
    DB_PASSWORD=password

# Executando migrate no projeto para criar as tabelas:
    php artisan migrate:fresh

# Instando o nodejs verifique o link:
    https://nodejs.org/en/download/

# Instalando as dependências:
    npm install yarn -g
    yarn
    yarn dev

# Iniciando a aplicação:
    yarn start
