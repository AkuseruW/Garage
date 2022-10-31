<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
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

    public function __construct()
    {
        $this->imagesVoitures = new ArrayCollection();
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
}
