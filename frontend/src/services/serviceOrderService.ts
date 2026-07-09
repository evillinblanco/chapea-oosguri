import apiClient from './api';
import { ServiceOrder } from '@/types/business';

const api = apiClient.getClient();

export const serviceOrderService = {
  getAll: async (params?: any) => {
    const response = await api.get('/service-orders', { params });
    return response.data;
  },

  getById: async (id: string) => {
    const response = await api.get(`/service-orders/${id}`);
    return response.data;
  },

  create: async (data: Partial<ServiceOrder>) => {
    const response = await api.post('/service-orders', data);
    return response.data;
  },

  update: async (id: string, data: Partial<ServiceOrder>) => {
    const response = await api.put(`/service-orders/${id}`, data);
    return response.data;
  },

  delete: async (id: string) => {
    await api.delete(`/service-orders/${id}`);
  },
};
