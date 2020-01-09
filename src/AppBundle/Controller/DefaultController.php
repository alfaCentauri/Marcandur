<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Controlador Principal.
 * @author Ing. Ricardo Presilla
 * @version 1.0
 */
class DefaultController extends Controller{
    /**Home*/
    public function indexAction(Request $request){
        return $this->render('default/index.html.twig', array( ));
    }
    /**Nosostros*/
    public function nosotrosAction(Request $request){
        return $this->render('default/nosotros.html.twig', array( ));
    }
    /**Contacto*/
    public function contactoAction(Request $request){
        return $this->render('default/contacto.html.twig', array(
            'band'=> false,
            ));
    }
    
    /**Servicios en general*/
    public function serviciosAction(Request $request){
        return $this->render('servicios/Servicios.html.twig', array( ));
    }
    /**Servicios de Derechos de Autor*/
    public function serviciosDerechosAutorAction(Request $request){
        return $this->render('servicios/ServiciosDerechosAutor.html.twig', array( ));
    }
    /**Fase 1 de Servicios de Derechos de Autor*/
    public function fase1ServiciosDerechosAutorAction(Request $request){
        return $this->render('servicios/ServiciosDerechoAutorFase1.html.twig', array( ));
    }
    /**Fase 2 de Servicios de Derechos de Autor*/
    public function fase2ServiciosDerechosAutorAction(Request $request){
        return $this->render('servicios/ServiciosDerechoAutorFase2.html.twig', array( ));
    }
    /**Fase 3 de Servicios de Derechos de Autor*/
    public function fase3ServiciosDerechosAutorAction(Request $request){
        return $this->render('servicios/ServiciosDerechoAutorFase3.html.twig', array( ));
    }
    /**Servicios de marcas*/
    public function serviciosMarcasAction(Request $request){
        return $this->render('servicios/ServiciosMarcas.html.twig', array( ));
    }
    /**Fase 1: Servicios de marcas*/
    public function serviciosMarcasFase1Action(Request $request){
        return $this->render('servicios/ServiciosMarcasFase1.html.twig', array( ));
    }
    /**Fase 2: Servicios de marcas*/
    public function serviciosMarcasFase2Action(Request $request){
        return $this->render('servicios/ServiciosMarcasFase2.html.twig', array( ));
    }
    /**Fase 3: Servicios de marcas*/
    public function serviciosMarcasFase3Action(Request $request){
        return $this->render('servicios/ServiciosMarcasFase3.html.twig', array( ));
    }
    /**Servicios de marcas internacionales*/
    public function serviciosMarcasInternacionalesAction(Request $request){
        return $this->render('servicios/ServiciosMarcasInternacionales.html.twig', array( ));
    }
    /**Servicios de Invenciones*/
    public function serviciosInvencionesAction(Request $request){
        return $this->render('servicios/ServiciosRegistroInvenciones.html.twig', array( ));
    }
    /**Servicios de Reserva de Derechos*/
    public function serviciosReservaDerechosAction(Request $request){
        return $this->render('servicios/ServiciosReservasDerechos.html.twig', array( ));
    }
    /** Fase1: Servicios de Reserva de Derechos*/
    public function serviciosReservaDerechosFase1Action(Request $request){
        return $this->render('servicios/ServiciosReservasDerechosFase1.html.twig', array( ));
    }
    /** Fase2: Servicios de Reserva de Derechos*/
    public function serviciosReservaDerechosFase2Action(Request $request){
        return $this->render('servicios/ServiciosReservasDerechosFase2.html.twig', array( ));
    }
    /** Fase3: Servicios de Reserva de Derechos*/
    public function serviciosReservaDerechosFase3Action(Request $request){
        return $this->render('servicios/ServiciosReservasDerechosFase3.html.twig', array( ));
    }
    /**Preguntas frecuentes de Invenciones*/
    public function preguntasFrecuentesInvencionesAction(Request $request){
        return $this->render('preguntas/invenciones.html.twig', array( ));
    }
    /**Preguntas frecuentes de Marcas*/
    public function preguntasFrecuentesMarcasAction(Request $request){
        return $this->render('preguntas/marcas.html.twig', array( ));
    }
    /**Garantia de servicios*/
    public function garantiaAction(Request $request){
        return $this->render('conoce/GarantiaServicios.html.twig', array( ));
    }
    /**Formulario para la solicutd de reserva de derechos*/
    public function solicitudReservaDerechosAction(Request $request){
        return $this->render('formularios/reservaDerechos.html.twig', array( ));
    }
    /**Glosario de términos Legales*/
    public function glosarioAction(Request $request){
        return $this->render('default/glosario.html.twig', array( ));
    }
    /** Asesorias con el IMPI. */
    public function serviciosAsesoriaAction(Request $request){
        return $this->render('servicios/IMPI.html.twig', array( ));
    }
    /**Formulario para solicitar asesoria legal*/
    public function solicitudAsesoriaAction(Request $request){
        return $this->render('formularios/asesoria1.html.twig', array( ));
    }
    /** Asesorias con el IMPI. */
    public function solicitudAsesoriaTramiteAction(Request $request){
        return $this->render('formularios/asesoria1.html.twig', array( ));
    }
    /**Asesoria legal texto*/
    public function serviciosAsesoriaLegalAction(Request $request){
        return $this->render('servicios/asesoriaLegal.html.twig', array( ));
    }
    /**Listado de precios*/
    public function preciosAction(Request $request){
        return $this->render('default/precios.html.twig', array( ));
    }
}
