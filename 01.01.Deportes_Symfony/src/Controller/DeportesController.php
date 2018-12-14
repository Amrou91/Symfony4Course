<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Noticia;

class DeportesController extends Controller {
    
    /**
     * @Route("/deportes", name="inicio") 
     */
    public function inicio($texto = "Mi página de deportes!!") {
        return $this->render("base.html.twig",[
            'texto'=>$texto
        ]);
    }
    
    
    /**
     * @Route("/deportes/login", name="login_seguro")
     */
    public function loginUsuario(Request $request, AuthenticationUtils $authUtils) {
        // Capturamos el error de autentificación
        $error = $authUtils->getLastAuthenticationError();
        // Último nombre de usuario autentificado
        $lastUsername = $authUtils->getLastUsername();
        
        return $this->render('Security/login.html.twig', [
                'last_username' => $lastUsername,
                'error' => $error,
            ]);
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
     *  defaults={"seccion":"Tenis"}
     * )
     */
    public function lista($pagina=1, $seccion) {
        
        $em = $this->getDoctrine()->getManager();
        
        $repository = $em->getRepository(Noticia::class);
        
        // Buscamos las noticias de una sección
        $noticiaSec = $repository->findOneBy(['seccion' => $seccion]);
        
        // Si la sección no existe saltará una excepción
        
        if (!$noticiaSec) {
            //throw $this->createNotFoundException('Error 404 este deporte no está en nuestra Base de Datos');
            
            return $this->render('base.html.twig',['texto' => 'Error 404 Página no econtrada']);
        }
        
        // Almacenamos todas las noticias de una sección en una lista
        $noticias = $repository->findBy(['seccion' => $seccion]);
        
        return $this->render('noticias/listar.html.twig', [
            // La función str_replace elimina los símbolos - de los títulos
            'titulo' => ucwords(str_replace('-', ' ', $seccion)),
            'noticias'=>$noticias
        ]);

    }
    
    /**
     * @Route("/deportes/{seccion}/{titular}",
     *  defaults={"seccion":"Tenis"}, name="verNoticia")
     */
    public function noticia($titular, $seccion) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Noticia::class);
        
        $noticia = $repository->findOneBy(['textoTitular' => $titular]);
        
        // Si la noticia que buscamos no se encuentra lanzaremos error 404
        if (!$noticia) {
            // Ahora que controlamos el manejo de plantilla twig, vamos a
            // redirigir al usuario a la página de inicio
            // y mostraremos el error 404, para así no mostrar la página de
            // errores generica de symfony
            throw $this->createNotFoundException('Error 404 este deporte no está en nuestra Base de Datos ');
            
            return $this->render('base.html.twig',['texto' => 'Error 404 Página no econtrada']);
        }
        
        return $this->render('noticias/noticia.html.twig', [
                'titulo' => ucwords(str_replace('-',' ',$titular)),
                'noticias' => $noticia,
            ]);
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
