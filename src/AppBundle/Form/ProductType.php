<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Command\AddProductCommand;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductType extends AbstractType
{
    
    /**
     *
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    
    /**
     * 
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage) {
        $this->tokenStorage = $tokenStorage;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::configureOptions()
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddProductCommand::class
        ]);
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm (FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add ('name', TextType::class, ['label' => 'admin.new_product.form.name'])
            ->add ('description', TextareaType::class, ['label' => 'admin.new_product.form.description'])
            ->add ('price', TextType::class, ['label' => 'admin.new_product.form.price'])
            ->add ('save_add', SubmitType::class, ['label' => 'admin.new_product.form.save_add'])
            ->add ('save', SubmitType::class, ['label' => 'admin.new_product.form.save'])
        ;
        
        $builder->addEventListener(FormEvents::POST_SUBMIT, [$this, 'onSubmit']);
            
    }
    
    /**
     * 
     * @param FormEvent $event
     */
    public function onSubmit (FormEvent $event) {
        $event->getData ()->owner = $this->tokenStorage->getToken()->getUser();
        $event->setData($event->getData ());
    }
    
}

