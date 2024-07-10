# Teste para Vaga de Emprego Para Life

## Descrição

Este projeto é um teste para uma vaga de emprego na Life. Ele consiste em uma API desenvolvida com Laravel. Abaixo estão os passos necessários para configurar e rodar o projeto em seu ambiente local.

## Pré-requisitos

### Ambiente de Desenvolvimento
- PHP
- Composer
- Servidor web (Apache ou Nginx) com suporte ao PHP

### Banco de Dados
- Verifique se o banco de dados MySQL está configurado e acessível.

## Passos para Rodar o Projeto

### Clonar o Projeto
1. Clone o repositório do projeto do Git:
    ```bash
    git clone https://github.com/aldeirnohan/teste-emprego-life.git
    ```

### Instalar Dependências
1. Abra um terminal na raiz do projeto.
2. Execute o comando abaixo para instalar todas as dependências do Laravel listadas no arquivo `composer.json`:
    ```bash
    composer install
    ```

### Configurar o Arquivo `.env`
1. Faça uma cópia do arquivo `.env.example` e renomeie para `.env`:
    ```bash
    cp .env.example .env
    ```
2. Configure as variáveis de ambiente necessárias, como conexão com o banco de dados (`DB_*`).

### Rodar as Migrations
1. Para criar as tabelas no banco de dados, execute o comando abaixo no terminal:
    ```bash
    php artisan migrate
    ```

### Iniciar o Servidor
1. Para iniciar o servidor local do Laravel, execute:
    ```bash
    php artisan serve
    ```
2. Isso iniciará um servidor de desenvolvimento na porta padrão (geralmente [http://localhost:8000](http://localhost:8000)).

## Documentação da API

A API está disponível em [http://localhost:8000/api](http://localhost:8000/api).

## Contato

Para mais informações, entre em contato com:

- Aldeir Nohan: [aldeir_nohan03@live.com](mailto:aldeir_nohan03@live.com)

## Versão

- 1.0.0
