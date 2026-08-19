
-- ============================================================================
-- 2. MASSA DE DADOS
-- ============================================================================

INSERT INTO categorias (id, nome, descricao) VALUES
    (1, 'Eletrônicos', 'Dispositivos e periféricos eletrônicos.'),
    (2, 'Acessórios', 'Cabos, carregadores e itens complementares.'),
    (3, 'Livros', 'Livros técnicos e de desenvolvimento.'),
    (4, 'Casa e Escritório', 'Itens para estudo, trabalho e organização.'),
    (5, 'Saúde e Bem-estar', 'Produtos para rotina e atividades físicas.'),
    (6, 'Games', 'Categoria criada sem produtos para praticar LEFT JOIN.');

INSERT INTO produtos (id, categoria_id, nome, sku, preco, estoque, ativo) VALUES
    (1, 1, 'Fone Bluetooth Pro', 'FONE-BT-PRO', 299.90, 25, TRUE),
    (2, 4, 'Teclado Mecânico', 'TEC-MEC-001', 349.90, 12, TRUE),
    (3, 2, 'Mouse Sem Fio', 'MOUSE-SF-001', 119.90, 42, TRUE),
    (4, 1, 'Webcam Full HD', 'WEBCAM-FHD', 249.90, 9, TRUE),
    (5, 4, 'Suporte para Notebook', 'SUP-NOTE-001', 89.90, 30, TRUE),
    (6, 3, 'Livro: Clean Code', 'BOOK-CLEAN', 159.90, 18, TRUE),
    (7, 2, 'Cabo HDMI 2m', 'CABO-HDMI-2M', 39.90, 0, FALSE),
    (8, 1, 'Monitor 24 Polegadas', 'MON-24-IPS', 899.90, 8, TRUE),
    (9, 5, 'Garrafa Térmica', 'GARRAFA-750', 79.90, 20, TRUE),
    (10, 4, 'Luminária LED', 'LUMI-LED-001', 129.90, 23, TRUE),
    (11, 3, 'Livro: PostgreSQL para Devs', 'BOOK-PG-001', 119.90, 16, TRUE),
    (12, 2, 'Carregador USB-C', 'CARREG-USB-C', 99.90, 35, TRUE),
    (13, 5, 'Tapete de Yoga', 'YOGA-MAT-001', 149.90, 15, TRUE),
    (14, 2, 'Hub USB-C', 'HUB-USBC-001', 189.90, 10, TRUE);

INSERT INTO clientes (id, nome, email, telefone, ativo) VALUES
    (1, 'Ana Beatriz Souza', 'ana.souza@example.com', '(11) 99911-1001', TRUE),
    (2, 'Bruno Dias', 'bruno.dias@example.com', '(21) 99922-1002', TRUE),
    (3, 'Camila Rocha', 'camila.rocha@example.com', '(31) 99933-1003', TRUE),
    (4, 'Daniel Freitas', 'daniel.freitas@example.com', '(41) 99944-1004', TRUE),
    (5, 'Elisa Santos', 'elisa.santos@example.com', '(51) 99955-1005', TRUE),
    (6, 'Felipe Martins', 'felipe.martins@example.com', '(61) 99966-1006', TRUE),
    (7, 'Gabriela Lima', 'gabriela.lima@example.com', '(71) 99977-1007', TRUE),
    (8, 'Henrique Alves', 'henrique.alves@example.com', '(81) 99988-1008', TRUE);

INSERT INTO enderecos (
    id, cliente_id, apelido, logradouro, numero, complemento,
    bairro, cidade, estado, cep, principal
) VALUES
    (1, 1, 'Casa', 'Rua das Flores', '120', 'Apto 42', 'Jardins', 'São Paulo', 'SP', '01430-001', TRUE),
    (2, 1, 'Trabalho', 'Avenida Paulista', '900', 'Sala 1203', 'Bela Vista', 'São Paulo', 'SP', '01310-100', FALSE),
    (3, 2, 'Casa', 'Rua do Ouvidor', '88', NULL, 'Centro', 'Rio de Janeiro', 'RJ', '20040-030', TRUE),
    (4, 3, 'Casa', 'Avenida Afonso Pena', '1450', 'Apto 702', 'Centro', 'Belo Horizonte', 'MG', '30130-000', TRUE),
    (5, 4, 'Casa', 'Rua XV de Novembro', '250', NULL, 'Centro', 'Curitiba', 'PR', '80020-310', TRUE),
    (6, 5, 'Casa', 'Rua dos Andradas', '710', 'Apto 21', 'Centro Histórico', 'Porto Alegre', 'RS', '90020-005', TRUE),
    (7, 6, 'Casa', 'SQS 210', 'Bloco B', 'Apto 304', 'Asa Sul', 'Brasília', 'DF', '70273-020', TRUE),
    (8, 7, 'Casa', 'Rua Chile', '450', NULL, 'Comércio', 'Salvador', 'BA', '40020-000', TRUE),
    (9, 8, 'Casa', 'Rua do Sol', '55', NULL, 'Boa Vista', 'Recife', 'PE', '50060-080', TRUE);

INSERT INTO pedidos (id, cliente_id, endereco_id, status, total, criado_em, atualizado_em) VALUES
    (1, 1, 1, 'pago',      399.80, '2026-01-05 10:15:00-03', '2026-01-05 10:16:00-03'),
    (2, 2, 3, 'pago',      209.80, '2026-01-06 14:20:00-03', '2026-01-06 14:22:00-03'),
    (3, 3, 4, 'pendente',  249.80, '2026-01-08 09:30:00-03', '2026-01-08 09:30:00-03'),
    (4, 1, 2, 'pago',      899.90, '2026-01-10 16:45:00-03', '2026-01-10 16:47:00-03'),
    (5, 4, 5, 'enviado',   309.80, '2026-01-11 11:05:00-03', '2026-01-12 08:00:00-03'),
    (6, 5, 6, 'cancelado', 119.90, '2026-01-12 15:10:00-03', '2026-01-12 15:30:00-03'),
    (7, 6, 7, 'pago',      539.80, '2026-01-13 18:40:00-03', '2026-01-13 18:42:00-03'),
    (8, 2, 3, 'pago',      319.60, '2026-01-14 12:25:00-03', '2026-01-14 12:26:00-03'),
    (9, 7, 8, 'pendente',  279.80, '2026-01-15 10:10:00-03', '2026-01-15 10:10:00-03'),
    (10, 3, 4, 'pago',     359.70, '2026-01-16 13:55:00-03', '2026-01-16 13:57:00-03'),
    (11, 4, 5, 'pago',     289.80, '2026-01-18 17:20:00-03', '2026-01-18 17:22:00-03'),
    (12, 6, 7, 'entregue', 599.80, '2026-01-20 09:00:00-03', '2026-01-22 11:00:00-03');

INSERT INTO itens_pedido (id, pedido_id, produto_id, quantidade, preco_unitario) VALUES
    (1, 1, 1, 1, 299.90),
    (2, 1, 12, 1, 99.90),
    (3, 2, 3, 1, 119.90),
    (4, 2, 5, 1, 89.90),
    (5, 3, 10, 1, 129.90),
    (6, 3, 11, 1, 119.90),
    (7, 4, 8, 1, 899.90),
    (8, 5, 6, 1, 159.90),
    (9, 5, 13, 1, 149.90),
    (10, 6, 11, 1, 119.90),
    (11, 7, 2, 1, 349.90),
    (12, 7, 14, 1, 189.90),
    (13, 8, 9, 4, 79.90),
    (14, 9, 10, 1, 129.90),
    (15, 9, 13, 1, 149.90),
    (16, 10, 3, 3, 119.90),
    (17, 11, 12, 1, 99.90),
    (18, 11, 14, 1, 189.90),
    (19, 12, 1, 2, 299.90);

-- Atualiza as sequências depois dos INSERTs explícitos.
SELECT setval('categorias_id_seq', (SELECT MAX(id) FROM categorias));
SELECT setval('produtos_id_seq', (SELECT MAX(id) FROM produtos));
SELECT setval('clientes_id_seq', (SELECT MAX(id) FROM clientes));
SELECT setval('enderecos_id_seq', (SELECT MAX(id) FROM enderecos));
SELECT setval('pedidos_id_seq', (SELECT MAX(id) FROM pedidos));
SELECT setval('itens_pedido_id_seq', (SELECT MAX(id) FROM itens_pedido));

COMMIT;

