# Projeto E-commerce Loja Tindo - PHP

Este projeto é uma aplicação web de e-commerce que integra uma API para gerenciamento dinâmico de configurações, galerias e itens. Ele foi desenvolvido com PHP para backend e HTML, CSS e JavaScript para frontend, utilizando boas práticas de programação.

---

## Estrutura do Projeto

### **Arquivos Principais**

- **`index.php`**
  - Arquivo principal que gerencia a exibição dinâmica de páginas com base no parâmetro `page`.
  - Inclui componentes como cabeçalho, rodapé e botões flutuantes.
  - Renderiza as páginas internas localizadas na pasta `pages`.

- **`api.php`**
  - Gerencia chamadas à API externa.
  - Realiza requisições para carregar dados de configuração e galeria apenas uma vez, utilizando cURL.
  - Trata possíveis erros durante as requisições.

- **`home.php`**
  - Página inicial que exibe:
    - Um carrossel dinâmico de imagens.
    - Cartões com itens da galeria, incluindo informações como título, subtítulo, preço e alertas.

- **`visualizar.php`**
  - Detalhamento de um item específico da galeria.
  - Permite ao usuário selecionar quantidade, data, horário e local de embarque.
  - Exibe informações detalhadas sobre o item.

- **`carrinho.php`**
  - Gerencia itens adicionados ao carrinho.
  - Exibe um resumo com a quantidade total e preço final.
  - Permite limpar o carrinho ou finalizar a compra.

---

## Tecnologias Utilizadas

### **Frontend**
- **HTML5**: Estrutura semântica da aplicação.
- **CSS3**: Estilização, incluindo layout responsivo e cores dinâmicas.
- **JavaScript**: Controle interativo, como carrosséis, manipulação de carrinho e comunicação com o backend.

### **Backend**
- **PHP**: Gerenciamento de lógica, integração com API e renderização dinâmica de páginas.

### **APIs e Dependências**
- **API Tindo**: Fornece dados de configuração e galeria.
- **Font Awesome**: Ícones utilizados no carrossel, cartões e botões.

---

## Funcionalidades

1. **Carrossel Dinâmico**:
   - Exibe imagens configuradas na API.
   - Suporte a navegação por botões e indicadores.

2. **Galeria de Produtos**:
   - Lista itens com imagens, títulos, preços e botões de ação.
   - Utiliza cores e temas definidos na configuração.

3. **Página de Detalhes**:
   - Apresenta informações detalhadas de cada item.
   - Permite configuração de compra personalizada (quantidade, data, local).

4. **Carrinho de Compras**:
   - Adiciona e gerencia itens.
   - Mostra resumo com cálculo de total.

5. **Responsividade**:
   - Layout otimizado para dispositivos móveis e desktop.

---

Feito com ❤️ por [Jaumm Dev.](https://www.jaummdev.com.br)