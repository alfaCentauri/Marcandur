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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
/**
 * Description of RegistroInternacionalType
 *
 * @package AppBundle\Form\Type
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class RegistroInternacionalType extends AbstractType
{
    /**
     * Formulario de solicitud de registro de marcas internacionales.
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Datos de contacto
        $builder->add('contacto', ContactoType::class);
        //Datos de la marca ha registrar
        $builder->add('nombre', TextType::class, array('label'=> 'Nombre o denominación de la marca a registrar:', 
                    'attr' => array('class' => 'form-control',  
                        'placeholder' => 'Nombre de la marca', 
                        'tooltip' => 'Escribe el nombre',
                        'required'   => true)));
        $builder->add('pais', Pais::class, array('label'=> 'Desea registrar su marca en:', 
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Seleccione uno',
                        'required' => true)));
        $builder->add('tieneLogotipo', ChoiceType::class, array(
            'choices'=> array('Si' => 'Si', 'No' => 'No'), 
            'attr' => array('class' => 'radioInput', 'required' => true, ),
            'expanded' => TRUE, 
            'multiple'  => FALSE));
        
        $builder->add('registraAnterior', ChoiceType::class, array(
            'choices'=> array('Si' => 'Si', 'No' => 'No'), 
            'attr' => array('class' => 'radioInput', 'required' => true, ),
            'expanded' => TRUE, 
            'multiple'  => FALSE,
            ));
        $builder->add('comentarios', TextareaType::class, array('label'=> 'Comentarios',
                    'attr' => array('class' => 'form-control', 
                        'placeholder' => "Resumen de su obra", 
                        'maxlength' => "2000", 
                        'tooltip' => 'Escribe tu resumen', 
                        'required'   => true)));
    }
    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\MarcaInternacional',
        ));
    }
    /**
     * Regresa el nombre de la clase.
     * @return string
     */
    public function getName()
    {
        return 'registroMarcaInternacional';
    }
}
