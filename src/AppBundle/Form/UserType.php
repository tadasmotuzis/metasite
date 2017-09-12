<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;


class UserType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder
			->add('username', TextType::class, array('label' => 'Username or Email'))
			->add('email', EmailType::class)
			->add('password', RepeatedType::class, [
				'type' => PasswordType::class,
				'first_options'  => array('label' => 'Password'),
    			'second_options' => array('label' => 'Repeat Password'),
			])
			->add('submit', SubmitType::class, [
				'attr' => [
					'class' => 'btn btn-success pull-right'
				],
				'label' => 'Register'
			]);
	}

	public function configureOptions(OptionsResolver $resolver){
		$resolver->setDefaults([
			'data_class' => User::class
		]);
	}

}