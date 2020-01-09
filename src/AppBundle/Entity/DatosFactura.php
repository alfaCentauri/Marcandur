<?php

/*
 * Copyright (C) 2018  Ingeniero en computación: Ricardo Presilla.
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
 * Description of DatosFactura
 *
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.2.
 */
class DatosFactura {
    /**
     * @var String  Razon social de la factura.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *      minMessage = "La razon social debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "La razon social no debe tener mas de {{ limit }} caracteres")
     */
    private $razonSocial;
    /**
     * @var String Cadena de caracteres con un serial RFC.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 1,
     *     max = 200,
     *      minMessage = "El RFC debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El RFC no debe tener mas de {{ limit }} caracteres")
     */
    private $RFC;
    /**
     * @var String  Domicilio Fiscal.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *      minMessage = "La direccion debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "La direccion no debe tener mas de {{ limit }} caracteres")
     */
    private $domicilio;
    /**
     * @var integer  Codigo postal.
     * @Assert\GreaterThanOrEqual(
     *      value=0,
     *      message = "El valor del codigo postal debe ser mayor o igual que {{ compared_value }}")
     */
    private $codigoPostal;
    /**
     * Constructor
     */
    public function __construct() {
        $this->razonSocial="";
        $this->RFC="";
        $this->domicilio="";
        $this->codigoPostal=0;
    }
    public function getRazonSocial(): String {
        return $this->razonSocial;
    }

    public function getRFC() {
        return $this->RFC;
    }

    public function getDomicilio(): String {
        return $this->domicilio;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    public function setRazonSocial(String $razonSocial) {
        $this->razonSocial = $razonSocial;
    }

    public function setRFC($RFC) {
        $this->RFC = $RFC;
    }

    public function setDomicilio(String $domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

}
