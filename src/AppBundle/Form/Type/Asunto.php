<?php
namespace AppBundle\Form\Type;
/*
 * Copyright (C) 2018 Ing. Ricardo Presilla
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
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
/**
 * Tipo de lista de selección personalizada para el Asunto del mensaje de 
 * contacto.
 *
 * @author Ing. Ricardo Presilla
 * @version 1.0
 */
class Asunto extends AbstractType{
    /**Método para definir las opciones del choices.
     * @param $resolver Tipo OptionsResolver.
     */
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'choices' => array(
                'Registro de Marcas' => 'Registro de Marcas',
                'Oficios emitidos por el IMPI' => 'Oficios emitidos por el IMPI',
                'Registro de Obras' => 'Registro de Obras',
                'Reserva de Derechos' => 'Reserva de Derechos',
                'Requisitos para Circulación de Revistas/Periódicos' => 'Requisitos para Circulación de Revistas/Periódicos',
                'Certificados de Licitud de Título y Contenido' => 'Certificados de Licitud de Título y Contenido',
                'ISSN' => 'ISSN',
                'ISBN' => 'ISBN',
                'Invenciones y Creaciones (Patentes)' => 'Invenciones y Creaciones (Patentes)',
                'Procedimientos Administrativos y Judiciales' => 'Procedimientos Administrativos y Judiciales',
                'Consulta Jurídica' => 'Consulta Jurídica',
                'Otra' => 'Otra',
            ),
            'choices_as_values' => true,
        ));
    }
    /**
     * Esta función indica que está extendiendo el ChoiceTypecampo. 
     */
    public function getParent(){
        return ChoiceType::class;
    }
}
