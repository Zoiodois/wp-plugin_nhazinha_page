const browserSync = require('browser-sync').create();

browserSync.init({
  proxy: 'http://localhost/dev00', // URL do seu servidor local WordPress
  files: ['**/*.php', '**/*.css', '**/*.js'], // Arquivos a serem observados
  notify: false,
  open: false // Não abre automaticamente uma nova aba no navegador
});