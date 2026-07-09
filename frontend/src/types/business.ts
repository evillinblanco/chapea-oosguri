export interface Client {
  id: string;
  name: string;
  email?: string;
  phone: string;
  cpf_cnpj: string;
  address: string;
  city: string;
  state: string;
  zip_code: string;
  status: 'active' | 'inactive';
  created_at: string;
  updated_at: string;
}

export interface Vehicle {
  id: string;
  client_id: string;
  brand: string;
  model: string;
  year: number;
  color: string;
  license_plate: string;
  chassis_number: string;
  type: string;
  created_at: string;
  updated_at: string;
}

export interface ServiceOrderItem {
  id: string;
  service_order_id: string;
  description: string;
  quantity: number;
  unit_price: number;
  subtotal: number;
}

export interface ServiceOrder {
  id: string;
  client_id: string;
  vehicle_id: string;
  user_id: string;
  description: string;
  status: 'pending' | 'in_progress' | 'completed' | 'cancelled';
  priority: 'low' | 'medium' | 'high';
  estimated_date: string;
  completion_date?: string;
  total_value: number;
  payment_status: 'pending' | 'partial' | 'paid';
  client?: Client;
  vehicle?: Vehicle;
  items?: ServiceOrderItem[];
  created_at: string;
  updated_at: string;
}
