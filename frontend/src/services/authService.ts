import apiClient from './api';
import { LoginCredentials, AuthResponse } from '@/types/auth';

const authApi = apiClient.getClient();

export const authService = {
  login: async (credentials: LoginCredentials): Promise<AuthResponse> => {
    const response = await authApi.post('/auth/login', credentials);
    return response.data;
  },

  register: async (data: any): Promise<AuthResponse> => {
    const response = await authApi.post('/auth/register', data);
    return response.data;
  },

  logout: async (): Promise<void> => {
    await authApi.post('/auth/logout');
  },

  getCurrentUser: async () => {
    const response = await authApi.get('/auth/me');
    return response.data.user;
  },

  refreshToken: async () => {
    const response = await authApi.post('/auth/refresh');
    return response.data;
  },
};
