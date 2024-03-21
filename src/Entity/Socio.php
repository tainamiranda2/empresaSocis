<?php

namespace App\Entity;

use App\Repository\SocioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocioRepository::class)]
class Socio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $telfone = null;

    #[ORM\Column(length: 255)]
    private ?string $endereco = null;

    #[ORM\Column]
    private ?int $empresa_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTelfone(): ?string
    {
        return $this->telfone;
    }

    public function setTelfone(string $telfone): static
    {
        $this->telfone = $telfone;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): static
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getEmpresaId(): ?int
    {
        return $this->empresa_id;
    }

    public function setEmpresaId(int $empresa_id): static
    {
        $this->empresa_id = $empresa_id;

        return $this;
    }
}
