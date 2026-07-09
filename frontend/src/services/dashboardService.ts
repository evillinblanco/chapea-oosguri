import apiClient from './api';

const api = apiClient.getClient();

export const dashboardService = {
  getStats: async () => {
    const response = await api.get('/dashboard');
    return response.data;
  },
};
