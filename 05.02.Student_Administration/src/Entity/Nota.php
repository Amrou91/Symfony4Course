<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="nota", indexes={@ORM\Index(name="IDX_C8D03E0DFC28E5EE", columns={"alumno_id"}), @ORM\Index(name="IDX_C8D03E0DC5C70C5B", columns={"asignatura_id"})})
 * @ORM\Entity
 */
class Nota
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="n_convocatoria", type="integer", nullable=false)
     */
    private $nConvocatoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="nota", type="float", precision=10, scale=0, nullable=false)
     */
    private $nota;

    /**
     * @var \Alumnos
     *
     * @ORM\ManyToOne(targetEntity="Alumnos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alumno_id", referencedColumnName="id")
     * })
     */
    private $alumno;

    /**
     * @var \Alumnos
     *
     * @ORM\ManyToOne(targetEntity="Alumnos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="asignatura_id", referencedColumnName="id")
     * })
     */
    private $asignatura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNConvocatoria(): ?int
    {
        return $this->nConvocatoria;
    }

    public function setNConvocatoria(int $nConvocatoria): self
    {
        $this->nConvocatoria = $nConvocatoria;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNota(): ?float
    {
        return $this->nota;
    }

    public function setNota(float $nota): self
    {
        $this->nota = $nota;

        return $this;
    }

    public function getAlumno(): ?Alumnos
    {
        return $this->alumno;
    }

    public function setAlumno(?Alumnos $alumno): self
    {
        $this->alumno = $alumno;

        return $this;
    }

    public function getAsignatura(): ?Alumnos
    {
        return $this->asignatura;
    }

    public function setAsignatura(?Alumnos $asignatura): self
    {
        $this->asignatura = $asignatura;

        return $this;
    }


}
