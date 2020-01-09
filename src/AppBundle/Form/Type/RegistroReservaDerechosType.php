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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
/**
 * Description of RegistroReservaDerechosType
 *
 * @package AppBundle\Form\Type
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class RegistroReservaDerechosType  extends AbstractType
{
    /**
     * Formulario de solicitud de registro de derechos de autor.
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Datos de contacto
        $builder->add('contacto', ContactoType::class);
        //Datos de la reserva de los derechos 
        $builder->add('opcion', HiddenType::class, array(
            'data' => '1',
        ));
//                ChoiceType::class, array(
//            'choices'=> array(
//                'Publicación Periodica' => 'Publicación Periodica',
//                'Difusiones Periódicas' => 'Difusiones Periódicas',
//                'Promoción Publicitaria'=> 'Promoción Publicitaria',
//                'Personas o Grupos dedicados a actividades artísticas'=>'Personas o Grupos dedicados a actividades artísticas',
//                'Personajes'=>'Personajes'), 
//            'attr' => array('class' => 'radioInput', 
//                'required' => true, ),
//            'expanded' => TRUE, 
//            'multiple'  => FALSE));
        $builder->add('publicacionPeriodica', ChoiceType::class, array(
            'choices'=> array(
                'Periódico' => 'Periódico', 
                'Revista' => 'Revista',
                'Folleto' => 'Folleto',
                'Boletín' => 'Boletín',
                'Catálogo' => 'Catálogo',
                'Directorio' => 'Directorio',
                'Suplemento' => 'Suplemento',
                'Guía' => 'Guía',
                'Cabeza de Columna' => 'Cabeza de Columna',
                'Calendario' => 'Calendario',
                'Agenda' => 'Agenda'
                ), 
            'attr' => array('class' => 'form-control',
                'required' => false,
                'placeholder'=>'Indique una opción'),
            'empty_data' => 'Periódico',));
        $builder->add('difusionesPeriodicas', ChoiceType::class, array(
            'choices'=> array(
                'Programa de T.V.' => 'Programa de T.V.', 
                'Programa de radio' => 'Programa de radio',
                'Difusión Vía Red de Cómputo' => 'Folleto',
                ), 
            'attr' => array(
                'class' => 'form-control',
                'required' => false,
                'placeholder'=>'Indique una opción',
                'disabled'=>true,),
            'empty_data' => 'Programa de T.V.',));
        $builder->add('grupos', ChoiceType::class, array(
            'choices'=> array(
                'Nombre Artístico' => 'Nombre Artístico', 
                'Grupo Artístico' => 'Grupo Artístico',
                ), 
            'attr' => array(
                'class' => 'form-control',
                'required' => false,
                'placeholder'=>'Indique una opción',
                'disabled'=>true),
            'empty_data' => 'Nombre Artístico',));
        $builder->add('personajes', ChoiceType::class, array(
            'choices'=> array(
                'Ficticios o Simbólicos' => 'Ficticios o Simbólicos', 
                'Humanos de Caracterización' => 'Humanos de Caracterización',
                ), 
            'attr' => array(
                'class' => 'form-control', 
                'required' => false,
                'placeholder'=>'Indique una opción',
                'disabled'=>true),
            'empty_data' => 'Ficticios o Simbólicos',));
        //DATOS DEL AUTOR O COLABORADOR DE LA OBRA
        $builder->add('listaColaboradores', HiddenType::class, array(
            'data' => '',
        ));
        //Datos de domicilio
        $builder->add('domicilio', DomicilioType::class);
        //Otros datos de contacto
        $builder->add('OtrosContactos', OtrosContactosType::class);
        //Datos de facturación
        $builder->add('factura', DatosFacturaType::class);
    }
    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ReservaDerechos',
        ));
    }
    /**
     * Regresa el nombre de la clase.
     * @return string
     */
    public function getName()
    {
        return 'RegistroReservaDerechos';
    }
}
