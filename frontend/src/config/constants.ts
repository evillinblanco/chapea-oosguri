export const API_URL = import.meta.env.VITE_API_URL || 'http://localhost:8000';
export const API_BASE_URL = `${API_URL}/api`;

export const ROLES = {
  ADMIN: 'admin',
  MANAGER: 'manager',
  WORKER: 'worker',
  RECEPTIONIST: 'receptionist',
};

export const PERMISSIONS = {
  USERS: {
    VIEW: 'users.view',
    CREATE: 'users.create',
    EDIT: 'users.edit',
    DELETE: 'users.delete',
    CHANGE_ROLE: 'users.change_role',
  },
  CLIENTS: {
    VIEW: 'clients.view',
    CREATE: 'clients.create',
    EDIT: 'clients.edit',
    DELETE: 'clients.delete',
  },
  VEHICLES: {
    VIEW: 'vehicles.view',
    CREATE: 'vehicles.create',
    EDIT: 'vehicles.edit',
    DELETE: 'vehicles.delete',
  },
  ORDERS: {
    VIEW: 'orders.view',
    CREATE: 'orders.create',
    EDIT: 'orders.edit',
    DELETE: 'orders.delete',
    COMPLETE: 'orders.complete',
  },
  REPORTS: {
    VIEW: 'reports.view',
    EXPORT: 'reports.export',
  },
  SETTINGS: {
    VIEW: 'settings.view',
    EDIT: 'settings.edit',
  },
};
