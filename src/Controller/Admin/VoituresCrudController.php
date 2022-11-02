<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\Voitures;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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

    public function configureCrud(Crud $crud): Crud
    {
        return Crud::new()
            ->overrideTemplates([
                'crud/new' => 'admin/createVoiture.html.twig',
                'crud/edit' => 'admin/editVoiture.html.twig',
            ]);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('modelName'),
            IntegerField::new('kilometrage'),
            IntegerField::new('nbr_propi'),
            IntegerField::new('puissance'),
            TextField::new('cylindre'),
            TextField::new('carburant'),
            DateField::new('date'),
            SlugField::new('slug')->setTargetFieldName('modelName'),
            TextEditorField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR'),
            AssociationField::new('marques')
                ->setFormTypeOptions(['by_reference' => true,]),



            // CollectionField::new('ImagesVoitures')->setTemplatePath('admin/collection.html.twig')->onlyOnDetail()->allowDelete(true),
            CollectionField::new('ImagesVoitures')
                ->setEntryType(ImageType::class)
                ->onlyOnForms(),

        ];
    }


    public function removeImagesVoiture($id)
    {
        dd($id);
        // $em->remove($imagesVoiture);
        // $em->flush();
    }
}
