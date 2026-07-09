# Arquitetura do ERP CHAPEAÇÃO OS GURI

## 🏗️ Visão Geral da Arquitetura

O sistema é dividido em três camadas principais:

### 1. **Frontend (React + TypeScript + TailwindCSS)**
- Interface moderna e responsiva
- Componentes reutilizáveis
- Context API para gerenciamento de estado
- Integração com API REST do Backend

### 2. **Backend (Laravel 12)**
- API REST com autenticação JWT
- Controle de permissões e roles
- Validação de dados
- Lógica de negócio

### 3. **Banco de Dados (PostgreSQL)**
- Schema relacional
- Índices para performance
- Migrations versionadas

## 📊 Fluxo de Dados

```
Frontend (React)
       ↓
API REST (Laravel)
       ↓
Business Logic & Services
       ↓
Models & Repositories
       ↓
PostgreSQL Database
```

## 🔐 Autenticação e Autorização

### Fluxo de Login
1. Usuário submete credenciais
2. Backend valida e gera JWT Token
3. Token é armazenado no localStorage (Frontend)
4. Token é enviado em cada requisição (Header: Authorization)
5. Backend valida token e permissões

### Níveis de Acesso (Roles)
- **Admin**: Acesso total ao sistema
- **Gerente**: Gerenciamento de operações e relatórios
- **Operário**: Acesso às ordens de serviço e tarefas
- **Recepcionista**: Agendamentos e entrada de clientes

## 📁 Estrutura de Diretórios

### Backend (Laravel 12)
```
backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── UserController.php
│   │   │   │   ├── ClientController.php
│   │   │   │   ├── VehicleController.php
│   │   │   │   ├── ServiceOrderController.php
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── PermissionController.php
│   │   ├── Middleware/
│   │   │   ├── Authenticate.php
│   │   │   ├── CheckPermission.php
│   │   │   ├── CORS.php
│   │   │   └── ApiTokenMiddleware.php
│   │   ├── Requests/
│   │   │   ├── Auth/
│   │   │   │   ├── LoginRequest.php
│   │   │   │   └── RegisterRequest.php
│   │   │   ├── User/
│   │   │   └── Client/
│   │   └── Resources/
│   │       ├── UserResource.php
│   │       ├── ClientResource.php
│   │       └── ServiceOrderResource.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Role.php
│   │   ├── Permission.php
│   │   ├── Client.php
│   │   ├── Vehicle.php
│   │   ├── ServiceOrder.php
│   │   ├── ServiceItem.php
│   │   └── AuditLog.php
│   ├── Services/
│   │   ├── AuthService.php
│   │   ├── UserService.php
│   │   ├── PermissionService.php
│   │   ├── ClientService.php
│   │   ├── VehicleService.php
│   │   └── ServiceOrderService.php
│   ├── Repositories/
│   │   ├── UserRepository.php
│   │   ├── ClientRepository.php
│   │   ├── VehicleRepository.php
│   │   └── ServiceOrderRepository.php
│   ├── Enums/
│   │   ├── RoleEnum.php
│   │   ├── PermissionEnum.php
│   │   ├── UserStatusEnum.php
│   │   ├── OrderStatusEnum.php
│   │   └── PaymentStatusEnum.php
│   ├── Exceptions/
│   │   ├── UnauthorizedException.php
│   │   ├── NotFoundException.php
│   │   └── ValidationException.php
│   └── Traits/
│       ├── HasPermissions.php
│       ├── HasRoles.php
│       └── Loggable.php
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── routes/
│   ├── api.php
│   └── web.php
├── config/
├── .env.example
├── composer.json
└── artisan
```

### Frontend (React + TypeScript)
```
frontend/
├── src/
│   ├── components/
│   │   ├── common/
│   │   │   ├── Header.tsx
│   │   │   ├── Sidebar.tsx
│   │   │   ├── Button.tsx
│   │   │   ├── Card.tsx
│   │   │   ├── Input.tsx
│   │   │   ├── Modal.tsx
│   │   │   ├── Table.tsx
│   │   │   ├── Badge.tsx
│   │   │   ├── Avatar.tsx
│   │   │   ├── Dropdown.tsx
│   │   │   ├── Loader.tsx
│   │   │   ├── Alert.tsx
│   │   │   └── Toast.tsx
│   │   ├── layout/
│   │   │   ├── MainLayout.tsx
│   │   │   ├── AuthLayout.tsx
│   │   │   └── PageHeader.tsx
│   │   ├── auth/
│   │   │   ├── LoginForm.tsx
│   │   │   ├── ProtectedRoute.tsx
│   │   │   └── PrivateRoute.tsx
│   │   ├── dashboard/
│   │   │   ├── Dashboard.tsx
│   │   │   ├── StatCard.tsx
│   │   │   ├── Chart.tsx
│   │   │   └── RecentActivity.tsx
│   │   └── users/
│   │       ├── UserForm.tsx
│   │       ├── UserTable.tsx
│   │       └── UserModal.tsx
│   ├── pages/
│   │   ├── auth/
│   │   │   └── Login.tsx
│   │   ├── dashboard/
│   │   │   └── Index.tsx
│   │   ├── users/
│   │   │   ├── Index.tsx
│   │   │   ├── Create.tsx
│   │   │   ├── Edit.tsx
│   │   │   └── Show.tsx
│   │   ├── clients/
│   │   ├── vehicles/
│   │   ├── service-orders/
│   │   ├── settings/
│   │   ├── NotFound.tsx
│   │   └── Unauthorized.tsx
│   ├── services/
│   │   ├── api.ts
│   │   ├── authService.ts
│   │   ├── userService.ts
│   │   ├── clientService.ts
│   │   └── errorHandler.ts
│   ├── context/
│   │   ├── AuthContext.tsx
│   │   ├── ThemeContext.tsx
│   │   └── NotificationContext.tsx
│   ├── hooks/
│   │   ├── useAuth.ts
│   │   ├── useApi.ts
│   │   ├── usePermission.ts
│   │   ├── useFetch.ts
│   │   └── useForm.ts
│   ├── styles/
│   │   ├── globals.css
│   │   ├── variables.css
│   │   ├── animations.css
│   │   └── responsive.css
│   ├── types/
│   │   ├── auth.ts
│   │   ├── user.ts
│   │   ├── client.ts
│   │   ├── vehicle.ts
│   │   ├── serviceOrder.ts
│   │   ├── api.ts
│   │   └── index.ts
│   ├── utils/
│   │   ├── constants.ts
│   │   ├── colors.ts
│   │   ├── helpers.ts
│   │   ├── validators.ts
│   │   ├── formatters.ts
│   │   └── localStorage.ts
│   ├── config/
│   │   ├── api.ts
│   │   └── routes.ts
│   ├── App.tsx
│   └── main.tsx
├── public/
├── .env.example
├── package.json
├── tsconfig.json
├── vite.config.ts
├── tailwind.config.js
└── postcss.config.js
```

## 🔄 Padrões de Desenvolvimento

### Backend
- **Arquitetura**: MVC com Services e Repositories
- **Autenticação**: JWT Token
- **Validação**: Form Requests
- **Resposta API**: JSON com status codes HTTP
- **Error Handling**: Exceptions customizadas

### Frontend
- **Componentes**: Functional components com TypeScript
- **Estado**: Context API + Custom Hooks
- **Requisições**: Axios com interceptadores
- **Roteamento**: React Router v6
- **Styling**: TailwindCSS

## 📋 Tabelas do Banco de Dados

### users
- id (UUID)
- name (string)
- email (string, unique)
- password (hashed)
- phone (string, nullable)
- avatar (string, nullable)
- status (enum: active, inactive, suspended)
- last_login (timestamp, nullable)
- created_at (timestamp)
- updated_at (timestamp)
- deleted_at (timestamp, soft delete)

### roles
- id (UUID)
- name (string, unique)
- description (text)
- created_at (timestamp)
- updated_at (timestamp)

### permissions
- id (UUID)
- name (string, unique)
- description (text)
- module (string)
- created_at (timestamp)
- updated_at (timestamp)

### role_permission (Pivot)
- role_id (UUID)
- permission_id (UUID)

### user_role (Pivot)
- user_id (UUID)
- role_id (UUID)

### clients
- id (UUID)
- name (string)
- email (string, nullable)
- phone (string)
- cpf_cnpj (string, unique)
- address (string)
- city (string)
- state (string)
- zip_code (string)
- status (enum: active, inactive)
- created_at (timestamp)
- updated_at (timestamp)

### vehicles
- id (UUID)
- client_id (UUID)
- brand (string)
- model (string)
- year (integer)
- color (string)
- license_plate (string, unique)
- chassis_number (string, unique)
- type (string)
- created_at (timestamp)
- updated_at (timestamp)

### service_orders
- id (UUID)
- client_id (UUID)
- vehicle_id (UUID)
- user_id (UUID)
- description (text)
- status (enum: pending, in_progress, completed, cancelled)
- priority (enum: low, medium, high)
- estimated_date (date)
- completion_date (date, nullable)
- total_value (decimal)
- payment_status (enum: pending, partial, paid)
- created_at (timestamp)
- updated_at (timestamp)

### service_items
- id (UUID)
- service_order_id (UUID)
- description (string)
- quantity (decimal)
- unit_price (decimal)
- subtotal (decimal)
- created_at (timestamp)
- updated_at (timestamp)

### audit_logs
- id (UUID)
- user_id (UUID)
- action (string)
- model (string)
- model_id (UUID)
- old_values (json)
- new_values (json)
- created_at (timestamp)

## 🔐 Permissões do Sistema

```
// Users
- users.view
- users.create
- users.edit
- users.delete
- users.change_role

// Clients
- clients.view
- clients.create
- clients.edit
- clients.delete

// Vehicles
- vehicles.view
- vehicles.create
- vehicles.edit
- vehicles.delete

// Service Orders
- orders.view
- orders.create
- orders.edit
- orders.delete
- orders.complete

// Reports
- reports.view
- reports.export

// Settings
- settings.view
- settings.edit
```

## 🚀 Próximas Etapas

1. [x] Arquitetura do projeto
2. [ ] Configuração do Backend (Laravel 12)
3. [ ] Configuração do Frontend (React + TypeScript)
4. [ ] Banco de Dados e Migrations
5. [ ] Sistema de Autenticação e Login
6. [ ] Dashboard
7. [ ] Controle de Usuários
8. [ ] Controle de Permissões
9. [ ] Módulos de Negócio
