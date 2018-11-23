<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeportesController {
    
    /**
     * @Route("/") 
     */
    public function inicio() {
        return new Response('Mi primera pagina en Symfony!');
    }
    
    /**
     * @Route("/deportes/{slug}")
     */
    // public function mostrar($slug) {
    //     return new Response(sprintf('Mi artículo en mi página de deportes: ruta %s', $slug));
    // }
    
    /**
     * @Route("/deportes/{seccion}/{pagina}", name="lista_paginas",
     *  requirements={"pagina"="\d+"},
     *  defaults={"seccion":"tenis"})
     */ 
    public function lista($seccion, $pagina = 1) {
        return new Response(sprintf('Deportes sección: %s, listado de noticias página %s', $seccion, $pagina));
    }
    
    /**
     * @Route("/deportes/{seccion}/{slug}",
     *  defaults={"seccion":"tenis"})
     */
    public function noticia($slug, $seccion) {
        return new Response(sprintf('Noticia de %s, con url dinámica=%s'), $seccion, $slug);
    }
    
    
    /**
     * @Route("/deportes/{_idioma}/{fecha}/{seccion}/{equipo}/{pagina}.{_formato}",
     *  defaults={"pagina":"1", "_formato":"html"},
     *  requirements={
     *      "_idioma": "es|en",
     *      "_formato": "html|json|xml",
     *      "fecha": "[\d+]{8}",
     *      "pagina" = "\d+"
     *  }
     * )
     */
    public function rutaAvanzadaListado($_idioma, $fecha, $seccion, $equipo, $pagina) {
        return new Response(sprintf('Listado de noticias en idioma=%s,fecha=%S, deporte=%s, equipo=%s, página=%s',
            $_idioma,$fecha,$seccion,$equipo,$pagina)
        );
    }
    
    /**
     * @Route("/deportes/{_idioma}/{fecha}/{seccion}/{equipo}/{slug}.{_formato}",
     *  defaults={"slug":"1", "_formato":"html"},
     *  requirements={
     *      "_idioma": "es|en",
     *      "_formato": "html|json|xml",
     *      "fecha": "[\d+]{8}"
     *  }
     * )
     */
    public function rutaAvanzada($_idioma, $fecha, $seccion, $equipo, $slug) {
        return new Response(sprintf('Mi noticia en idioma=%s,fecha=%s, deporte=%s, equipo=%s, noticia=%s',
            $_idioma,$fecha,$seccion,$equipo,$slug)
        );
    }
}
