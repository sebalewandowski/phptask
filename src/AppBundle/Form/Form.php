<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Created by PhpStorm.
 * User: sebastianlewandowski
 * Date: 2019-02-11
 * Time: 12:00
 */


class Form extends AbstractType
{

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        for ($i=1; $i<=10; $i++) {
            $builder
                ->add("number{$i}", IntegerType::class, ["label" => "Test case - {$i}", 'required'   => false]);
        }

        $builder
            ->add("submit", SubmitType::class)
            ->setAction("calculate")
            ->getForm();
    }
}