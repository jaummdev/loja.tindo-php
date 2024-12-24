

// Slider script

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";

  if (dots[slideIndex - 1]) {
    dots[slideIndex - 1].className += " active";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  let slides = document.getElementsByClassName("mySlides");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  showSlides(slideIndex);
});

// Input de incrementar e decrementar e Carrinho...

const quantityControls = document.querySelectorAll('.quantity-control');

quantityControls.forEach(control => {
  const decreaseButton = control.querySelector('.decrease');
  const increaseButton = control.querySelector('.increase');
  const quantityInput = control.querySelector('.quantity-input');

  decreaseButton.addEventListener('click', () => {
    const currentValue = parseInt(quantityInput.value, 10) || 0;
    if (currentValue > 0) {
      quantityInput.value = currentValue - 1;
    }
  });

  increaseButton.addEventListener('click', () => {
    const currentValue = parseInt(quantityInput.value, 10) || 0;
    quantityInput.value = currentValue + 1;
  });
});


const addToCartButton = document.querySelector('#addToCart');

addToCartButton.addEventListener('click', () => {

  const horarioPasseioElement = document.querySelector('#chooseHour');
  const localEmbarqueElement = document.querySelector('#chooseLocal');
  const dataPasseioElement = document.querySelector('#chooseDate');


  // Verificar se a data foi selecionada
  if (!dataPasseioElement || !dataPasseioElement.value) {
    dataPasseioElement.style.border = '1px solid red';
    alert('Por favor, selecione uma data de passeio válida.');
    return;
  }

  // Verificar se o horário foi selecionado
  if (!horarioPasseioElement || horarioPasseioElement.value === "") {
    horarioPasseioElement.style.border = '1px solid red';
    alert('Por favor, selecione um horário de passeio válido.');
    return;
  }

  // Verificar se o local de embarque foi selecionado
  if (!localEmbarqueElement || localEmbarqueElement.value === "") {
    localEmbarqueElement.style.border = '1px solid red';
    alert('Por favor, selecione um local de embarque válido.');
    return;
  }

  const detalhes = {
    id: itemDetalhes.id,
    nome: itemDetalhes.nome,
    descricaoSite: itemDetalhes.descricaoSite,
    valorDestaque: itemDetalhes.valorDestaque,
    quantidades: {},
    horarioPasseio: horarioPasseioElement.value,
    localEmbarque: localEmbarqueElement.value,
    dataPasseio: dataPasseioElement.value
  };

  document.querySelectorAll('.quantity-input').forEach(input => {
    const key = input.dataset.key;
    const value = parseInt(input.value, 10) || 0;
    detalhes.quantidades[key] = value;
  });

  // Verificar as quantidades
  const totalQuantidade = Object.values(detalhes.quantidades).reduce((acc, cur) => acc + cur, 0);
  if (totalQuantidade === 0) {
    alert('Por favor, selecione pelo menos 1 pessoa.');
    return;
  }

  adicionarAoCarrinho(detalhes);
});


function adicionarAoCarrinho(itemDetalhes) {
  let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

  // Verificar se o item já está no carrinho
  const itemExistente = carrinho.find(item => item.id === itemDetalhes.id);
  if (itemExistente) {
    alert('Este item já está no carrinho.');
    return;
  }

  // Adicionar item ao carrinho
  carrinho.push(itemDetalhes);
  localStorage.setItem('carrinho', JSON.stringify(carrinho));
  alert('Item adicionado ao carrinho com sucesso!');
}

// Listar os itens do carrinho
function listarCarrinho() {
  const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
  const carrinhoContainer = document.querySelector('#carrinho-itens');

  if (!carrinhoContainer) {
    console.error('Elemento #carrinho-itens não encontrado no DOM.');
    return;
  }

  carrinhoContainer.innerHTML = '';

  if (carrinho.length === 0) {
    carrinhoContainer.innerHTML = '<p>Seu carrinho está vazio.</p>';
    return;
  }

  // Adicionar os itens do carrinho ao contêiner
  carrinho.forEach(item => {
    const itemDiv = document.createElement('div');
    itemDiv.className = 'carrinho-item';
    itemDiv.innerHTML = `
      <h2>${item.nome}</h2>
      <p>${item.descricaoSite}</p>
      <span>Preço: ${item.valorDestaque || 'Não informado'}</span>
      <p>Horário: ${item.horarioPasseio}</p>
      <p>Local de Embarque: ${item.localEmbarque}</p>
      <p>Data: ${item.dataPasseio}</p>
      <ul>
        ${Object.entries(item.quantidades)
        .map(([key, value]) => `<li>${key}: ${value}</li>`)
        .join('')}
      </ul>
      <button onclick="removerItem(${JSON.stringify(item.id)})">Remover</button>
    `;
    carrinhoContainer.appendChild(itemDiv);
  });
}

// Função para remover um item do carrinho
function removerItem(itemId) {
  let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
  carrinho = carrinho.filter(item => item.id !== itemId);
  localStorage.setItem('carrinho', JSON.stringify(carrinho));
  alert('Item removido do carrinho.');
  listarCarrinho();
}

// Função para limpar o carrinho
function limparCarrinho() {
  localStorage.removeItem('carrinho');
  alert('Carrinho esvaziado.');
  listarCarrinho();
}