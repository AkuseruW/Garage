<?php

namespace App\Entity;

use App\Repository\ImagesVoituresRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ImagesVoituresRepository::class)]
#[Vich\Uploadable]
class ImagesVoitures
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'images_voiture', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string')]
    private ?string $imageName = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'imagesVoitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Voitures $voiture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getNameImage(): ?string
    // {
    //     return $this->nameImage;
    // }

    // public function setNameImage(string $nameImage): self
    // {
    //     $this->nameImage = $nameImage;

    //     return $this;
    // }

    public function getVoiture(): ?Voitures
    {
        return $this->voiture;
    }

    public function setVoiture(?Voitures $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
}
