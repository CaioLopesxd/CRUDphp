function formatTelefone(value) {
  value = value.replace(/\D/g, ""); // Remove caracteres não numéricos
  if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
  return value.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
}

function formatCPF(value) {
  value = value.replace(/\D/g, ""); // Remove caracteres não numéricos
  if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
  return value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}

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
