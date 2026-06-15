<?php

namespace App\Controller\Admin;

use App\Entity\Commite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class CommiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('role'),
             TextField::new('prenom'),
              TextField::new('email'),
        ];
    }
    
}
