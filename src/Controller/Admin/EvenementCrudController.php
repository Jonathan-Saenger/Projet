<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenement::class;
    }

    
   /* public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Titre');
        yield TextareaField::new('Description');
        yield IntegerField::new('Prix');
        yield DateField::new('Jour');
    } */
}
