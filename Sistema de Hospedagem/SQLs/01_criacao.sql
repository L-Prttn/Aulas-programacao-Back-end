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
);

CREATE TABLE tipos_quartos (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descricao TEXT
);

CREATE TABLE quartos (
    id BIGSERIAL PRIMARY KEY,
    numero BIGINT NOT NULL UNIQUE,
    tipos_quartos_id BIGINT NOT NULL,
    capacidade SMALLINT NOT NULL,
    valor_diaria NUMERIC(10,2) NOT NULL,
    situacao VARCHAR(30) NOT NULL DEFAULT 'Disponível',
    
    CONSTRAINT fk_quartos_tipos_quartos
        FOREIGN KEY (tipos_quartos_id)
        REFERENCES tipos_quartos (id)
        ON DELETE RESTRICT,
    CONSTRAINT ck_quartos_situacao
        CHECK (situacao IN ('Disponível', 'Manutenção', 'Inativo')),
    CONSTRAINT ck_quartos_capacidade
        CHECK (capacidade > 0),
    CONSTRAINT ck_quartos_valor_diaria
        CHECK (valor_diaria >= 0)
);

CREATE TABLE reservas (
    id BIGSERIAL PRIMARY KEY,
    hospedes_id BIGINT NOT NULL,
    quartos_id BIGINT NOT NULL,
    data_entrada DATE NOT NULL,
    data_saida DATE NOT NULL,
    qtd_hospedes BIGINT NOT NULL,
    situacao VARCHAR(30) NOT NULL DEFAULT 'Reservado',
    observacao TEXT,

    CONSTRAINT fk_reservas_hospedes
        FOREIGN KEY (hospedes_id)
        REFERENCES hospedes (id)
        ON DELETE RESTRICT,
    CONSTRAINT fk_reservas_quartos
        FOREIGN KEY (quartos_id)
        REFERENCES quartos (id)
        ON DELETE RESTRICT,
    CONSTRAINT ck_reservas_situacao
        CHECK (situacao IN ('Reservado', 'Hospedado', 'Finalizado', 'Cancelado')),
    CONSTRAINT ck_reservas_qtd_hospedes
        CHECK (qtd_hospedes > 0),
    CONSTRAINT ck_reservas_datas
        CHECK (data_saida > data_entrada)
);

CREATE TABLE servicos (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco NUMERIC(10, 2) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,

    CONSTRAINT ck_servicos_preco
    CHECK (preco >= 0)
);

CREATE TABLE servicos_da_reserva (
    id BIGSERIAL PRIMARY KEY,
    reservas_id BIGINT NOT NULL,
    servicos_id BIGINT NOT NULL,
    quantidade BIGINT NOT NULL DEFAULT 1,

    CONSTRAINT fk_servicos_da_reserva_reservas
        FOREIGN KEY (reservas_id)
        REFERENCES reservas (id)
        ON DELETE RESTRICT,    
    CONSTRAINT fk_servicos_da_reserva_servicos
        FOREIGN KEY (servicos_id)
        REFERENCES servicos (id)
        ON DELETE RESTRICT,
    CONSTRAINT ck_servicos_da_reserva_quantidade
        CHECK (quantidade > 0),
    CONSTRAINT uq_servicos_da_reserva
        UNIQUE (reservas_id, servicos_id)
);

CREATE TABLE pagamentos (
    id BIGSERIAL PRIMARY KEY,
    reservas_id BIGINT NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    data_pagamento DATE NOT NULL,
    forma_pagamento VARCHAR(30) NOT NULL,
    situacao VARCHAR(30) NOT NULL DEFAULT 'Pendente',

    CONSTRAINT fk_pagamentos_reservas
        FOREIGN KEY (reservas_id)
        REFERENCES reservas (id)
        ON DELETE RESTRICT,
    CONSTRAINT ck_pagamentos_forma_pagamento
        CHECK (forma_pagamento IN ('Dinheiro', 'Cartão de crédito', 'Cartão de débito', 'Pix')),
    CONSTRAINT ck_pagamentos_situacao
        CHECK (situacao IN ('Pendente', 'Pago')),
    CONSTRAINT ck_pagamentos_valor
        CHECK (valor > 0)
);


CREATE EXTENSION IF NOT EXISTS btree_gist;

    ALTER TABLE reservas
    ADD CONSTRAINT reservas_sem_conflito
    EXCLUDE USING GIST (
        quartos_id WITH =,
        daterange(data_entrada, data_saida, '[)') WITH &&
    )
    WHERE (situacao <> 'Cancelado');

COMMIT;