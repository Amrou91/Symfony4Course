<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Noticia;

class NoticiaController extends AbstractController
{
    /**
     * @Route("/deportes/cargarbd", name="noticia")
     */
    public function cargarBd() {
        
        $em = $this->getDoctrine()->getManager();
        
        $noticia = new Noticia();
        $noticia->setSeccion('Tenis');
        $noticia->setEquipo('roger-federer');
        $noticia->setFecha('16022018');
        
        $noticia->setTextoTitular('Roger-Federer-a-una-victoria-del-número-uno-de-Nadal');
        $noticia->setTextoNoticia("El suizo Roger Federer, el tenista más laureado de la historia, está a son un paso de regresar a la cima del tenis mundial a sus 36 años. Clasificado sin admitir ni réplica para cuartos de final del torneo de Rotterdam, si vence este viernes a Robin Haase se convertirá en el número uno del mundo ...");
        $noticia->setImagen('federer.jpg');
        
        $em->persist($noticia);
        $em->flush();
        
        return new Response('Noticia guardada con éxito con id:'.$noticia->getId());
    }
    
    /**
     * @Route("/deportes/actualizar", name="actualizarNoticia")
     */
    public function actualizarBd(Request $request) {
        
        $em = $this->getDoctrine()->getManager();
        
        $id = $request->get('id');
        
        $noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($id);
        
        $noticia->setTextoTitular('Roger-Federer-a-una-victoria-del-número-uno-de-Nadal');
        $noticia->setTextoNoticia("El suizo Roger Federer, el tenista más laureado de la historia, está a son un paso de regresar a la cima del tenis mundial a sus 36 años. Clasificado sin admitir ni réplica para cuartos de final del torneo de Rotterdam, si vence este viernes a Robin Haase se convertirá en el número uno del mundo ...");
        $noticia->setImagen('federer.jpg');
        
        $em->flush();
        
        return new Response('Noticia actualizada!');
    }
    
    /**
     * @Route("/deportes/eliminar", name="eliminarNoticia")
     */
    public function eliminarBd(Request $request) {
        
        $em = $this->getDoctrine()->getManager();
        $id = $request->query->get('id');
        $noticia = $em->getRepository(Noticia::class)->find($id);
        
        $em->remove($noticia);
        $em->flush();
        
        return new Response("Noticia eliminada!");
    }
}
