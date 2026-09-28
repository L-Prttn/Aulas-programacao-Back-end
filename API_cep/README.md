# API de Consulta de CEP (Laravel + ViaCEP)

API em Laravel que recebe um CEP, consulta a API pública [ViaCEP](https://viacep.com.br), salva o endereço no banco de dados (PostgreSQL) e devolve o resultado. Se o CEP já foi consultado antes, o dado vem do próprio banco, sem chamar o ViaCEP novamente.

Exercício do Programa Futuro Digital (IFRS - Back End, 3º Ciclo, Caxias do Sul).

## Funcionalidades

- Consulta de endereço por CEP via ViaCEP (Http Client do Laravel)
- Persistência dos endereços consultados no PostgreSQL
- Cache no banco: só chama a API externa se o CEP ainda não existir
- Contador de consultas por CEP
- Tratamento de CEP inválido (400), inexistente (404) e falha no ViaCEP (502)
- Aceita o CEP com ou sem hífen (`01001000` ou `01001-000`)

## Requisitos

- PHP 8.2 ou superior (com as extensões `pdo_pgsql` e `pgsql` habilitadas)
- Composer
- PostgreSQL
- Git

## 1. Baixar o projeto

```bash
git clone https://github.com/L-Prttn/Aulas-programacao-Back-end/tree/2ef139e60e6be6cfdc0d9d8e281c59b7aa6c45b4/API_cep
cd API_cep
```

## 2. Instalar as dependências

```bash
composer install
```

## 3. Configurar o ambiente

Copie o arquivo de exemplo e gere a chave da aplicação:

```bash
copy .env.example .env      # Windows (CMD)
# cp .env.example .env      # Linux / macOS

php artisan key:generate
```

Crie o banco de dados no PostgreSQL:

```bash
psql -U postgres -c "CREATE DATABASE api_cep;"
```

Edite o `.env` com os dados da sua conexão:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=api_cep
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

> Se aparecer o erro `could not find driver`, habilite `extension=pdo_pgsql` e `extension=pgsql` no `php.ini` (remova o `;` do início das linhas) e reinicie o terminal.

## 4. Rodar o projeto

```bash
php artisan migrate
php artisan serve
```

A API fica disponível em `http://localhost:8000`.

## Rotas da API

| Método | URL | Descrição |
|--------|-----|-----------|
| GET | `/api/enderecos/{cep}` | Consulta o CEP (no banco ou no ViaCEP), salva e devolve o endereço |
| GET | `/api/enderecos` | Lista todos os endereços já consultados |

### GET `/api/enderecos/{cep}`

Exemplo (no Windows use `curl.exe`; no PowerShell, `curl` é apelido de outro comando):

```bash
curl.exe http://localhost:8000/api/enderecos/01001000
```

Resposta na **primeira** consulta (`201 Created`, vem do ViaCEP):

```json
{
  "id": 1,
  "cep": "01001-000",
  "logradouro": "Praça da Sé",
  "bairro": "Sé",
  "localidade": "São Paulo",
  "uf": "SP",
  "consultas": 1,
  "created_at": "2026-09-28T01:37:06.000000Z",
  "updated_at": "2026-09-28T01:37:06.000000Z"
}
```

Nas consultas seguintes ao mesmo CEP, a resposta é `200 OK`, vem do banco e o campo `consultas` é incrementado.

Respostas de erro:

| Status | Quando acontece | Exemplo de teste |
|--------|-----------------|------------------|
| 400 | CEP com formato inválido (não tem 8 dígitos) | `curl.exe http://localhost:8000/api/enderecos/123` |
| 404 | CEP não existe no ViaCEP | `curl.exe http://localhost:8000/api/enderecos/99999999` |
| 502 | ViaCEP fora do ar ou com falha | (depende da disponibilidade da API externa) |

```json
{ "mensagem": "CEP não encontrado." }
```

### GET `/api/enderecos`

Lista o histórico de endereços salvos no banco:

```bash
curl.exe http://localhost:8000/api/enderecos
```

Resposta (`200 OK`):

```json
[
  {
    "id": 1,
    "cep": "01001-000",
    "logradouro": "Praça da Sé",
    "bairro": "Sé",
    "localidade": "São Paulo",
    "uf": "SP",
    "consultas": 2,
    "created_at": "2026-09-28T01:37:06.000000Z",
    "updated_at": "2026-09-28T01:38:02.000000Z"
  }
]
```

### Testando com Postman ou Insomnia

Crie uma requisição do tipo **GET** para as URLs acima. Não é necessário autenticação nem corpo na requisição.

## Estrutura principal

```
app/Http/Controllers/EnderecoController.php   # lógica das rotas
app/Models/Endereco.php                       # model
database/migrations/                          # tabela enderecos + campo consultas
routes/api.php                                # definição das rotas
```

## Tecnologias

- Laravel
- PostgreSQL
- ViaCEP (API externa)