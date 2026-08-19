-- ============================================================================
-- CRIAÇÃO DO BANCO DE DADOS
-- ============================================================================

BEGIN;

CREATE SCHEMA IF NOT EXISTS hotel_pousada;
SET search_path TO hotel_pousada;

-- ============================================================================
-- 1. ESTRUTURA DO BANCO
-- ============================================================================

CREATE TABLE hospedes (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cpf CHAR(11) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(255),
    criado_em TIMESTAMPTZ NOT NULL DEFAULT NOW()
)

CREATE TABLE tiposQuartos (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descricao TEXT
)

CREATE TABLE quartos (
    id BIGSERIAL PRIMARY KEY,
    numero BIGINT NOT NULL,
    tipoQuarto_id BIGINT NOT NULL,
    capacidade SMALLINT NOT NULL,
    valorDiaria DECIMAL NOT NULL,
    situacao VARCHAR(30) NOT NULL DEFAULT 'Disponível',
    
    CONSTRAINT fk_quartos_tiposQuartos
        FOREIGN KEY (tipoQuarto_id)
        REFERENCES tiposQuartos (id)
        ON DELETE RESTRICT,
    CONSTRAINT ck_quartos_situacao
        CHECK (situacao IN ('Disponível', 'Ocupado', 'Manutenção', 'Inativo')),
)

CREATE TABLE reserva (
    id BIGSERIAL PRIMARY KEY,
    hospedes_id BIGINT NOT NULL,
    quartos_id BIGINT NOT NULL,
    dataEntrada 
)


CREATE TABLE servicos (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco NUMERIC(10, 2) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE
)

CREATE TABLE pagamentos (
    id BIGSERIAL PRIMARY KEY,

)










CREATE TABLE categorias (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    descricao TEXT,
    criado_em TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE produtos (
    id BIGSERIAL PRIMARY KEY,
    categoria_id BIGINT NOT NULL,
    nome VARCHAR(200) NOT NULL,
    sku VARCHAR(30) NOT NULL UNIQUE,
    preco NUMERIC(10, 2) NOT NULL CHECK (preco > 0),
    estoque INTEGER NOT NULL DEFAULT 0 CHECK (estoque >= 0),
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em TIMESTAMPTZ NOT NULL DEFAULT NOW(),

    CONSTRAINT fk_produtos_categoria
        FOREIGN KEY (categoria_id)
        REFERENCES categorias (id)
        ON DELETE RESTRICT
);

CREATE TABLE clientes (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE enderecos (
    id BIGSERIAL PRIMARY KEY,
    cliente_id BIGINT NOT NULL,
    apelido VARCHAR(50) NOT NULL DEFAULT 'Principal',
    logradouro VARCHAR(180) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    complemento VARCHAR(80),
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado CHAR(2) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    principal BOOLEAN NOT NULL DEFAULT FALSE,

    CONSTRAINT fk_enderecos_cliente
        FOREIGN KEY (cliente_id)
        REFERENCES clientes (id)
        ON DELETE CASCADE
);

CREATE TABLE pedidos (
    id BIGSERIAL PRIMARY KEY,
    cliente_id BIGINT NOT NULL,
    endereco_id BIGINT,
    status VARCHAR(20) NOT NULL DEFAULT 'pendente',
    total NUMERIC(10, 2) NOT NULL DEFAULT 0 CHECK (total >= 0),
    criado_em TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    atualizado_em TIMESTAMPTZ NOT NULL DEFAULT NOW(),

    CONSTRAINT ck_pedidos_status
        CHECK (status IN ('pendente', 'pago', 'enviado', 'entregue', 'cancelado')),
    CONSTRAINT fk_pedidos_cliente
        FOREIGN KEY (cliente_id)
        REFERENCES clientes (id)
        ON DELETE RESTRICT,
    CONSTRAINT fk_pedidos_endereco
        FOREIGN KEY (endereco_id)
        REFERENCES enderecos (id)
        ON DELETE SET NULL
);

CREATE TABLE itens_pedido (
    id BIGSERIAL PRIMARY KEY,
    pedido_id BIGINT NOT NULL,
    produto_id BIGINT NOT NULL,
    quantidade INTEGER NOT NULL CHECK (quantidade > 0),
    preco_unitario NUMERIC(10, 2) NOT NULL CHECK (preco_unitario >= 0),

    CONSTRAINT uq_itens_pedido_produto
        UNIQUE (pedido_id, produto_id),
    CONSTRAINT fk_itens_pedido_pedido
        FOREIGN KEY (pedido_id)
        REFERENCES pedidos (id)
        ON DELETE CASCADE,
    CONSTRAINT fk_itens_pedido_produto
        FOREIGN KEY (produto_id)
        REFERENCES produtos (id)
        ON DELETE RESTRICT
);

-- Índices para consultas realizadas na aula.
CREATE INDEX idx_produtos_categoria ON produtos (categoria_id);
CREATE INDEX idx_enderecos_cliente ON enderecos (cliente_id);
CREATE INDEX idx_pedidos_cliente_status ON pedidos (cliente_id, status);
CREATE INDEX idx_pedidos_status_criado_em ON pedidos (status, criado_em DESC);
CREATE INDEX idx_itens_pedido_pedido ON itens_pedido (pedido_id);
CREATE INDEX idx_itens_pedido_produto ON itens_pedido (produto_id);
