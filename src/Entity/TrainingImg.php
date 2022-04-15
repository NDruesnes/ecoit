<?php

namespace App\Entity;

use App\Repository\TrainingImgRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrainingImgRepository::class)
 */
class TrainingImg
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
     * @ORM\OneToOne(targetEntity=Training::class, inversedBy="trainingImg", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

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

    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(Training $training): self
    {
        $this->training = $training;

        return $this;
    }
}
