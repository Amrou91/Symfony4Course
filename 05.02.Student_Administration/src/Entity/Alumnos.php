<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumnos
 *
 * @ORM\Table(name="alumnos", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_1435D52D67E69CFE", columns={"n_expediente"}), @ORM\UniqueConstraint(name="UNIQ_1435D52DC1E70A7F", columns={"telefono"}), @ORM\UniqueConstraint(name="UNIQ_1435D52DE7927C74", columns={"email"})})
 * @ORM\Entity
 */
class Alumnos
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
     * @ORM\Column(name="n_expediente", type="integer", nullable=false)
     */
    private $nExpediente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255, nullable=false)
     */
    private $apellidos;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var bool
     *
     * @ORM\Column(name="sexo", type="boolean", nullable=false)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @var int|null
     *
     * @ORM\Column(name="grado_id", type="integer", nullable=true)
     */
    private $gradoId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNExpediente(): ?int
    {
        return $this->nExpediente;
    }

    public function setNExpediente(int $nExpediente): self
    {
        $this->nExpediente = $nExpediente;

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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getSexo(): ?bool
    {
        return $this->sexo;
    }

    public function setSexo(bool $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getGradoId(): ?int
    {
        return $this->gradoId;
    }

    public function setGradoId(?int $gradoId): self
    {
        $this->gradoId = $gradoId;

        return $this;
    }


}
