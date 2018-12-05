<?php
// src/Repository/NotaRepository.php
namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

use App\Entity\Nota;

class NotaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Nota::class);
    }
    /**
     * @param $auth
     * @return Nota[]
     */
    public function getListSubjects( $id )
    {
        // we extract the complete list of notes
        $qb = $this->createQueryBuilder('n')
            ->select('n.fecha, n.nota, al.nombre, al.apellidos, al.nExpediente, ag.id as subjectId, ag.nombre as subjectName')
            ->innerJoin('n.alumno', 'al', 'al.id = n.alumno')
            ->innerJoin('n.asignatura', 'ag', 'ag.id = n.asignatura')
            ->where('al.id =:id')
            ->setParameter('id', $id)
            ->orderBy('n.fecha', 'ASC') 
            ->getQuery()
            ->execute();
            $result = [];
            
        foreach($qb as $key => $value){
            $subjectId = $value['subjectId'];
            $subjectName = $value['subjectName'];
            $note = $value['nota'];
            $result[ $subjectId ] = [
                'subjectName' => $subjectName,
                'note' => $note
            ];
        }
        
        return $result;
    }
}