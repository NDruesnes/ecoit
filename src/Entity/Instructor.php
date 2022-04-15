<?php

namespace App\Entity;

use App\Repository\InstructorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=InstructorRepository::class)
 */
class Instructor implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pseudo;

    /**
     * @ORM\ManyToOne(targetEntity=InstructorStatut::class, inversedBy="instructor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $instructorStatut;

    /**
     * @ORM\ManyToMany(targetEntity=Speciality::class, inversedBy="instructors")
     */
    private $speciality;

    /**
     * @ORM\OneToOne(targetEntity=ProfilImg::class, mappedBy="instructor", cascade={"persist", "remove"})
     */
    private $profilImg;

    /**
     * @ORM\ManyToMany(targetEntity=Training::class, mappedBy="instructors")
     */
    private $trainings;

    public function __construct()
    {
        $this->speciality = new ArrayCollection();
        $this->trainings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getInstructorStatut(): ?InstructorStatut
    {
        return $this->instructorStatut;
    }

    public function setInstructorStatut(?InstructorStatut $instructorStatut): self
    {
        $this->instructorStatut = $instructorStatut;

        return $this;
    }

    /**
     * @return Collection<int, Speciality>
     */
    public function getSpeciality(): Collection
    {
        return $this->speciality;
    }

    public function addSpeciality(Speciality $speciality): self
    {
        if (!$this->speciality->contains($speciality)) {
            $this->speciality[] = $speciality;
        }

        return $this;
    }

    public function removeSpeciality(Speciality $speciality): self
    {
        $this->speciality->removeElement($speciality);

        return $this;
    }

    public function getProfilImg(): ?ProfilImg
    {
        return $this->profilImg;
    }

    public function setProfilImg(ProfilImg $profilImg): self
    {
        // set the owning side of the relation if necessary
        if ($profilImg->getInstructor() !== $this) {
            $profilImg->setInstructor($this);
        }

        $this->profilImg = $profilImg;

        return $this;
    }

    /**
     * @return Collection<int, Training>
     */
    public function getTrainings(): Collection
    {
        return $this->trainings;
    }

    public function addTraining(Training $training): self
    {
        if (!$this->trainings->contains($training)) {
            $this->trainings[] = $training;
            $training->addInstructor($this);
        }

        return $this;
    }

    public function removeTraining(Training $training): self
    {
        if ($this->trainings->removeElement($training)) {
            $training->removeInstructor($this);
        }

        return $this;
    }
}
