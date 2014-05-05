<?php
namespace Cannibal\Bundle\NameBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', "choice", array('choices' => array(
                'Mr'=>'Mr',
                'Ms'=>'Ms',
                'Mrs'=>'Mrs',
                'Dr'=>'Dr',
                'Rev'=>'Rev'
            ),
            'label' => 'Title',
            ))
            ->add('given', null, array('label'=>'Given'))
            ->add('family', null, array('label'=>'Surname'));
            //->add('honourific')
            //->add('lineage');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    function getName()
    {
        return "name";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cannibal\Bundle\NameBundle\Entity\Name'
        ));
    }
}
