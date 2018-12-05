<?php
// src/Controller/NotasController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Alumnos;
use App\Entity\Nota;
use App\Entity\Asignaturas;

class NotasController extends AbstractController {
    
    /**
     * @Route("/alumnos_notas/{id}")
     */
    public function alumnosNotas($id) {
        // Load Entity Manager
        $em = $this->getDoctrine()->getManager();
        
        // Load User_repo
        $alumnos_repo = $em->getRepository(Alumnos::class);
        $alumno = $alumnos_repo->findOneById($id);
        
        $notas_repo = $em->getRepository(Nota::class);
        $notas_alumnos = $notas_repo->getListSubjects($id);
        
        $result = '<h1>Pupil Notes</h1><table>';
        
        $table = '';
        
        foreach ($notas_alumnos as $key => $value) {
            $table = $table.'<tr><td>'.$value['subjectName'].'</td><td>'.$value['note'].'</td></tr>';
        }
        
        $result = $result.$table.'</table>Average grade of student';
        
        return new Response($result);
    }
}