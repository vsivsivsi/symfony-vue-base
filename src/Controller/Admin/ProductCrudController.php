<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('description'),
            MoneyField::new('price')->setCurrency('UAH')->setStoredAsCents(true),
            NumberField::new('stockQuantity'),
            FormField::addPanel('Brand'),
            AssociationField::new('brand')->setRequired(true)->setHelp('Select brand'),
            FormField::addPanel('Category'),
            AssociationField::new('category')->setRequired(true),
            ImageField::new('image_name')->setBasePath($this->getParameter('app.path.product_images'))->onlyOnIndex(),

            Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
        ];
    }

}
