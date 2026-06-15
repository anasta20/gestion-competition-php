<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
             ImageField::new('imageName' , "Etudiant Image")->setUploadDir('/public/uploads/images/products')->setBasePath($this->getParameter('app.path.product_images')),
            AssociationField::new('filiere'),
             TextField::new('prenom'),
              TextField::new('email'),
               TextField::new('etablissement'),
                IntegerField::new('telephone'),
                 TextField::new('equipename'),
                 BooleanField::new('deplacement'),
        ];
    }
    
}
