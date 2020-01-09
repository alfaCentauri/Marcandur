<?php

/*
 * Copyright (C) 2018 Ingeniero en computación: Ricardo Presilla.
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

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * Description of Colaborador
 *
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.1.
 */
class Colaborador {
    /**
     * @var String Nombre completo
     */
    private $nombre;
    /**
     * Fecha de nacimiento del colaborador.
     * @var mixed Fecha de nacimiento
     */
    private $fechaNacimiento;
    /**
     * @var String Lugar de nacimiento
     */
    private $lugarNacimiento;
    /**
     * @var String 
     */
    private $RFC;
    /**
     * @var String Nacionalidad del colaborador
     */
    private $nacionalidad;
    /**
     * @var float Porcentaje de participación
     */
    private $porcentaje;
    /**
     * Constructor
     **/
    public function __construct() {
        $this->nombre="";
//        $this->fechaNacimiento= new \DateTime();
        $this->lugarNacimiento="";
        $this->RFC="";
        $this->nacionalidad="";
        $this->porcentaje=0;
    }
    /**Getters y Setters**/
    public function getNombre(): String {
        return $this->nombre;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getLugarNacimiento(): String {
        return $this->lugarNacimiento;
    }

    public function getRFC(): String {
        return $this->RFC;
    }

    public function getNacionalidad(): String {
        return $this->nacionalidad;
    }

    public function getPorcentaje() {
        return $this->porcentaje;
    }

    public function setNombre(String $nombre) {
        $this->nombre = $nombre;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setLugarNacimiento(String $lugarNacimiento) {
        $this->lugarNacimiento = $lugarNacimiento;
    }

    public function setRFC(String $RFC) {
        $this->RFC = $RFC;
    }

    public function setNacionalidad(String $nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function setPorcentaje($porcentaje) {
        $this->porcentaje = $porcentaje;
    }
    
}
