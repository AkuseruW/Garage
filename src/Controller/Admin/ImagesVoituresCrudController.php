<?php

namespace App\Controller\Admin;

use App\Entity\ImagesVoitures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImagesVoituresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesVoitures::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
