<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeportesController extends Controller {
    
    /**
     * @Route("/", name="inicio") 
     */
    public function inicio() {
        return new Response('Mi primera pagina en Symfony!');
    }
    
    /**
     * @Route("/deportes/usuario", name="usuario") 
     */
    public function sesionUsuario(Request $request) {
        
        $usuario_get = $request->get('nombre');
        $session = $request->getSession();
        $session->set('nombre', $usuario_get);
        
        return $this->redirectToRoute('usuario_session', ['nombre' => $usuario_get]);
    }
    
    /**
     * @Route("/deportes/usuario/{nombre}", name="usuario_session")
     */
    public function paginaUsuario() {
        
        $session = new Session();
        
        $usuario = $session->get('nombre');
        
        return new Response(sprintf('Sesión iniciada con el atributo nombre: %s', $usuario));
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
    // public function lista($seccion, $pagina = 1) {
        
    //     $sports = ['futbol','tenis','rugby'];
        
    //     if (!in_array($seccion,$sports)) {
    //         throw $this->createNoTFoundException('Error 404 este deporte no está en nuestra Base de Datos');
    //     }
        
    //     return new Response(sprintf('Deportes sección: %s, listado de noticias página %s', $seccion, $pagina));
    // }
    
    /**
     * @Route("/deportes/{seccion}/{slug}",
     *  defaults={"seccion":"tenis"})
     */
    // public function noticia($slug, $seccion) {
    //     return new Response(sprintf('Noticia de %s, con url dinámica=%s'), $seccion, $slug);
    // }
    
    
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
    // public function rutaAvanzadaListado($_idioma, $fecha, $seccion, $equipo, $pagina) {
    //     return new Response(sprintf('Listado de noticias en idioma=%s,fecha=%s, deporte=%s, equipo=%s, página=%s',
    //         $_idioma,$fecha,$seccion,$equipo,$pagina)
    //     );
    // }
    
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
    // public function rutaAvanzada($_idioma, $fecha, $seccion, $equipo, $slug) {
        
    //     $sports = ["valencia", "barcelona","federer", "rafa-nadal"];
        
    //     if (!in_array($equipo,$sports)) {
    //         return $this->redirectToRoute('inicio');
    //     }
        
    //     return new Response(sprintf('Mi noticia en idioma=%s,fecha=%s, deporte=%s, equipo=%s, noticia=%s',
    //         $_idioma,$fecha,$seccion,$equipo,$slug)
    //     );
    // }
    
}
