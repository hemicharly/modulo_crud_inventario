## modulo_crud_inventario

# Configurando Ambiente de desenvolvimento, com sistema operacional Linux Ubuntu

# Instalar pacotes no ubuntu:
    sudo add-apt-repository ppa:ondrej/php
    sudo apt-get update
    sudo apt-get upgrade
    sudo apt-get install php7.2 php7.2-common php7.2-cli php7.2-fpm apache2 -y
    sudo apt-get install libapache2-mod-php7.2 php7.2-xml php7.2-opcache php7.2-mbstring php7.2-zip -y
    sudo apt-get install php7.2-mysql mysql-server-5.7 mysql-client-5.7 -y
    sudo a2enmod php7.2

# Instalando composer verifique o link:
    https://getcomposer.org/download/

# Criar database no mysql:
    create database superlogica;

# Configurar a comunicação do projeto a database mysql no arquivo .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=superlogica
    DB_USERNAME=root
    DB_PASSWORD=root

# Executar migrate no projeto para criar as tabelas:
    php artisan migrate:fresh

# Instalando dependências:
    npm install yarn
    yarn
    yarn dev

# Iniciando aplicação:
    yarn start
