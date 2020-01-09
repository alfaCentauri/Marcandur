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
 * Description of MarcaInternacional
 *
 * @package AppBundle\Entity
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.0.
 */
class MarcaInternacional {
    /**
     * Nombre
     * @var String Nombre de la marca.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre no debe tener mas de {{ limit }} caracteres")
     */
    private $nombre;
    /**
     * Pais para registrar la marca.
     * @var String nombre del país.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre del país debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre del país no debe tener mas de {{ limit }} caracteres")
     */
    private $pais;
    /**
     * Comentarios.
     * @var String
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 2000,
     *     minMessage = "Los comentarios deben ser mínimo de {{ limit }} caracteres de largo",
     *     maxMessage = "Los comentarios no debe tener mas de {{ limit }} caracteres")
     */
    private $comentarios;
    /**
     * Booleano para indicar si tiene logotipo.
     * @var mixed
     */
    private $tieneLogotipo;
    /**
     * Booleano para indicar si tiene registro en México.
     * @var mixed
     */
    private $registraAnterior;
    /**
     * @var Contact
     */
    private $contacto; 
    /**Constructor**/
    function __construct() {
        $this->nombre = "";
        $this->pais = "";
        $this->tieneLogotipo = true;
        $this->registraAnterior = true;
        $this->comentarios = "";
        $this->contacto = new Contact();
    }
    
    public function getNombre(): String {
        return $this->nombre;
    }

    public function getPais(): String {
        return $this->pais;
    }

    public function getComentarios(): String {
        return $this->comentarios;
    }

    public function getTieneLogotipo() {
        return $this->tieneLogotipo;
    }

    public function getRegistraAnterior() {
        return $this->registraAnterior;
    }

    public function getContacto(): Contact {
        return $this->contacto;
    }

    public function setNombre(String $nombre) {
        $this->nombre = $nombre;
    }

    public function setPais(String $pais) {
        $this->pais = $pais;
    }

    public function setComentarios(String $comentarios) {
        $this->comentarios = $comentarios;
    }

    public function setTieneLogotipo($tieneLogotipo) {
        $this->tieneLogotipo = $tieneLogotipo;
    }

    public function setRegistraAnterior($registraAnterior) {
        $this->registraAnterior = $registraAnterior;
    }

    public function setContacto(Contact $contacto) {
        $this->contacto = $contacto;
    }

}
