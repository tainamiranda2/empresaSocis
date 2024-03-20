## tabelas

### CREATE TABLE empresa (
app(#     id SERIAL PRIMARY KEY,
app(#     nome VARCHAR(255),
app(#     endereco VARCHAR(255),
app(#     telefone VARCHAR(255)
app(# );

CREATE TABLE cliente (
app(#     id SERIAL PRIMARY KEY,
app(#     nome VARCHAR(255),
app(#     email VARCHAR(255),
app(#     telefone VARCHAR(255),
app(#     empresa_id INT REFERENCES empresa(id)
app(# );