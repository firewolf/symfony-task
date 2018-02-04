<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductType extends AbstractType
{
    
    public function buildForm (FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add ('name', TextType::class, ['label' => 'admin.new_product.form.name'])
            ->add ('description', TextareaType::class, ['label' => 'admin.new_product.form.description'])
            ->add ('price', TextType::class, ['label' => 'admin.new_product.form.price'])
            ->add ('save_add', SubmitType::class, ['label' => 'admin.new_product.form.save_add'])
            ->add ('save', SubmitType::class, ['label' => 'admin.new_product.form.save'])
        ;
            
    }
}

