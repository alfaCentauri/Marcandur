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
 * Description of Domicilio
 *
 * @package AppBundle\Entity
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.1.
 */
class Domicilio {
    /**
     * Calle o avenida
     * @var String Nombre de la calle o avenida.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre de la calle debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre de la calle no debe tener más de {{ limit }} caracteres")
     */
    private $calle;
    /**
     * Numero, tipo de dato entero.
     * @var integer Numero del domicilio.
     * @Assert\GreaterThanOrEqual(
     *      value=0,
     *      message = "El valor del número debe ser mayor o igual que {{ compared_value }}")
     */
    private $numero;
    /**
     * Codigo postal, tipo de dato entero.
     * @var integer  Codigo postal.
     * @Assert\GreaterThanOrEqual(
     *      value=0,
     *      message = "El valor del codigo postal debe ser mayor o igual que {{ compared_value }}")
     */
    private $codigoPostal;
    /**
     * Municipio del domicilio.
     * @var String Nombre del municipio.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre del municipio debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre del municipio no debe tener más de {{ limit }} caracteres")
     */
    private $municipio;
    /**
     * Ciudad del domicilio.
     * @var String Nombre de la ciudad.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre de la ciudad debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre de la ciudad no debe tener más de {{ limit }} caracteres")
     */
    private $ciudad;
    /**
     * Estado.
     * @var String Nombre del estado.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre del estado debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre del estado no debe tener más de {{ limit }} caracteres")
     */
    private $estado;
    /**
     * País.
     * @var String Nombre del país.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre del país debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre del país no debe tener más de {{ limit }} caracteres")
     */
    private $pais;
    
    public function __construct() {
        $this->calle = "";
        $this->ciudad = "";
        $this->codigoPostal = 0;
        $this->estado = "";
        $this->municipio = "";
        $this->numero = 0;
        $this->pais = "";
    }
    
    public function getCalle() {
        return $this->calle;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getPais() {
        return $this->pais;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }
}
