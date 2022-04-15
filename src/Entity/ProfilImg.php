<?php

namespace App\Entity;

use App\Repository\ProfilImgRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilImgRepository::class)
 */
class ProfilImg
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file_url;

    /**
     * @ORM\OneToOne(targetEntity=Instructor::class, inversedBy="profilImg", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $instructor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFileUrl(): ?string
    {
        return $this->file_url;
    }

    public function setFileUrl(string $file_url): self
    {
        $this->file_url = $file_url;

        return $this;
    }

    public function getInstructor(): ?Instructor
    {
        return $this->instructor;
    }

    public function setInstructor(Instructor $instructor): self
    {
        $this->instructor = $instructor;

        return $this;
    }
}
