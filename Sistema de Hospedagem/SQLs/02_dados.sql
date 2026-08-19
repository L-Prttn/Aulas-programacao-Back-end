-- ============================================================================
-- MASSA DE DADOS
-- Sistema de Gestão de Hotel/Pousada
-- ============================================================================

BEGIN;

SET search_path TO hotel_pousada;

-- ============================================================================
-- 1. HÓSPEDES
-- ============================================================================

INSERT INTO hospedes (id, nome, cpf, telefone, email) VALUES
(1, 'Ana Beatriz Souza', '12345678901', '(54) 99911-2233', 'ana.souza@email.com'),
(2, 'Bruno Henrique Lima', '23456789012', '(54) 99822-3344', 'bruno.lima@email.com'),
(3, 'Carolina Mendes', '34567890123', '(54) 99733-4455', 'carolina.mendes@email.com'),
(4, 'Daniel Oliveira', '45678901234', '(54) 99644-5566', 'daniel.oliveira@email.com'),
(5, 'Eduarda Martins', '56789012345', '(54) 99555-6677', 'eduarda.martins@email.com'),
(6, 'Felipe Rodrigues', '67890123456', '(54) 99466-7788', 'felipe.rodrigues@email.com'),
(7, 'Gabriela Fernandes', '78901234567', '(54) 99377-8899', 'gabriela.fernandes@email.com'),
(8, 'Henrique Costa', '89012345678', '(54) 99288-9900', 'henrique.costa@email.com'),
(9, 'Isabela Pereira', '90123456789', '(54) 99199-0011', 'isabela.pereira@email.com'),
(10, 'João Pedro Almeida', '01234567890', '(54) 99000-1122', 'joao.almeida@email.com');


-- ============================================================================
-- 2. TIPOS DE QUARTO
-- ============================================================================

INSERT INTO tipos_quartos (id, nome, descricao) VALUES
(1, 'Individual', 'Quarto para uma pessoa, ideal para estadias individuais.'),
(2, 'Duplo', 'Quarto confortável para até duas pessoas.'),
(3, 'Triplo', 'Quarto amplo para até três pessoas.'),
(4, 'Suíte', 'Suíte com ambiente amplo e maior conforto.');


-- ============================================================================
-- 3. QUARTOS
-- ============================================================================

INSERT INTO quartos (
    id,
    numero,
    tipos_quartos_id,
    capacidade,
    valor_diaria,
    situacao
) VALUES
(1, 101, 1, 1, 180.00, 'Disponível'),
(2, 102, 1, 1, 190.00, 'Disponível'),
(3, 201, 2, 2, 280.00, 'Disponível'),
(4, 202, 2, 2, 300.00, 'Disponível'),
(5, 301, 3, 3, 380.00, 'Disponível'),
(6, 302, 3, 3, 400.00, 'Manutenção'),
(7, 401, 4, 4, 550.00, 'Disponível'),
(8, 402, 4, 4, 600.00, 'Disponível');


-- ============================================================================
-- 4. RESERVAS
-- ============================================================================

INSERT INTO reservas (
    id,
    hospedes_id,
    quartos_id,
    data_entrada,
    data_saida,
    qtd_hospedes,
    situacao,
    observacao
) VALUES

-- Reservas finalizadas
(1, 1, 1, '2026-01-10', '2026-01-13', 1, 'Finalizado',
 'Hospedagem de três noites.'),

(2, 2, 3, '2026-01-15', '2026-01-19', 2, 'Finalizado',
 'Hóspede solicitou quarto silencioso.'),

(3, 3, 5, '2026-02-05', '2026-02-10', 3, 'Finalizado',
 'Família em viagem de férias.'),

(4, 1, 4, '2026-02-20', '2026-02-23', 2, 'Finalizado',
 'Segunda hospedagem do hóspede.'),

(5, 4, 7, '2026-03-01', '2026-03-05', 2, 'Finalizado',
 'Suíte para viagem de lazer.'),

(6, 5, 2, '2026-03-10', '2026-03-12', 1, 'Finalizado',
 'Viagem a trabalho.'),

-- Reservas hospedadas
(7, 6, 3, '2026-08-15', '2026-08-20', 2, 'Hospedado',
 'Hóspede em viagem de trabalho.'),

(8, 7, 5, '2026-08-17', '2026-08-22', 3, 'Hospedado',
 'Viagem em família.'),

-- Reservas futuras
(9, 8, 7, '2026-09-05', '2026-09-10', 2, 'Reservado',
 'Reserva para feriado.'),

(10, 9, 4, '2026-09-12', '2026-09-15', 2, 'Reservado',
 'Final de semana prolongado.'),

(11, 10, 1, '2026-10-01', '2026-10-04', 1, 'Reservado',
 'Viagem de negócios.'),

(12, 2, 8, '2026-10-10', '2026-10-15', 4, 'Reservado',
 'Família em viagem.'),

-- Mais uma reserva futura para um hóspede que já possui reserva
(13, 3, 3, '2026-11-05', '2026-11-08', 2, 'Reservado',
 'Nova hospedagem do hóspede.'),

-- Reservas canceladas
(14, 4, 2, '2026-07-10', '2026-07-13', 1, 'Cancelado',
 'Reserva cancelada pelo hóspede.'),

(15, 6, 4, '2026-07-20', '2026-07-25', 2, 'Cancelado',
 'Cancelamento por alteração de viagem.');


-- ============================================================================
-- 5. SERVIÇOS
-- ============================================================================

INSERT INTO servicos (
    id,
    nome,
    descricao,
    preco,
    ativo
) VALUES
(1, 'Café da manhã', 
 'Café da manhã completo servido na pousada.', 
 35.00, TRUE),

(2, 'Estacionamento', 
 'Vaga de estacionamento para um veículo.', 
 25.00, TRUE),

(3, 'Lavanderia', 
 'Serviço de lavagem e secagem de roupas.', 
 45.00, TRUE),

(4, 'Traslado', 
 'Traslado entre a pousada e o aeroporto.', 
 120.00, TRUE),

(5, 'Passeio turístico', 
 'Passeio turístico guiado pela região.', 
 180.00, TRUE),

(6, 'Serviço de quarto', 
 'Atendimento e alimentação no quarto.', 
 60.00, TRUE);


-- ============================================================================
-- 6. SERVIÇOS UTILIZADOS NAS RESERVAS
-- ============================================================================

INSERT INTO servicos_da_reserva (
    id,
    reservas_id,
    servicos_id,
    quantidade
) VALUES

-- Reserva 1
(1, 1, 1, 3),
(2, 1, 2, 3),

-- Reserva 2
(3, 2, 1, 4),
(4, 2, 2, 4),
(5, 2, 6, 2),

-- Reserva 3
(6, 3, 1, 5),
(7, 3, 2, 5),
(8, 3, 5, 1),

-- Reserva 4
(9, 4, 1, 3),
(10, 4, 4, 1),

-- Reserva 5
(11, 5, 1, 4),
(12, 5, 5, 2),
(13, 5, 6, 1),

-- Reserva 6
(14, 6, 1, 2),
(15, 6, 3, 1),

-- Reserva 7
(16, 7, 1, 5),
(17, 7, 2, 5),
(18, 7, 3, 2),

-- Reserva 8
(19, 8, 1, 5),
(20, 8, 5, 1),
(21, 8, 6, 2),

-- Reserva 9
(22, 9, 1, 5),
(23, 9, 4, 1),

-- Reserva 10
(24, 10, 1, 3),
(25, 10, 2, 3),

-- Reserva 11
(26, 11, 1, 3),

-- Reserva 12
(27, 12, 1, 5),
(28, 12, 2, 5),
(29, 12, 5, 1),

-- Reserva 13
(30, 13, 1, 3),
(31, 13, 6, 2);


-- ============================================================================
-- 7. PAGAMENTOS
-- ============================================================================

INSERT INTO pagamentos (
    id,
    reservas_id,
    valor,
    data_pagamento,
    forma_pagamento,
    situacao
) VALUES

-- Reserva 1
(1, 1, 540.00, '2026-01-10', 'Pix', 'Pago'),

-- Reserva 2
(2, 2, 1120.00, '2026-01-15', 'Cartão de crédito', 'Pago'),

-- Reserva 3
(3, 3, 1900.00, '2026-02-05', 'Cartão de débito', 'Pago'),

-- Reserva 4
(4, 4, 900.00, '2026-02-20', 'Pix', 'Pago'),

-- Reserva 5
(5, 5, 2200.00, '2026-03-01', 'Cartão de crédito', 'Pago'),

-- Reserva 6
(6, 6, 380.00, '2026-03-10', 'Dinheiro', 'Pago'),

-- Reserva 7
(7, 7, 1000.00, '2026-08-15', 'Pix', 'Pago'),

(8, 7, 300.00, '2026-08-17', 'Cartão de crédito', 'Pago'),

-- Reserva 8
(9, 8, 1200.00, '2026-08-17', 'Cartão de débito', 'Pago'),

-- Reserva 9
(10, 9, 1000.00, '2026-08-01', 'Pix', 'Pago'),

(11, 9, 200.00, '2026-08-20', 'Pix', 'Pendente'),

-- Reserva 10
(12, 10, 900.00, '2026-08-10', 'Cartão de crédito', 'Pago'),

-- Reserva 11
(13, 11, 540.00, '2026-09-20', 'Pix', 'Pendente'),

-- Reserva 12
(14, 12, 1800.00, '2026-09-25', 'Cartão de crédito', 'Pendente'),

-- Reserva 13
(15, 13, 840.00, '2026-10-20', 'Pix', 'Pendente');


-- ============================================================================
-- 8. AJUSTE DAS SEQUÊNCIAS DOS BIGSERIAL
-- ============================================================================

SELECT setval(
    pg_get_serial_sequence('hospedes', 'id'),
    (SELECT MAX(id) FROM hospedes)
);

SELECT setval(
    pg_get_serial_sequence('tipos_quartos', 'id'),
    (SELECT MAX(id) FROM tipos_quartos)
);

SELECT setval(
    pg_get_serial_sequence('quartos', 'id'),
    (SELECT MAX(id) FROM quartos)
);

SELECT setval(
    pg_get_serial_sequence('reservas', 'id'),
    (SELECT MAX(id) FROM reservas)
);

SELECT setval(
    pg_get_serial_sequence('servicos', 'id'),
    (SELECT MAX(id) FROM servicos)
);

SELECT setval(
    pg_get_serial_sequence('servicos_da_reserva', 'id'),
    (SELECT MAX(id) FROM servicos_da_reserva)
);

SELECT setval(
    pg_get_serial_sequence('pagamentos', 'id'),
    (SELECT MAX(id) FROM pagamentos)
);

COMMIT;