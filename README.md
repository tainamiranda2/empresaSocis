Aqui está o README.md atualizado com os endpoints dos sócios:

```markdown
# API Symfony com Doctrine, Docker e PostgreSQL

Esta é uma API construída com Symfony, Doctrine, Docker e PostgreSQL para gerenciar informações de empresas e sócios.

## Comandos

### 1. Atualizar os containers Docker
```bash
docker-compose up
```

### 2. Criar uma nova migração
```bash
symfony console make:migration
```

### 3. Executar as migrações do Doctrine
```bash
symfony console doctrine:migrations:migrate
```

## Endpoints da API

### Empresas

#### 1. GET /empresa

Retorna todas as empresas cadastradas.

#### 2. PUT /empresa/{id}

Atualiza as informações de uma empresa existente com o ID especificado.

#### 3. DELETE /empresa/{id}

Exclui a empresa com o ID especificado.

#### 4. POST /empresa

Cria uma nova empresa com os dados fornecidos no corpo da solicitação.

Exemplo de corpo da solicitação:
```json
{
    "nome": "Nome da Empresa",
    "endereco": "Endereço da Empresa",
    "telefone": "Telefone da Empresa"
}
```

### Sócios

#### 1. GET /socio

Retorna todos os sócios cadastrados.

#### 2. PUT /socio/{id}

Atualiza as informações de um sócio existente com o ID especificado.

#### 3. DELETE /socio/{id}

Exclui o sócio com o ID especificado.

#### 4. POST /socio

Cria um novo sócio com os dados fornecidos no corpo da solicitação.

Exemplo de corpo da solicitação:
```json
{
    "nome": "Nome do Sócio",
    "endereco": "Endereço do Sócio",
    "telefone": "Telefone do Sócio",
    "empresa_id": 1
}
```
