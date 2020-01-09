<?php

/*
 * Copyright (C) 2019 Ingeniero en Computación: Ricardo Presilla.
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
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
/**
 * Tipo de lista de selección personalizada para mostrar el Pais.
 *
 * @author Ingeniero en Computación: Ricardo Presilla.
 * @version 1.0.
 */
class Pais extends AbstractType{
    /**Método para definir las opciones del choices.
     * @param $resolver Tipo OptionsResolver.
     */
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'choices' => array(
                'Asia' => 'Asia',
                'Australia' => 'Australia',
                'Canada' => 'Canada',
                'Centro América' => 'Centro América',
                'Estados Unidos' => 'Estados Unidos',
                'Sur América' => 'Sur América',
                'Unión Europea' => 'Unión Europea',
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
