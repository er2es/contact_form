<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Validator\Constraints\AllFieldsNotEmpty;


class ContactFormType extends AbstractType
{   

    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Név',
                'label_attr' => array('class' => 'req-asterisk'),
                //AllFieldsNotEmpty végzi el a html5 validation helyett
                'required' => false,
                'attr'=>[
                        'placeholder'=>'Teljes név',
                    ],
                'constraints' => [],
            ])
            ->add('email',EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => array('class' => 'req-asterisk'),
                //AllFieldsNotEmpty végzi el a html5 validation helyett
                'required' => false,
                'attr'=>[
                            'placeholder'=>'abc@domain.hu',

                        ],
                'constraints' => [],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Üzenet',
                'label_attr' => array('class' => 'req-asterisk'),
                //AllFieldsNotEmpty végzi el a html5 validation helyett
                'required' => false,
                'attr'=>[
                            'placeholder'=>'Üzenet',
                            'rows' => 7,
                        ],
                'constraints' => [],
            ])
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();

                $constraint = new AllFieldsNotEmpty();
                $violations = $this->validator->validate($data, $constraint);

                if (count($violations) > 0) {
                    foreach ($violations as $violation) {
                        $form->addError(new FormError($violation->getMessage()));    
                    }
                }
            });
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}