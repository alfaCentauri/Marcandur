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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
/**
 * Description of DomicilioType
 *
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class DomicilioType extends AbstractType {
    /**
     * Formulario de solicitud de registro de marcas.
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('calle', TextType::class, array('label'=> 'Calle o Avenida:', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'Calle ó Avenida', 
                        'tooltip' => 'Escribe la calle',
                        'required'   => true)));
        $builder->add('numero', NumberType::class, array('label'=> 'Número:', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => '00', 
                        'tooltip' => 'Escribe el número',
                        'required'   => true)));
        $builder->add('municipio', TextType::class, array('label'=> 'Municipio o delegación:', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'Municipio o delegación', 
                        'tooltip' => 'Escriba un municipio o delegación',
                        'required'   => true)));
        $builder->add('ciudad', TextType::class, array('label'=> 'Ciudad o Población: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'Ciudad o población', 
                        'tooltip' => 'Escriba una ciudad o población',
                        'required'   => true)));
        $builder->add('estado', TextType::class, array('label'=> 'Estado: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'Estado', 
                        'tooltip' => 'Escriba un estado',
                        'required'   => true)));
        $builder->add('pais', TextType::class, array('label'=> 'País: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'País', 
                        'tooltip' => 'Escriba un país',
                        'required'   => true)));
        $builder->add('codigoPostal', NumberType::class, array('label'=> 'Código postal: ', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => '0000', 
                        'tooltip' => 'Escriba el código postal',
                        'required'   => true)));
    }
    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Domicilio',
        ));
    }
    /**
     * Regresa el nombre de la clase.
     * @return string
     */
    public function getName()
    {
        return 'DomicilioType';
    }
}
