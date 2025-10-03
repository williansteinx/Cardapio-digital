# 🍽️ Cardápio Digital

Sistema de **Cardápio Digital** desenvolvido em **Laravel 11**.  
Permite gerenciar pratos de forma simples: cadastrar, listar, editar, excluir e exibir imagens.  
Conta com autenticação para garantir que apenas usuários autorizados possam administrar o cardápio.

---

## 🚀 Tecnologias Utilizadas
- **PHP 8.2+**
- **Laravel 11**
- **Laravel Breeze** → Autenticação (login, registro, logout, recuperação de senha)
- **Bootstrap 5** → Estilização do front-end
- **MySQL/MariaDB** → Banco de dados
- **Composer** → Gerenciamento de dependências
- **Vite** → Build dos assets (CSS/JS)

---

## 📂 Estrutura do Projeto

### 🔹 `app/Models`
- **`Prato.php`** → Representa a tabela de pratos no banco de dados.  
  Define os atributos (`nm_prato`, `desc_ingred`, `vl_prato`, `arquivo`) e suas regras de preenchimento.

### 🔹 `app/Http/Controllers`
- **`CardapioController.php`** → Controla as operações CRUD do cardápio:
  - `index()` → Lista todos os pratos cadastrados
  - `create()` → Exibe o formulário de cadastro
  - `store()` → Salva um novo prato no banco
  - `edit($id)` → Exibe o formulário de edição
  - `update($id)` → Atualiza os dados de um prato
  - `destroy($id)` → Exclui um prato

- **`ProfileController.php`** (Laravel Breeze) → Gerencia o perfil do usuário autenticado.

### 🔹 `app/Http/Requests`
- **`PratoRequest.php`** → Validação de formulários:
  - `nm_prato` → obrigatório, mínimo de caracteres
  - `desc_ingred` → obrigatório
  - `vl_prato` → numérico, obrigatório
  - `arquivo` → obrigatório na criação, imagem válida (jpg/png/webp)

### 🔹 `database/migrations`
- **Criação da tabela `pratos`**  
  Contém colunas:
  - `id` (PK)
  - `nm_prato` (nome do prato)
  - `desc_ingred` (descrição/ingredientes)
  - `vl_prato` (valor do prato)
  - `arquivo` (nome do arquivo da imagem)
  - `timestamps`

### 🔹 `database/seeders`
- **`PratoSeeder.php`** → Popula a tabela de pratos com dados iniciais.  
  Exemplo: *“Lasanha de Carne”, “Pizza de Calabresa”, “Feijoada”*, etc.

### 🔹 `resources/views`
- **`cardapio/admin.blade.php`** → Listagem de pratos com opções de editar/excluir.  
- **`cardapio/create.blade.php`** → Formulário para cadastrar novo prato.  
- **`cardapio/edit.blade.php`** → Formulário para editar prato existente.  
- **`layouts/app.blade.php`** → Layout padrão com cabeçalho, menu e yield para o conteúdo.  
- **`auth/*`** (Laravel Breeze) → Telas de login, registro e redefinição de senha.

### 🔹 `routes/web.php`
Define as rotas principais:
- `/` → Exibe lista de pratos públicos
- `/cardapio` → Listagem administrativa (somente autenticado)
- `/cardapio/create` → Cadastro de prato
- `/cardapio/{id}/edit` → Edição
- `/cardapio/{id}` (DELETE) → Exclusão

---

## 🛠️ Funcionalidades

### 👤 Autenticação
- Login e registro via **Laravel Breeze**
- Proteção de rotas administrativas com **middleware `auth`**
- Recuperação de senha via e-mail

### 📖 Cardápio
- **Cadastro de pratos**
  - Nome, descrição, valor e upload de imagem
- **Listagem**
  - Tabela de pratos com nome, preço, ingredientes e miniatura da imagem
- **Edição**
  - Alteração dos dados do prato e atualização da imagem
- **Exclusão**
  - Remoção segura de registros com confirmação

### 🖼️ Upload de Imagens
- As imagens são armazenadas em `storage/app/public`  
- São acessíveis via `storage/` após rodar:
  ```bash
  php artisan storage:link