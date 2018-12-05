<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlumnosAsignaturas
 *
 * @ORM\Table(name="alumnos_asignaturas", indexes={@ORM\Index(name="IDX_D57EE88FC28E5EE", columns={"alumno_id"}), @ORM\Index(name="IDX_D57EE88C5C70C5B", columns={"asignatura_id"})})
 * @ORM\Entity
 */
class AlumnosAsignaturas
{
    /**
     * @var int
     *
     * @ORM\Column(name="asignatura_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $asignaturaId;

    /**
     * @var int
     *
     * @ORM\Column(name="alumno_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $alumnoId;

    public function getAsignaturaId(): ?int
    {
        return $this->asignaturaId;
    }

    public function getAlumnoId(): ?int
    {
        return $this->alumnoId;
    }


}
