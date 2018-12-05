<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignaturas
 *
 * @ORM\Table(name="asignaturas", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_9243D6CE20332D99", columns={"codigo"})})
 * @ORM\Entity
 */
class Asignaturas
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
     * @ORM\Column(name="codigo", type="integer", nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_ingles", type="string", length=255, nullable=false)
     */
    private $nombreIngles;

    /**
     * @var int|null
     *
     * @ORM\Column(name="credects", type="integer", nullable=true)
     */
    private $credects;

    /**
     * @var int
     *
     * @ORM\Column(name="grado_id", type="integer", nullable=false)
     */
    private $gradoId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombreIngles(): ?string
    {
        return $this->nombreIngles;
    }

    public function setNombreIngles(string $nombreIngles): self
    {
        $this->nombreIngles = $nombreIngles;

        return $this;
    }

    public function getCredects(): ?int
    {
        return $this->credects;
    }

    public function setCredects(?int $credects): self
    {
        $this->credects = $credects;

        return $this;
    }

    public function getGradoId(): ?int
    {
        return $this->gradoId;
    }

    public function setGradoId(int $gradoId): self
    {
        $this->gradoId = $gradoId;

        return $this;
    }


}
