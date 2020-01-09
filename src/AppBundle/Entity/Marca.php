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
 * Clase para almacenar y manipular los datos del registro de Marcas.
 *
 * @package AppBundle\Entity
 * @author Ingeniero en computación: Ricardo Presilla.
 * @version 2.0.
 */
class Marca {
    /**
     * Nombre de la marca.
     * @var String Nombre de la marca.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre no debe tener más de {{ limit }} caracteres")
     */
    private $nombre;
    /**
     * Booleano para indicar si tiene logotipo.
     * @var mixed
     */
    private $tieneLogotipo;
    /**
     * Nombre de los productos.
     * @var String Productos de la marca.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre de los productos debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre de los productos no debe tener más de {{ limit }} caracteres")
     */
    private $productos;
    /**
     * Booleano para indicar si se ha utilizado.
     * @var mixed
     */
    private $utilizado;
    /**
     * Fecha en la cual se usó.
     */
    private $fecha;
    /**
     * Comentarios.
     * @var String
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 2000,
     *     minMessage = "Los comentarios deben ser mínimo de {{ limit }} caracteres de largo",
     *     maxMessage = "Los comentarios no debe tener más de {{ limit }} caracteres")
     */
    private $comentarios;  
    /**
     * @var Contact
     */
    private $contacto; 
    /**
     * Nombre del titular de la marca.
     * @var String Nombre del titular de la marca.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre del titular debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre del titular no debe tener más de {{ limit }} caracteres")
     */
    private $nombreTitular;
    /**
     * Nombre del representante legal.
     * @var String Nombre del representante legal de la marca.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "El nombre del representante debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre del representante no debe tener más de {{ limit }} caracteres")
     */
    private $nombreRepresentante;
    /**
     * Naionalidad del titular.
     * @var String Nacionalidad del titular de la marca.
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage = "La Nacionalidad del titular debe ser mínimo {{ limit }} caracteres de largo",
     *     maxMessage = "La Nacionalidad del titular no debe tener más de {{ limit }} caracteres")
     */
    private $nacionalidad;
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
     * Constructor
     **/
    function __construct() {
        $this->contacto = new Contact();
        $this->nombre = "";
        $this->productos = "";
        $this->tieneLogotipo = true;
        $this->utilizado = true;
        $this->comentarios = "";
        $this->nombreTitular = "";
        $this->nombreRepresentante = "";
        $this->nacionalidad = "";
        $this->domicilio = new Domicilio();
        $this->otrosContactos = new OtrosContactos();
        $this->factura = new DatosFactura();
    }
    
    public function getNombre(): String {
        return $this->nombre;
    }

    public function getTieneLogotipo() {
        return $this->tieneLogotipo;
    }

    public function getProductos(): String {
        return $this->productos;
    }

    public function getUtilizado() {
        return $this->utilizado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getComentarios(): String {
        return $this->comentarios;
    }

    public function getContacto(): Contact {
        return $this->contacto;
    }

    public function setNombre(String $nombre) {
        $this->nombre = $nombre;
    }

    public function setTieneLogotipo($tieneLogotipo) {
        $this->tieneLogotipo = $tieneLogotipo;
    }

    public function setProductos(String $productos) {
        $this->productos = $productos;
    }

    public function setUtilizado($utilizado) {
        $this->utilizado = $utilizado;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setComentarios(String $comentarios) {
        $this->comentarios = $comentarios;
    }

    public function setContacto(Contact $contacto) {
        $this->contacto = $contacto;
    }
    public function getNombreTitular(): String {
        return $this->nombreTitular;
    }

    public function getNombreRepresentante(): String {
        return $this->nombreRepresentante;
    }

    public function getNacionalidad(): String {
        return $this->nacionalidad;
    }

    public function setNombreTitular(String $nombreTitular) {
        $this->nombreTitular = $nombreTitular;
    }

    public function setNombreRepresentante(String $nombreRepresentante) {
        $this->nombreRepresentante = $nombreRepresentante;
    }

    public function setNacionalidad(String $nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }
    
    public function getDomicilio(): Domicilio {
        return $this->domicilio;
    }

    public function setDomicilio(Domicilio $domicilio) {
        $this->domicilio = $domicilio;
    }
    
    public function getOtrosContactos(): OtrosContactos {
        return $this->otrosContactos;
    }

    public function setOtrosContactos(OtrosContactos $otrosContactos) {
        $this->otrosContactos = $otrosContactos;
    }
    
    public function getFactura(): DatosFactura {
        return $this->factura;
    }

    public function setFactura(DatosFactura $factura) {
        $this->factura = $factura;
    }

}
