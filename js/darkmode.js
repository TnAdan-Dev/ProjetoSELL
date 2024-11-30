// Função para atualizar o ícone do botão
function updateIcon() {
  const themeToggleIcon = document.getElementById('theme-toggle-icon');
  const themeToggleCheckbox = document.getElementById('theme-toggle');

  if (themeToggleCheckbox.checked) {
    themeToggleIcon.classList.remove('icon-sun');
    themeToggleIcon.classList.add('icon-moon');
  } else {
    themeToggleIcon.classList.remove('icon-moon');
    themeToggleIcon.classList.add('icon-sun');
  }
}

if (localStorage.getItem('theme') === 'dark') {
  document.documentElement.classList.add('dark');
  document.getElementById('theme-toggle').checked = true; // Define o checkbox como marcado
} else if (localStorage.getItem('theme') === 'light') {
  document.documentElement.classList.remove('dark');
  document.getElementById('theme-toggle').checked = false; // Define o checkbox como desmarcado
}

// Atualiza o ícone ao carregar a página
updateIcon();

// Função para alternar entre os modos manualmente
function toggleTheme() {
  const themeToggleCheckbox = document.getElementById('theme-toggle');

  if (themeToggleCheckbox.checked) {
    document.documentElement.classList.add('dark');  // Força o modo escuro
    localStorage.setItem('theme', 'dark'); // Armazena a preferência no localStorage
  } else {
    document.documentElement.classList.remove('dark');  // Força o modo claro
    localStorage.setItem('theme', 'light'); // Armazena a preferência no localStorage
  }

  // Atualiza o ícone após a troca de tema
  updateIcon();
}

// Adiciona o evento de mudança ao checkbox
document.getElementById('theme-toggle').addEventListener('change', toggleTheme);
