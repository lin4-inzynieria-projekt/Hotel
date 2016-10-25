<?php

namespace HotelBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type as FormType;

use Symfony\Component\Validator\Constraints as Assert;

use Fachowo\AdminBundle\Form\Traits;

class StepOneType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arrival', FormType\TextType::class, [
                'mapped' => false,
                'label' => 'Przyjazd',
                'required' => true,
                'attr' => ['placeholder' => false, 'class' => 'Item Select dateTime', 'readonly' => 'readonly'],
            ])
            ->add('departure', FormType\TextType::class, [
                'mapped' => false,
                'label' => 'Odjazd',
                'required' => true,
                'attr' => ['placeholder' => false, 'class' => 'Item Select dateTime', 'readonly' => 'readonly'],
            ])
            ->add('check', FormType\SubmitType::class, [
                'label' => 'Sprawdź'
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'step_one';
    }
}