<?php

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


namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entidad para la consulta de información por correo electrónico.
 *
 * @author Ing. Ricardo Presilla
 * @version 1.0
 */
class Consulta {
    /**
     * Nombre del contacto. Validación para evitar vacios.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =2,
     *     max=200,
     *      minMessage = "El nombre debe ser minimo {{ limit }} caracteres de largo",
     *      maxMessage = "El nombre no debe tener mas de {{ limit }} caracteres")
     */
    private $nombre = "";

    /**
     * Email del contacto.
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "El correo electrónico '{{ value }}' no es valido.",
     *     checkMX = true)
     */
    private $correo = "";
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
     * Mensaje ó consulta.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min =10,
     *     max=200,
     *      minMessage = "El mensaje debe ser mínimo {{ limit }} caracteres de largo",
     *      maxMessage = "El mensaje no debe tener mas de {{ limit }} caracteres")
     */
    private $mensaje = "";

    /**
     * Asunto del correo.
     * @Assert\NotBlank()
     */
    private $asunto = "";

    /**Constructor vacio.*/
    function __construct(){ }
    /*********** Getters ****************************************************/
    function getNombre() {
        return $this->nombre;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getTelefonoMovil() {
        return $this->telefonoMovil;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    /******************** setters ******************************************/
    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setTelefonoMovil($telefonoMovil) {
        $this->telefonoMovil = $telefonoMovil;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }
}
