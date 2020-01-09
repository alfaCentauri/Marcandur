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
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of ReservaDerechos
 *
 * @author Ing. Ricardo Presilla
 * @version 1.0
 */
class ReservaDerechos {
    /**
     * Valor de la opción
     * @var String Cadena.
     * @Assert\NotBlank()
     */
    private $opcion;
    /**
     * Cadena para la publicacion Periódica.
     * @var String Cadena.
     * @Assert\NotBlank()
     */
    private $publicacionPeriodica;
    /**
     * Cadena para la difusión periódica
     * @var String Cadena.
     * @Assert\NotBlank()
     */
    private $difusionesPeriodicas;
    /**
     * Cadena para los grupos
     * @var String Cadena.
     * @Assert\NotBlank()
     */
    private $grupos;
    /**
     * Cadena para los personajes
     * @var String Cadena.
     * @Assert\NotBlank()
     */
    private $personajes;
    /**
     * @var Contact
     */
    private $contacto;
    /**
     * Esta es una colección de objetos. Colección de Datos del colaborador(es) de la obra.
     * @var Colaborador Arreglo de colaboradores.
     */
    private $colaboradores;
    /**
     * Datos del domicilio.
     * @var Domicilio Datos del domicilio.
     */
    private $domicilio;
    /**
     * Datos para otros contactos.
     * @var OtrosContactos Datos para otros contactos.
     */
    private $otrosContactos;
    /**
     * Datos de para la factura.
     * @var DatosFactura 
     */
    private $factura;
    /**
     * String con el listado de colaboradores.
     * @var String Cadena oculta.
     */
    private $listaColaboradores;
    /**
     * Constructor
     */
    public function __construct() {
        $this->opcion=1;
        $this->publicacionPeriodica="";
        $this->grupos="";
        $this->personajes="";
        $this->difusionesPeriodicas="";
        $this->contacto = new Contact();
        $this->colaboradores = new ArrayCollection();
        $this->domicilio = new Domicilio();
        $this->otrosContactos = new OtrosContactos();
        $this->factura = new DatosFactura();
        $this->listaColaboradores="";
    }
    
    public function getOpcion() {
        return $this->opcion;
    }

    public function getPublicacionPeriodica(): String {
        return $this->publicacionPeriodica;
    }

    public function getDifusionesPeriodicas(): String {
        return $this->difusionesPeriodicas;
    }

    public function getGrupos(): String {
        return $this->grupos;
    }

    public function getPersonajes(): String {
        return $this->personajes;
    }

    public function getContacto(): Contact {
        return $this->contacto;
    }
    /**
     * Get Colaboradores
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColaboradores() {
        return $this->colaboradores;
    }
    /**
     * 
     * @param \AppBundle\Entity\Colaborador $colaboradores
     * @return $this
     */
    public function addColaboradores(\AppBundle\Entity\Colaborador $colaborador) {
        $this->colaboradores[] = $colaborador;
        return $this;
    }
    /**
     * Remove
     * @param \AppBundle\Entity\Colaborador $colaborador Contiene el colaborador a remover.
     **/
    public function removeColaboradores(\AppBundle\Entity\Colaborador $colaborador) {
        $this->colaboradores->removeElement($colaborador);
    }

    public function getDomicilio(): Domicilio {
        return $this->domicilio;
    }

    public function getOtrosContactos(): OtrosContactos {
        return $this->otrosContactos;
    }

    public function getFactura(): DatosFactura {
        return $this->factura;
    }

    public function getListaColaboradores(): String {
        return $this->listaColaboradores;
    }

    public function setOpcion($opcion) {
        $this->opcion = $opcion;
    }

    public function setPublicacionPeriodica(String $publicacionPeriodica=" ") {
        $this->publicacionPeriodica = $publicacionPeriodica;
    }

    public function setDifusionesPeriodicas(String $difusionesPeriodicas=" ") {
        $this->difusionesPeriodicas = $difusionesPeriodicas;
    }

    public function setGrupos(String $grupos=" ") {
        $this->grupos = $grupos;
    }

    public function setPersonajes(String $personajes=" ") {
        $this->personajes = $personajes;
    }

    public function setContacto(Contact $contacto) {
        $this->contacto = $contacto;
    }

    public function setDomicilio(Domicilio $domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setOtrosContactos(OtrosContactos $otrosContactos) {
        $this->otrosContactos = $otrosContactos;
    }

    public function setFactura(DatosFactura $factura) {
        $this->factura = $factura;
    }

    public function setListaColaboradores(String $listaColaboradores) {
        $this->listaColaboradores = $listaColaboradores;
    }

}
