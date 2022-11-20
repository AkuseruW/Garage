<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ORM\Index(name: 'voitures', columns: ['model_name'], flags: ['fulltext'])]
#[Vich\Uploadable]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $modelName = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\OneToMany(mappedBy: 'voiture', targetEntity: ImagesVoitures::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $imagesVoitures;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marques $marques = null;

    #[ORM\Column]
    private ?int $nbr_propi = null;

    #[ORM\Column]
    private ?int $puissance = null;

    #[ORM\Column(length: 255)]
    private ?string $cylindre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $Carburant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    private ?User $user = null;

    #[ORM\Column(length: 50, nullable:true)]
    private ?string $transmission = null;

    public function __construct()
    {
        $this->imagesVoitures = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function prePersist():void
    {
        $this->slug = (new AsciiSlugger())->slug($this->modelName.''.uniqid());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelName(): ?string
    {
        return $this->modelName;
    }

    public function setModelName(string $modelName): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * @return Collection<int, ImagesVoitures>
     */
    public function getImagesVoitures(): Collection
    {
        return $this->imagesVoitures;
    }

    public function addImagesVoiture(ImagesVoitures $imagesVoiture): self
    {
        if (!$this->imagesVoitures->contains($imagesVoiture)) {
            $this->imagesVoitures->add($imagesVoiture);
            $imagesVoiture->setVoiture($this);
        }

        return $this;
    }

    public function removeImagesVoiture(ImagesVoitures $imagesVoiture): self
    {
        if ($this->imagesVoitures->removeElement($imagesVoiture)) {
            // set the owning side to null (unless already changed)
            if ($imagesVoiture->getVoiture() === $this) {
                $imagesVoiture->setVoiture(null);
            }
        }

        return $this;
    }

    public function getMarques(): ?Marques
    {
        return $this->marques;
    }

    public function setMarques(?Marques $marques): self
    {
        $this->marques = $marques;

        return $this;
    }

    public function getNbrPropi(): ?int
    {
        return $this->nbr_propi;
    }

    public function setNbrPropi(int $nbr_propi): self
    {
        $this->nbr_propi = $nbr_propi;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getCylindre(): ?string
    {
        return $this->cylindre;
    }

    public function setCylindre(string $cylindre): self
    {
        $this->cylindre = $cylindre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->Carburant;
    }

    public function setCarburant(string $Carburant): self
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }
}
