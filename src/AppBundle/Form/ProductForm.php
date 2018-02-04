<?php

namespace AppBundle\Form;

use Symfony\Component\Validator\Constraints as Assert;

class ProductForm
{
    /**
     * @Assert\NotBlank(
     *      message="productform.name.notblank"
     * )
     * @var string
     */
    public $name;
    
    /**
     * @Assert\NotBlank(
     *  message="productform.description.notblank"
     * )
     * @Assert\Length(
     *      min=10, 
     *      minMessage="productform.description.min"
     * )
     * @var string
     */
    public $description;
    
    /**
     * @Assert\NotBlank(
     *  message="productform.price.notblank"
     * )
     * @Assert\Regex(
     *      pattern="/^\d+(,\d\d?)?$/", 
     *      message="productform.price.regex"
     * )
     * @var string
     */
    public $price;
    
}
