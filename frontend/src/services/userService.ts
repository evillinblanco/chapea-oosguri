import apiClient from './api';
import { User } from '@/types/auth';

const api = apiClient.getClient();

export const userService = {
  getAll: async (params?: any) => {
    const response = await api.get('/users', { params });
    return response.data;
  },

  getById: async (id: string) => {
    const response = await api.get(`/users/${id}`);
    return response.data;
  },

  create: async (data: Partial<User>) => {
    const response = await api.post('/users', data);
    return response.data;
  },

  update: async (id: string, data: Partial<User>) => {
    const response = await api.put(`/users/${id}`, data);
    return response.data;
  },

  delete: async (id: string) => {
    await api.delete(`/users/${id}`);
  },

  assignRole: async (userId: string, roleId: string) => {
    const response = await api.post('/permissions/assign-role', {
      user_id: userId,
      role_id: roleId,
    });
    return response.data;
  },

  removeRole: async (userId: string, roleId: string) => {
    const response = await api.delete('/permissions/remove-role', {
      data: {
        user_id: userId,
        role_id: roleId,
      },
    });
    return response.data;
  },
};
