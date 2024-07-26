// Função para formatar o telefone
function formatTelefone(value) {
  value = value.replace(/\D/g, ""); // Remove caracteres não numéricos
  if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
  return value.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
}

// Função para formatar o CPF
function formatCPF(value) {
  value = value.replace(/\D/g, ""); // Remove caracteres não numéricos
  if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
  return value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}

// Função para validar CPF
function validarCPF(cpf) {
  cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

  if (cpf.length !== 11 || /^(.)\1+$/.test(cpf)) {
    return false;
  }

  let soma = 0;
  for (let i = 0; i < 9; i++) {
    soma += parseInt(cpf.charAt(i)) * (10 - i);
  }
  let resto = (soma * 10) % 11;
  if (resto === 10 || resto === 11) resto = 0;
  if (resto !== parseInt(cpf.charAt(9))) return false;

  soma = 0;
  for (let i = 0; i < 10; i++) {
    soma += parseInt(cpf.charAt(i)) * (11 - i);
  }
  resto = (soma * 10) % 11;
  if (resto === 10 || resto === 11) resto = 0;
  return resto === parseInt(cpf.charAt(10));
}

function handleInput(event) {
  const input = event.target;
  if (input.id === "telefone") {
    input.value = formatTelefone(input.value);
  } else if (input.id === "cpf") {
    input.value = formatCPF(input.value);
    const cpf = input.value.replace(/\D/g, '');
    if (!validarCPF(cpf) && cpf.length === 11) {
      input.setCustomValidity("CPF inválido");
    } else {
      input.setCustomValidity("");
    }
  }
}

const telefoneInput = document.getElementById('telefone');
const cpfInput = document.getElementById('cpf');

telefoneInput.addEventListener('input', handleInput);
cpfInput.addEventListener('input', handleInput);

const deleteBtns = document.querySelectorAll('.delete-btn');
deleteBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const confirmDelete = confirm('Deseja realmente excluir este cliente?');
        if (confirmDelete) {
            window.location.href = `delete.php?id=${id}`;
        }
    });
});

const quitBtns = document.querySelectorAll('.quit-btn');
quitBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const confirmQuit = confirm('Deseja realmente sair?');
        if (confirmQuit) {
            window.location.href = `sair.php`;
        }
    });
});
