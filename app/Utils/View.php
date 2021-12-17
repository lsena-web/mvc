<?php

namespace App\Utils;


class View
{

    /**
     * Variáveis padrões da View
     * @var array
     */
    private static $vars = [];

    /**
     * Mátodo responsável por por definir os dados iniciais da classe
     * @param array
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }

    /**
     * Método responsáveel por retornar o conteúdo de uma view
     * @param string $view
     * @return string
     */
    private static function getContentView($view)
    {
        $file = __DIR__ . '/../../resources/view/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : ''; // se existir retorna o conteúdo se não, não retorna
    }

    /**
     * Método responsável por retornar o conteúdo renderizado de uma view
     * @param string $view
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = [])
    {
        // CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        // MERGE DE VARIAVEIS DA VIEW
        $vars = array_merge(self::$vars, $vars);

        // CHAVES DO ARRAY DE VARIÁVEIS
        // P1 FUNÇÃO CALLBACK QUE SERÁ EXECUTADA EM CADA ELEMENTO DO ARRAY
        // P2 ARRAY A SER PECORRIDO 
        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        // RETORNA O CONTEÚDO RENDERIZADO
        // P1 PESQUISA CONTÉUDO DO P3 OU SEJA,  ITEMS A SEREM SUBSTITUIDOS
        // P2 SUBSTITUI CONTÉUDO DO P3 OU SEJA,  ITEMS QUE SUBSTITUIRÃO
        // P3 FRASE COM AS DEVIDAS SUBSTITUIÇÕES
        return str_replace($keys, array_values($vars), $contentView);
    }
}
