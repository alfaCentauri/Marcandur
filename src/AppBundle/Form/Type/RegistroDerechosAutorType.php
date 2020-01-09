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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
/**
 * Description of RegistroDerechosAutorType
 *
 * @package AppBundle\Form\Type
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class RegistroDerechosAutorType extends AbstractType
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
        $builder->add('titulo', TextType::class, array('label'=> 'Título de la obra', 
            'attr' => array('class' => 'form-control',  
                'placeholder' => 'Indique el Título de la obra', 
                'tooltip' => 'Escribe el Título de la obra',
                'required'   => true)));
        $builder->add('sintesis', TextareaType::class, array('label'=> 'Síntesis o Contenido de la Obra',
            'attr' => array('class' => 'form-control', 
                'rows' => '4',
                'placeholder' => "Resumen de su obra", 
                'maxlength' => "2000", 
                'tooltip' => 'Escribe tu resumen', 
                'required'   => true)));
        $builder->add('rama', ChoiceType::class, array(
            'choices'=> array(
                'Literaria' => 'Literaria', 
                'Musical con letra' => 'Musical con letra',
                'Musical sin letra' => 'Musical sin letra',
                'Dramática' => 'Dramática',
                'Danza' => 'Danza',
                'Pictorica' => 'Pictorica',
                'Dibujo' => 'Dibujo',
                'Escultorica' => 'Escultorica',
                'De caracter plástico' => 'De caracter plástico',
                'Caricatura' => 'Caricatura',
                'Historieta' => 'Historieta',
                'Arquitectonica' => 'Arquitectonica',
                'Cinematografica' => 'Cinematografica',
                'Audio Visual' => 'Audio Visual',
                'Programa de radio' => 'Programa de radio',
                'Programa de telecisión' => 'Programa de telecisión',
                'Programa de computo' => 'Programa de computo',
                'Fotográfica' => 'Fotográfica',
                'Arte aplicado' => 'Arte aplicado',
                'Diseño Gráfico' => 'Diseño Gráfico',
                'Diseño Textil' => 'Diseño Textil',
                'Compilación de Datos' => 'Compilación de Datos',
                'Base de Datos' => 'Base de Datos'
                ), 
            'attr' => array('class' => 'form-control', 'required' => true, )));
        $builder->add('dadaAConocer', ChoiceType::class, array(
            'choices'=> array('Si' => 'Si', 'No' => 'No'), 
            'attr' => array('class' => 'radioInput', 
                'required' => true, ),
            'expanded' => TRUE, 
            'multiple'  => FALSE));
        $builder->add('fecha', DateType::class, array(
            'label'=> 'Desde que fecha:',
            'widget' => 'single_text',
            //Formato para la fecha con el datepicker
            'format' => 'yyyy-MM-dd',
            // prevents rendering it as type="date", to avoid HTML5 date pickers
            'html5' => false,
            'attr' => array('class' => 'form-control js-datepicker',  
                'placeholder' => 'Seleccione una fecha', 
                'tooltip' => 'Seleccione una fecha',
                'required'=>true,
                'disabled'=>true)));  
        $builder->add('derivada', ChoiceType::class, array(
            'choices'=> array('Si' => 'Si', 'No' => 'No'), 
            'attr' => array(
                'class' => 'radioInput', 
                'required' => true,),
            'expanded' => TRUE, 
            'multiple'  => FALSE));
        $builder->add('tituloOriginal', TextType::class, array(
            'label'=> 'Especifique de qué obra se deriva, así como el título de dicha obra:', 
            'attr' => array('class' => 'form-control',  
                'placeholder' => 'Indique el Título de la obra', 
                'tooltip'=>'Escribe el Título de la obra de la cual se deriva',
                'required'=>true,
                'disabled'=>true)));
        $builder->add('autor', TextType::class, array(
            'label'=> 'Nombre del autor:', 
            'attr' => array('class' => 'form-control',  
                'placeholder' => 'Indique el autor de la obra que se deriva', 
                'tooltip' => 'Escribe el nombre del autor de la obra de la cual se deriva',
                'required'=> true,
                'disabled'=>true)));
        //DATOS DEL AUTOR O COLABORADOR DE LA OBRA
        $builder->add('listaColaboradores', HiddenType::class, array(
            'data' => '',
        ));
//        $builder->add('colaboradores', CollectionType::class, array(
//            'entry_type'=> ColaboradorType::class,
//            'entry_options' => ['label' => false],
//            'allow_add' => true,
//        ));
        //Titular
        $builder->add('titular', TextType::class, array(
            'label'=> 'El titular será el mismo autor: ', 
            'attr' => array('class' => 'form-control',
                'placeholder' => 'Apellido, Nombre', 
                'tooltip' => 'Escribe el nombre del titular de la obra',
                'required'   => true)));
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
            'data_class' => 'AppBundle\Entity\DatosObra',
        ));
    }
    /**
     * Regresa el nombre de la clase.
     * @return string
     */
    public function getName()
    {
        return 'RegistroDerechosAutor';
    }
}
