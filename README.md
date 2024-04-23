
# PROJETO GAMEHUB

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local.


## 📋 Pré-requisitos

Você precisará ter instalado na sua maquina:

```bash
  • Docker e Docker compose  
  • Node.js e NPM
  • Git
```
    
## 🔧 Instalação - Back-End

### 1. Clonando o projeto

• Execute o comando no seu terminal e clone o repositório:

```bash
  $ git clone https://github.com/VitoCruzOlie/Planify.git
```

• Entre na pasta do projeto

```bash
  $ cd Planify
```

### 2. Preparando as dependências

• Entre na pasta api

```bash
  $ cd api
```

• Construir e rodar os containers:

```bash
  // Abra o seu docker desktop
```

```bash
  (Rode no path do docker-compose.yml)    
  $ npm run start:docker
```

• Instale as dependências:

```bash
  (entrar no terminal nginx docker)
  $ npm run bash
```

• Rode as migrations:

```bash    
  $ php artisan migrate
```

## 🔧 Instalação - Front-Env Vue

### 1. Preparando as dependências

• No diretório raiz, entre na pasta FRONT

```bash
  $ cd front
```

• Instale as dependências

```bash
  $ npm install
```

### 2. Ambiente de desenvolvimento

• Inicie o servidor front-end Vue

```bash
  $ npm run dev
```

• Aguarde o build do projeto, ao terminar, acesse no seu navegador:

  - Local:   http://localhost:5173/
  - Network: http://192.168.0.103:5173/

## 🛠️ Construído com

* [Vue.js](https://vuejs.org) - O framework web usado;
* [Laravel](https://laravel.com) - O framework back-end usado;
* [NPM](https://www.npmjs.com) - Gerente de Dependência;
* [Composer](https://getcomposer.org) - Gerente de Dependência;

## Features para implementar

* aaaaaaaaa

## ✒️ Autores

* **Davi Souza** - *Desenvolvimento Completo* - [Davi Souza](https://www.linkedin.com/in/davi-souza-745155246/)
* **Victor Cruz** - *Desenvolvimento Completo* - [Davi Souza](https://www.linkedin.com/in/davi-souza-745155246/)

## 📄 Licença

- [MIT](https://choosealicense.com/licenses/mit/)

---

![linkedin](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)
![linkedin](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)

