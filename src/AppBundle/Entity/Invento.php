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
 * Description of Invento
 *
 * @package AppBundle\Entity
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 1.1.
 */
class Invento {
    /**
     * @var String Tipo de invención
     * @Assert\NotBlank()
     */
    private $tipoInvento;
    /**
     * @var String Describe el invento.
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 2000,
     *     minMessage = "La sintesis debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "La sintesis no debe tener más de {{ limit }} caracteres")
     */
    private $sintesis;
    /**
     * @var Contact
     */
    private $contacto;
    /**
     * Constructor.
     */
    public function __construct() {
        $this->tipoInvento = "";
        $this->sintesis = "";
        $this->contacto = new Contact();
    }
    
    public function getTipoInvento(): String {
        return $this->tipoInvento;
    }

    public function getSintesis(): String {
        return $this->sintesis;
    }

    public function setTipoInvento(String $tipoInvento) {
        $this->tipoInvento = $tipoInvento;
    }

    public function setSintesis(String $sintesis) {
        $this->sintesis = $sintesis;
    }
    
    public function getContacto(): Contact {
        return $this->contacto;
    }

    public function setContacto(Contact $contacto) {
        $this->contacto = $contacto;
    }

}
