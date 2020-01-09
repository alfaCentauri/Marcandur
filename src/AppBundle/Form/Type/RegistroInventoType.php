<?php

/*
 * Copyright (C) 2019 Ingeniero en computación: Ricardo Presilla.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
/**
 * Description of RegistroInventoType
 *
 * @package AppBundle\Form\Type
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class RegistroInventoType extends AbstractType{
    /**
     * Formulario de solicitud de registro de invenciones.
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Datos de contacto
        $builder->add('contacto', ContactoType::class);
        $builder->add('tipoInvento', ChoiceType::class, array(
            'choices'=> array(
                'Patentes' => 'Patentes', 
                'Diseños Industriales' => 'Diseños Industriales',
                'Modelos de Utilidad' => 'Modelos de Utilidad',
                'Otra' => 'Otra'
                ), 
            'attr' => array('class' => 'form-control', 'required' => true, )));
        $builder->add('sintesis', TextareaType::class, array('label'=> 'Redacte brevemente en qué consiste su invención',
                    'attr' => array('class' => 'form-control',
                        'rows' => '5',
                        'placeholder' => "Sintesis", 
                        'maxlength' => "2000", 
                        'tooltip' => 'Escribe tu sintesis', 
                        'required'   => true)));
    }
    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Invento',
        ));
    }
    /**
     * Regresa el nombre de la clase.
     * @return string
     */
    public function getName()
    {
        return 'RegistroInventoType';
    }
}
