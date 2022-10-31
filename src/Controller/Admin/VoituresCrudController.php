<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\Voitures;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VoituresCrudController extends AbstractCrudController
{

    private $em;
    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    public static function getEntityFqcn(): string
    {
        return Voitures::class;
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        // ->addBatchAction(Crud::PAGE_DETAIL, Action::BATCH_DELETE)

    ;
}

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('modelName'),
            IntegerField::new('kilometrage'),
            MoneyField::new('prix')->setCurrency('EUR'),
            AssociationField::new('marques')
            ->setFormTypeOptions(['by_reference' => false,]),

            CollectionField::new('ImagesVoitures')
            ->setEntryType(ImageType::class)
            ->onlyOnForms(),
            CollectionField::new('ImagesVoitures')->setTemplatePath('admin/collection.html.twig')->onlyOnDetail()->allowDelete(true),

        ];
    }


    public function removeImagesVoiture($id)
    {
        dd($id);
        // $em->remove($imagesVoiture);
        // $em->flush();
    }
    
}
