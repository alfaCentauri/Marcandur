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
 * Description of DatosObra
 *
 * @package AppBundle\Entity
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 2.0.
 */
class DatosObra {
    /**
     * Titulo de la obra.
     * @var String Titulo de la obra.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El titulo debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El titulo no debe tener más de {{ limit }} caracteres")
     */
    private $titulo;
    /**
     * @var String Resumen de la obra
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 2000,
     *     minMessage = "El resumen debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El resumen no debe tener más de {{ limit }} caracteres")
     */
    private $sintesis;
    /**
     * @var String  Indica la rama a la que pertenece la obra.
     * @Assert\NotBlank()
     */
    private $rama;
    /**
     * Booleano indica si se dio ha conocer
     * @var mixed
     */
    private $dadaAConocer;
    /**
     * Date, indica la fecha en la que se dio a conocer.
     * @var mixed
     * @Assert\Date()
     */
    private $fecha;
    /**
     * Booleano, indica si surge de otra obra.
     * @var mixed
     */
    private $derivada;
    /**
     * Especifica el titulo de la obra del cual se deriva. Puede contener nulo.
     * @var String  Especifica de qué obra se deriva.
     */
    private $tituloOriginal;
    /**
     * @var String  Nombre del autor del cual se deriva la obra nueva.
     */
    private $autor;
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
     * Titular de la obra.
     * @var String Titular de la obra.
     **/
    private $titular;
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
     **/
    public function __construct() {
        $this->autor = "";
        $this->dadaAConocer = false;
        $this->derivada = false;
        $this->rama = "";
        $this->sintesis = "";
        $this->titulo = "";
        $this->tituloOriginal = "";
        $this->titular = "";
        $this->contacto = new Contact();
        $this->colaboradores = new ArrayCollection();
        $this->domicilio = new Domicilio();
        $this->otrosContactos = new OtrosContactos();
        $this->factura = new DatosFactura();
        $this->listaColaboradores="";
    }
    /**Getters y Setters**/
    public function getTitulo(): String {
        return $this->titulo;
    }

    public function getSintesis(): String {
        return $this->sintesis;
    }

    public function getRama(): String {
        return $this->rama;
    }

    public function getDadaAConocer() {
        return $this->dadaAConocer;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getDerivada() {
        return $this->derivada;
    }

    public function getTituloOriginal(): String {
        return $this->tituloOriginal;
    }

    public function getAutor(): String {
        return $this->autor;
    }

    public function getContacto(): Contact {
        return $this->contacto;
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

    public function setTitulo(String $titulo) {
        $this->titulo = $titulo;
    }

    public function setSintesis(String $sintesis) {
        $this->sintesis = $sintesis;
    }

    public function setRama(String $rama) {
        $this->rama = $rama;
    }

    public function setDadaAConocer($dadaAConocer) {
        $this->dadaAConocer = $dadaAConocer;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setDerivada($derivada) {
        $this->derivada = $derivada;
    }

    public function setTituloOriginal(String $tituloOriginal=NULL) {
        $this->tituloOriginal = $tituloOriginal;
    }

    public function setAutor(String $autor=NULL) {
        $this->autor = $autor;
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
    
    public function getTitular(): String {
        return $this->titular;
    }

    public function setTitular(String $titular) {
        $this->titular = $titular;
    }
    
    public function getListaColaboradores(): String {
        return $this->listaColaboradores;
    }

    public function setListaColaboradores(String $listaColaboradores) {
        $this->listaColaboradores = $listaColaboradores;
    }
    
}
