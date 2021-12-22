<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Testimony as EntityTestimony;

class Testimony extends Page
{
    /**
     * Método responsável por retornar o conteúdo view da nossa home
     * @return string
     */
    public static function getTestimonies()
    {
        // VIEW DE DEPOIMENTOS
        $content = View::render('pages/testimonies', []);
        // RETORNA A VIEW DA PÁGINA
        return parent::getPage('DEPOIMENTOS > MVC', $content);
    }

    /**
     * Método responsável por cadastrar um depoimento
     * @param Request $request
     * @return string
     */
    public static function insertTestimony($request)
    {
        // DADOS DO POST
        $postVars = $request->getPostVars();

        // NOVA INSTANCIA DE DEPOIMENTO
        $obTestimony = new EntityTestimony;
        $obTestimony->nome = $postVars['nome'];
        $obTestimony->mensagem = $postVars['mensagem'];
        $obTestimony->cadastrar();
        
        return self::getTestimonies();
    }
}