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
 * Description of Contact
 *
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class Contact {
    /**
     * Nombre del contacto. Validación para evitar vacios.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =2,
     *     max=200,
     *      minMessage = "El nombre debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El nombre no debe tener mas de {{ limit }} caracteres")
     */
    private $nombre;
    /**
     * Email del contacto.
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "El correo electrónico '{{ value }}' no es valido.",
     *     checkMX = true)
     */
    private $correo;
    /**
     * Telefono fijo.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =5,
     *     max=20,
     *      minMessage = "El número de teléfono debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El número de teléfono no debe tener mas de {{ limit }} caracteres")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Debe escribir un número de teléfono valido.")
     */
    private $telefono;
    /**
     * Telefono Movil.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =5,
     *     max=20,
     *      minMessage = "El número de teléfono móvil debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El número de teléfono móvil no debe tener mas de {{ limit }} caracteres")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Debe escribir un número de teléfono valido, para el campo teléfono móvil.")
     */
    private $telefonoMovil;
    /**
     * constructor
     */
    public function __construct() {
        $this->nombre="";
        $this->correo="";
        $this->telefono=0;
        $this->telefonoMovil=0;
    }
    /**
     * Getters y Setters
     */    
    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getTelefonoMovil() {
        return $this->telefonoMovil;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setTelefonoMovil($telefonoMovil) {
        $this->telefonoMovil = $telefonoMovil;
    }

}
