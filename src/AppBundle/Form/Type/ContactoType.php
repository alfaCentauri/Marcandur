<?php

/*
 * Copyright (C) 2019 ricardo
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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
/**
 * Clase para definir ContactoType.
 *
 * @package AppBundle\Form\Type
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class ContactoType extends AbstractType{
    /**
     * Formulario para los datos de contacto.
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array('label'=> 'Nombre completo: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'Indique su nombre', 
                        'tooltip' => 'Escribe tu nombre',
                        'required'   => true))
                )
                ->add('correo', EmailType::class, array('label'=> 'E-mail: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'usuario@dominio.com', 
                        'tooltip' => 'Escribe tu correo',
                        'required'   => true)))
                ->add('telefono', NumberType::class, array('label'=> 'Teléfono fijo: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => '0000000', 
                        'tooltip' => 'Escribe tu número de teléfono fijo',
                        'required'   => true)))
                ->add('telefonoMovil', NumberType::class, array('label'=> 'Teléfono celular: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => '0000000', 
                        'tooltip' => 'Escribe tu número de teléfono celular',
                        'required'   => true)))
                ;
    }
    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',
        ));
    }
    /**
     * Nombre del typo de formulario.
     * @return string
     */
    public function getName()
    {
        return 'contacto';
    }
}
