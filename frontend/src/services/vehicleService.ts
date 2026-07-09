import apiClient from './api';
import { Vehicle } from '@/types/business';

const api = apiClient.getClient();

export const vehicleService = {
  getAll: async (params?: any) => {
    const response = await api.get('/vehicles', { params });
    return response.data;
  },

  getById: async (id: string) => {
    const response = await api.get(`/vehicles/${id}`);
    return response.data;
  },

  create: async (data: Partial<Vehicle>) => {
    const response = await api.post('/vehicles', data);
    return response.data;
  },

  update: async (id: string, data: Partial<Vehicle>) => {
    const response = await api.put(`/vehicles/${id}`, data);
    return response.data;
  },

  delete: async (id: string) => {
    await api.delete(`/vehicles/${id}`);
  },
};
