<?php

namespace App\Form;

use App\Entity\Commentaire;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note', ChoiceType::class, [
                'choices' => ['1'=> 1, '2'=> 2, '3'=> 3, '4'=> 4, '5'=> 5],
                'label' => 'note',])
            ->add('nom', TextType::class, ['label' => 'Nom et prénom :'])
            ->add('commentaire', TextareaType::class, ['label' => 'Commentaire :'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
