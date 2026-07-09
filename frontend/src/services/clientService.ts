import apiClient from './api';
import { Client } from '@/types/business';

const api = apiClient.getClient();

export const clientService = {
  getAll: async (params?: any) => {
    const response = await api.get('/clients', { params });
    return response.data;
  },

  getById: async (id: string) => {
    const response = await api.get(`/clients/${id}`);
    return response.data;
  },

  create: async (data: Partial<Client>) => {
    const response = await api.post('/clients', data);
    return response.data;
  },

  update: async (id: string, data: Partial<Client>) => {
    const response = await api.put(`/clients/${id}`, data);
    return response.data;
  },

  delete: async (id: string) => {
    await api.delete(`/clients/${id}`);
  },
};
