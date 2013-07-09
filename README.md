Vocablearner
============

Introduction
------------
Vocablearner


Installation
------------

    php composer.phar install

Virtual Host
------------

    <VirtualHost *:80>
        ServerName vocablearner.localhost
        DocumentRoot C:\xampp\htdocs\vocablearner-server\public
        SetEnv APPLICATION_ENV "development"
        <Directory C:\xampp\htdocs\vocablearner-server\public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>

Database
--------

    ./vendor/bin/doctrine-module orm:schema-tool:create