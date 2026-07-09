# CHAPEAÇÃO OS GURI - ERP System

Sistema ERP moderno e profissional para gerenciamento de oficina de chapeação e pintura.

## 🎨 Identidade Visual

- **Azul Turquesa**: #00B7D8
- **Preto**: #121212
- **Branco**: #FFFFFF
- **Dourado**: #D4AF37

## 🛠️ Tecnologias

- **Frontend**: React 18 + TypeScript + TailwindCSS + Vite
- **Backend**: Laravel 12 + PHP 8.3
- **Banco de Dados**: PostgreSQL 15
- **Autenticação**: JWT Token
- **API**: REST

## 📋 Funcionalidades

### Módulos Planejados
- [ ] Dashboard
- [ ] Gestão de Clientes
- [ ] Gestão de Veículos
- [ ] Ordens de Serviço
- [ ] Controle de Estoque
- [ ] Relatórios
- [ ] Agendamentos
- [ ] Financeiro
- [ ] Controle de Usuários
- [ ] Sistema de Permissões

## 🚀 Como Começar

### Backend (Laravel 12)

```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

### Frontend (React + TypeScript)

```bash
cd frontend
npm install
npm run dev
```

### Docker

```bash
docker-compose up -d
```

## 📁 Estrutura do Projeto

```
chapea-oosguri/
├── backend/              # Laravel 12 API
├── frontend/             # React + TypeScript
├── docker-compose.yml
└── README.md
```

## 👥 Controle de Acesso

- **Admin**: Acesso total
- **Gerente**: Gerenciamento de operações
- **Operário**: Acesso limitado a funções específicas
- **Recepcionista**: Agendamentos e entrada de dados

## 📝 Licença

MIT License
