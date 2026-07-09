# Paleta de Cores - CHAPEAÇÃO OS GURI

## Cores Principais

### Azul Turquesa (Primary)
- **Hex**: #00B7D8
- **RGB**: 0, 183, 216
- **HSL**: 189, 100%, 42%
- **Uso**: Botões principais, links, destaques

### Preto (Dark)
- **Hex**: #121212
- **RGB**: 18, 18, 18
- **HSL**: 0, 0%, 7%
- **Uso**: Texto principal, backgrounds escuros, bordas

### Branco (Light)
- **Hex**: #FFFFFF
- **RGB**: 255, 255, 255
- **HSL**: 0, 0%, 100%
- **Uso**: Background principal, texto em áreas escuras

### Dourado (Accent)
- **Hex**: #D4AF37
- **RGB**: 212, 175, 55
- **HSL**: 43, 74%, 52%
- **Uso**: Acentos, badges premium, destaques especiais

## Cores Secundárias (Geradas)

### Variações de Azul Turquesa
- **Turquesa Claro**: #1FC9E0 (lighten 10%)
- **Turquesa Escuro**: #0098B8 (darken 10%)
- **Turquesa Muito Claro**: #E0F7FB (lighten 50%)

### Variações de Preto
- **Cinza Escuro**: #1E1E1E (lighten 5%)
- **Cinza Médio**: #424242 (lighten 25%)
- **Cinza Claro**: #E8E8E8 (lighten 75%)

### Variações de Dourado
- **Dourado Claro**: #E8C547 (lighten 10%)
- **Dourado Escuro**: #B8922A (darken 10%)
- **Dourado Muito Claro**: #F5F0E8 (lighten 70%)

## Cores de Status

### Sucesso (Green)
- **Hex**: #10B981
- **RGB**: 16, 185, 129
- **Uso**: Status ativo, ações bem-sucedidas, completo

### Aviso (Yellow)
- **Hex**: #F59E0B
- **RGB**: 245, 158, 11
- **Uso**: Alertas, pendência, atenção

### Erro (Red)
- **Hex**: #EF4444
- **RGB**: 239, 68, 68
- **Uso**: Erros, deletar, crítico

### Informação (Blue)
- **Hex**: #3B82F6
- **RGB**: 59, 130, 246
- **Uso**: Informações, dicas, notificações

## TailwindCSS - Configuração

```javascript
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: '#00B7D8',
        'primary-light': '#1FC9E0',
        'primary-dark': '#0098B8',
        'primary-50': '#E0F7FB',
        dark: '#121212',
        'dark-light': '#1E1E1E',
        'dark-medium': '#424242',
        'dark-text': '#E8E8E8',
        accent: '#D4AF37',
        'accent-light': '#E8C547',
        'accent-dark': '#B8922A',
        'accent-50': '#F5F0E8',
        success: '#10B981',
        warning: '#F59E0B',
        error: '#EF4444',
        info: '#3B82F6',
      },
    },
  },
}
```

## CSS Variables - Padrão

```css
:root {
  /* Primary Colors */
  --color-primary: #00B7D8;
  --color-primary-light: #1FC9E0;
  --color-primary-dark: #0098B8;
  --color-primary-50: #E0F7FB;
  
  /* Dark Colors */
  --color-dark: #121212;
  --color-dark-light: #1E1E1E;
  --color-dark-medium: #424242;
  --color-dark-text: #E8E8E8;
  
  /* Accent Colors */
  --color-accent: #D4AF37;
  --color-accent-light: #E8C547;
  --color-accent-dark: #B8922A;
  --color-accent-50: #F5F0E8;
  
  /* Status Colors */
  --color-success: #10B981;
  --color-warning: #F59E0B;
  --color-error: #EF4444;
  --color-info: #3B82F6;
}
```

## Guia de Uso

### Botões
- **Primário**: Background Azul Turquesa (#00B7D8), Texto Branco
- **Secundário**: Background Transparente, Borda Azul Turquesa, Texto Azul Turquesa
- **Destructivo**: Background Vermelho (#EF4444), Texto Branco

### Cards e Containers
- **Background**: Branco ou Cinza Muito Claro (#F9F9F9)
- **Borda**: Cinza Claro (#E8E8E8)
- **Sombra**: Cinza com 10% opacidade

### Texto
- **Primário**: Preto (#121212)
- **Secundário**: Cinza Médio (#424242)
- **Terciário**: Cinza Claro (#8B8B8B)
- **Invertido**: Branco (#FFFFFF)

### Backgrounds
- **Página**: Branco (#FFFFFF)
- **Sidebar**: Preto (#121212) com texto Branco
- **Header**: Branco com borda inferior Azul Turquesa
- **Hover**: Azul Turquesa com 5% opacidade

### Acentos
- **Destaque premium**: Dourado (#D4AF37)
- **Links**: Azul Turquesa (#00B7D8)
- **Active state**: Azul Turquesa Escuro (#0098B8)
