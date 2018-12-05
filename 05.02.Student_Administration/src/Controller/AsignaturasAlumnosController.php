<?php
// src/Controller/AsignaturasAlumnosController.php
namespace App\Controller;

use App\Entity\Alumnos;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asignaturas")
 */
class AsignaturasAlumnosController extends AbstractController {
    
    /**
     * @Route("/alumnos/{id}", name="alumnos_asignaturas")
     */
    public function alumnosAsignaturas($id) {
        // Load Entity Manager
        $em = $this->getDoctrine()->getManager();
        
        // Load User_repo
        $alumnos_repo = $em->getRepository(Alumnos::class);
        
        $alumno = $alumnos_repo->findOneBy(['id' => $id]);
        
        if ($alumno !== null) {
            $table = '';
            $asignaturas = $alumno->getAsignatura();
            
            foreach ($asignaturas as $key => $value) {
                $table = $table.'<tr><td>'.$value->getId().'</td><td>'.$value->getNombre().'</td></tr>';
            }
            
            $result = '<table>'.$table.'</table>';
        } else {
            $result = 'sin resultados';
        }
        
        return new Response($result);
    }
}