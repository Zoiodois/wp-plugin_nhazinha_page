<?php 

function replace_url_directorys($file_path, $substituicoes, $novo_nome){

    // Carrega o conteúdo da página HTML
    $html_content = file_get_contents($file_path);

    if ($html_content === false) {
        die("Erro ao carregar o arquivo HTML.");
    }

    // Aplica as substituições de URLs
    foreach ($substituicoes as $url_antiga => $url_nova) {
        $html_content = str_replace($url_antiga, $url_nova, $html_content);
    }

    // Salva o conteúdo modificado em um novo arquivo
    $novo_caminho = plugin_dir_path( __FILE__ ) . '/templates' . '/' . $novo_nome;

    $resultado = file_put_contents($novo_caminho, $html_content);

    if ($resultado === false) {
        die("Erro ao salvar o novo arquivo HTML.");
    }

}

function plugin_path_finder(){

    $file_path= plugin_dir_path( __FILE__ ) . 'templates/novo.html';
    $substituicoes = [
        '/wp-content/themes/portfolios_blocktheme/images/nhazinha' => '/wp-content/plugins/wp-plugin_nhazinha_page/images/nhazinha',
       ' http://localhost/dev00/wp-content/themes/portfolios_blocktheme' => plugins_url('/', __FILE__),//test gpt suggest
      
    ];
    $novo_nome= 'page-nhazinha.html';


    replace_url_directorys($file_path, $substituicoes, $novo_nome);

}
