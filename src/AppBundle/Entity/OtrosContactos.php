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

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * Description of OtrosContactos
 *
 * @package AppBundle\Entity
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class OtrosContactos {
    /**
     * Email del contacto secundario.
     * @Assert\Email(
     *     message = "El correo electrónico '{{ value }}' no es valido.",
     *     checkMX = true)
     */
    private $correo;
    /**
     * Telefono del domicilio.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =5,
     *     max=20,
     *      minMessage = "El número de teléfono del domicilio debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El número de teléfono del domicilio no debe tener mas de {{ limit }} caracteres")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Debe escribir un número de teléfono valido, para el campo teléfono del domicilio.")
     */
    private $telefonoDomicilio;
    /**
     * Telefono de la oficina.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =5,
     *     max=20,
     *      minMessage = "El número de teléfono de la oficina debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El número de teléfono de la oficina no debe tener mas de {{ limit }} caracteres")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Debe escribir un número de teléfono valido, para el campo teléfono de la oficina.")
     */
    private $telefonoOficina;
    /**
     * Telefono Movil 2.
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Debe escribir un número de teléfono valido, para el campo teléfono móvil.")
     */
    private $telefonoMovil;
    /**Fax.
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Debe escribir un número de teléfono valido, para el campo teléfono fax.")
     */
    private $fax;
    /**
     * Constructor
     */
    public function __construct() {
        $this->correo = "";
        $this->telefonoDomicilio = 0;
        $this->telefonoMovil = 0;
        $this->telefonoOficina = 0;
        $this->fax = 0;
    }
    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefonoDomicilio() {
        return $this->telefonoDomicilio;
    }

    public function getTelefonoOficina() {
        return $this->telefonoOficina;
    }

    public function getTelefonoMovil() {
        return $this->telefonoMovil;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setTelefonoDomicilio($telefonoDomicilio) {
        $this->telefonoDomicilio = $telefonoDomicilio;
    }

    public function setTelefonoOficina($telefonoOficina) {
        $this->telefonoOficina = $telefonoOficina;
    }

    public function setTelefonoMovil($telefonoMovil) {
        $this->telefonoMovil = $telefonoMovil;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

}
