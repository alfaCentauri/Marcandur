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

namespace AppBundle\Controller;

use AppBundle\Entity\Marca;
use AppBundle\Entity\Invento;
use AppBundle\Entity\Contacto;
use AppBundle\Entity\Asesoria;
use AppBundle\Entity\Consulta;
use AppBundle\Form\Type\Asunto;
use AppBundle\Entity\DatosObra;
use AppBundle\Entity\Domicilio;
use AppBundle\Entity\DatosFactura;
use AppBundle\Entity\ReservaDerechos;
use AppBundle\Entity\MarcaInternacional;
use AppBundle\Form\Type\RegistroMarcaType;
use AppBundle\Form\Type\RegistroInventoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\Type\RegistroInternacionalType;
use AppBundle\Form\Type\RegistroDerechosAutorType;
use AppBundle\Form\Type\RegistroReservaDerechosType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
/**
 * Description of FormulariosController
 *
 * @author Ing. Ricardo Presilla
 * @version 1.0
 */
class FormulariosController extends Controller{
    /**
     * @var string Remitente del correo.
     */
    private $origen = 'contacto@marcandur.com.mx';
    /**
     * Destinatarios del correo.
     * @var array
     */
    private $destino = array('carlos.duran.1410@gmail.com','marcandur@marcandur.com','prueba2@marcandur.com');
    /**
     * Cuando los usuarios envíen el formulario donde integró reCAPTCHA,
     * obtendrá como parte de la carga una cadena con el nombre 
     * "g-recaptcha-response". Para verificar si Google ha verificado ese 
     * usuario. 
     * Se envía una solicitud POST con estos parámetros:
     * URL: https://www.google.com/recaptcha/api/siteverify
     * secrect (requerido) Provisto por google.
     * response (requerido) El valor de "g-recaptcha-response".
     * remoteip (opcional)
     */
    private function captchaverify($recaptcha){
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "secret"=>"6LdUT3YUAAAAAD-pjRsaapIj97MDSskd-sklvpr8",
            "response"=>$recaptcha));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
        return $data->success;
    }


    /**Enviar el correo de contacto, lo valida con un recaptcha de google. 
     * Regresa la petición del usuario a la página de contacto.
     * @param $request tipo Request
     */
    public function contactoAction(Request $request){
        $nueva = new Consulta();
        //Creando el formulario
        $formulario = $this->createFormBuilder($nueva)
                ->add('asunto', Asunto::class, array('label'=> 'Asunto', 
                    'attr' => array('class' => 'form-control', 'required' => true)))
                ->add('nombre', TextType::class, array('label'=> 'Nombre', 
                    'attr' => array('class' => 'form-control',  'placeholder' => 'Nombre: ', 'tooltip' => 'Escribe tu nombre')))
                ->add('telefono', TelType::class, array('label'=> 'Telefono fijo', 
                    'attr' => array('class' =>'form-control', 'required' => true, 'placeholder' => 'Teléfono (No celular):')))
                ->add('telefonoMovil', TelType::class, array('label'=> 'Telefono movil', 
                    'attr' => array('class' =>'form-control', 'required' => true, 'placeholder' => 'Celular o Nextel:')))
                ->add('correo', EmailType::class, array('label'=> 'Correo',
                    'attr' => array('class' => 'form-control', 'required' => true, 'placeholder' => 'Email:', 'tooltip' => 'Escribe tu correo electr&oacute;nico')))
                ->add('mensaje', TextareaType::class, array('label'=> 'Mensaje',
                    'attr' => array('class' => 'form-control', 'placeholder' => "Escribe aquí tus comentarios", 'maxlength' => "2000", 'tooltip' => 'Escribe tus comentarios', 'required'   => true)))
                ->add('Save', SubmitType::class, array('label'=> 'Enviar', 'attr' => array('class' => 'btn btn-primary btn-block text-center', "disabled"=>true)))
                ->getForm();
        //Manejar el formulario y la respuesta recaptcha.
        $formulario->handleRequest($request);
        //Comprueba si el formulario es enviado.
        if($formulario->isSubmitted()){
            $nueva =  $formulario->getData();
            //Activa el validador
            $validator = $this->get('validator');
            $errors = $validator->validate($nueva);
            if (count($errors) > 0) {//Si hay error, los colecta y envía a la plantilla
                foreach($errors as $error){
                    $this->addFlash('error', $error->getMessage() );
                }
                //Muestra la plantilla
                return $this->render('default/contacto2.html.twig', array(
                    'formulario' => $formulario->createView(),));
            }
            //Verifica si el formulario es valido
            if($formulario->isValid()){
                //Valida si el recaptcha fue seleccionado
                if($this->captchaverify($request->get('g-recaptcha-response'))){
                    $message = \Swift_Message::newInstance()
                        ->setSubject($nueva->getAsunto())
                        ->setFrom('contacto@marcandur.com.mx')
                        ->setTo($this->destino)
                        ->setBody(
                            $this->renderView('correos/mensaje.html.twig',
                                array('nombre' => $nueva->getNombre(),
                                    'correo' => $nueva->getCorreo(),
                                    'telefono' => $nueva->getTelefono(),
                                    'telefonoMovil' => $nueva->getTelefonoMovil(),
                                    'mensaje' => $nueva->getMensaje(),
                                    'asunto' => $nueva->getAsunto(),
                                ) ), 'text/plain');
                    $this->get('mailer')->send($message);
                    $this->get('session')->getFlashBag()->add(
                        'notificacion',
                        'Se ha enviado el mensaje.'
                    );
                return $this->render('default/contacto2.html.twig', array(
                    'formulario' => $formulario->createView(),));
                }
            }
        }
        else {
            return $this->render('default/contacto2.html.twig', array(
                'formulario' => $formulario->createView(),));
        }
    }         
    /***/
    public function solicitudReservaDerechos(Request $request){
        
        /**Reserva de derechos**/
        $reservaDerechos = new ReservaDerechos();
        $reservaDerechos->setOpcion($request->request->get('opcion','0'));
        switch ($reservaDerechos->getOpcion()){
            case '1':
                $reservaDerechos->setPublicacionPeriodica($request->request->get('publicacionPeriodica'));
                break;
            case '2':
                $reservaDerechos->setDifusionesPeriodicas($request->request->get('difusionesPeriodicas'));
                break;
            case '3':
                //Promocion publicitaria
                $reservaDerechos->setPublicacionPeriodica('');
                $reservaDerechos->setDifusionesPeriodicas('');
                $reservaDerechos->setGrupos('');
                $reservaDerechos->setPersonajes('');
                break;
            case '4':
                $reservaDerechos->setGrupos($request->request->get('grupos'));
                break;
            case '5':
                $reservaDerechos->setPersonajes($request->request->get('personajes'));
                break;
            default :
                $reservaDerechos->setPublicacionPeriodica('');
                $reservaDerechos->setDifusionesPeriodicas('');
                $reservaDerechos->setGrupos('');
                $reservaDerechos->setPersonajes('');
                break;
        }
    }

    /**
     * Enviar solicitud de Asesorias con el Instituto Mexicano de Patentes 
     * Industriales.
     * @param Request $request
     * @return type
     */
    public function solicitudAsesoriaAction(Request $request){
        $asunto = "Solicitud de Asesoría para el Instituto Mexicano de Patentes Industriales";
        $contacto = new Contacto();
        /** CONTACTO **/
        $contacto->setNombre($request->request->get("nombre",NULL));
        $contacto->setTelefono($request->request->get("telefono"));
        $contacto->setTelefonoMovil($request->request->get("telefonoMovil"));
        $contacto->setCorreo($request->request->get('email',NULL));
        /** Asesoria **/
        $asesoria = new Asesoria();
        $asesoria->setAsunto($request->request->get('asesoria',NULL));
        $asesoria->setDescripcion($request->request->get('comentarios',NULL));
        /** DOMICILIO **/
        $domicilio = new Domicilio();
        $domicilio->setCalle($request->request->get("calle",NULL));
        $domicilio->setMunicipio($request->request->get("municipio",NULL));
        $domicilio->setCiudad($request->request->get("ciudad",NULL));
        $domicilio->setEstado($request->request->get("estado",NULL));
        $domicilio->setPais($request->request->get("pais",NULL));
        $domicilio->setNumero($request->request->get("numero"));
        $domicilio->setCodigoPostal($request->request->get("codigoPostal"));
        /** OTROS DATOS DE CONTACTO */
        $contacto->setTelefonoDomicilio($request->request->get("telefonoDomicilio"));
        $contacto->setTelefonoOficina($request->request->get("telefonoOficina"));
        $contacto->setTelefonoMovil2($request->request->get("telefonoMovil2"));
        $contacto->setFax($request->request->get("fax"));
        $contacto->setCorreo2($request->request->get("email2", NULL));
        /** DATOS DE FACTURACION */
        $facturacion = new DatosFactura();
        $facturacion->setCodigoPostal($request->request->get("codigoPostalFac"));
        $facturacion->setDomicilio($request->request->get("domicilioFiscal"));
        $facturacion->setRazonSocial($request->request->get("razonSocial"));
        $facturacion->setRFC($request->request->get("RFC2"));
        if ($contacto->getNombre()!=NULL) {
            $message = \Swift_Message::newInstance()
                ->setSubject($asunto)
                ->setFrom('contacto@marcandur.com.mx')
                ->setTo($this->destino)
                ->setBody(
                    $this->render('correos/mensaje6.html.twig',
                        array('contacto' => $contacto,
                              'asesoria' => $asesoria,
                              'domicilio' => $domicilio,
                              'facturacion' => $facturacion,
                            )), 'text/html');
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add(
            'notificacion',
            'Se ha enviado la solicitud.'
            );
        }
        return $this->render('formularios/asesoria1.html.twig', array( ));                      
    }
    /**
     * Formulario de marcas internacionales.
     * 
     * @param Request $request
     * @return  Response Regresa al formulario de solicitud de registro de 
     * marcas internacionales.
     */
    public function solicitudRegistroInternacionalAction(Request $request){
        $asunto = "Solicitud de Registro de Marca Internacional";
        $registroMarcaInternacional = new MarcaInternacional();
        $formulario = $this->createForm(RegistroInternacionalType::class, $registroMarcaInternacional);
        //Manejar el formulario y la respuesta recaptcha.
        $formulario->handleRequest($request);
        //Comprueba si el formulario es enviado.
        if($formulario->isSubmitted() && $formulario->isValid()){
            $registroMarcaInternacional =  $formulario->getData();
            $mensaje = \Swift_Message::newInstance()
                    ->setSubject($asunto)
                    ->setFrom($this->origen)
                    ->setTo($this->destino)
                    ->setBody(
                        $this->renderView('correos/registroInternacional.html.twig',
                            array('marcaInternacional' => $registroMarcaInternacional,
                            ) ), 'text/plain');
            $this->get('mailer')->send($mensaje);
            $this->get('session')->getFlashBag()->add(
                'notificacion',
                'Se ha enviado el mensaje.'
            );
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'error',
                'Error: El mensaje no pudo ser enviado.'
            );
        }
        return $this->render('formularios/registroMarcaInternacional.html.twig', array(
                'formulario' => $formulario->createView(),
            ));
    }
    /**
     * Formulario de registro de marcas.
     * 
     * @param Request $request
     * @return  Response Regresa al formulario de solicitud de registro de 
     * marcas.
     */
    public function solicitudRegistroMarcasAction(Request $request){
        $asunto = 'Solicitud de registro de Marcas';
        $registroMarca = new Marca();
        $formulario = $this->createForm(RegistroMarcaType::class, $registroMarca);
        $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()){
            $registroMarca =  $formulario->getData();
            $mensaje = \Swift_Message::newInstance()
                    ->setSubject($asunto)
                    ->setFrom($this->origen)
                    ->setTo($this->destino)
                    ->setBody(
                        $this->renderView('correos/registroMarcas.html.twig',
                            array('marca' => $registroMarca,
                            ) ), 'text/plain');
            $this->get('mailer')->send($mensaje);
            $this->get('session')->getFlashBag()->add(
                'notificacion',
                'Se ha enviado el mensaje.'
            );
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'error',
                'Error: El mensaje no pudo ser enviado.'
            ); 
        }
        return $this->render('formularios/marcas.html.twig', array(
                'formulario' => $formulario->createView(),
            ));
    }
    /**
     * Formulario de solicitud de registro de Invenciones.
     * 
     * @param Request $request
     * @return  Response Regresa al formulario de solicitud de registro de 
     * invenciones.
     */
    public function solicitudRegistroInvencionAction(Request $request){
        $asunto = "Solicitud de Registro de Invenciones";
        $invento = new Invento();
        $formulario = $this->createForm(RegistroInventoType::class, $invento);
        $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()){
            $invento =  $formulario->getData();
            $mensaje = \Swift_Message::newInstance()
                    ->setSubject($asunto)
                    ->setFrom($this->origen)
                    ->setTo($this->destino)
                    ->setBody(
                        $this->renderView('correos/registroInvenciones.html.twig',
                            array('invento' => $invento,
                            ) ), 'text/plain');
            $this->get('mailer')->send($mensaje);
            $this->get('session')->getFlashBag()->add(
                'notificacion',
                'Se ha enviado el mensaje.'
            );
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'error',
                'Error: El mensaje no pudo ser enviado.'
            );
        }    
        return $this->render('formularios/invenciones.html.twig', array(
                'formulario' => $formulario->createView(),
            ));
    }
    /**
     * Formulario de solicitud de registro de derechos de autor.
     * 
     * @param Request $request
     * @return  Response Regresa al formulario de solicitud de derechos de autor.
     */
    public function solicitudRegistroDerechosAutorAction(Request $request){
        $asunto = "Solicitud de registro de Derechos de Autor";
        $derechosAutor = new DatosObra();
        $formulario = $this->createForm(RegistroDerechosAutorType::class, $derechosAutor);
        $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()){
            $derechosAutor =  $formulario->getData();
            //Obtiene el arreglo de colaboradores
            $arregloColaboradores = $derechosAutor->getListaColaboradores();
            //Separa el arreglo por el caracter |
//            $colaboradores= explode("|",$arregloColaboradores);
//            $n= sizeof($colaboradores);
//            for($i=0; $i<$n; $i++){
//                $datosColaborador=explode(";",$colaboradores[$i]);
//                $tamanio=sizeof($datosColaborador[$i]);
//                if($tamanio==6){
//                    var_dump($datosColaborador);
//                    $colaborador = new Colaborador();
//                    $colaborador->setNombre($datosColaborador[0]);
//                    $colaborador->setFechaNacimiento($datosColaborador[1]);
//                    $colaborador->setLugarNacimiento($datosColaborador[2]);
//                    $colaborador->setNacionalidad($datosColaborador[3]);
//                    $colaborador->setRFC($datosColaborador[4]);
//                    $colaborador->setPorcentaje($datosColaborador[5]);
//                    $derechosAutor->addColaboradores($colaborador);
//                }
//            }
            //
            $lista=str_replace ("|","\nCoautor:\n",$arregloColaboradores);
            $derechosAutor->setListaColaboradores(str_replace (";","\n",$lista));
            $mensaje = \Swift_Message::newInstance()
                    ->setSubject($asunto)
                    ->setFrom($this->origen)
                    ->setTo($this->destino)
                    ->setBody(
                        $this->renderView('correos/registroDerechosAutor.html.twig',
                            array('derechosAutor' => $derechosAutor,
                            ) ), 'text/plain');
            $this->get('mailer')->send($mensaje);
            $this->get('session')->getFlashBag()->add(
                'notificacion',
                'Se ha enviado el mensaje.'
            );
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'error',
                'Error: El mensaje no pudo ser enviado.'
            );
        }    
        return $this->render('formularios/derechosAutor.html.twig', array(
                'formulario' => $formulario->createView(),
            ));
    }
    /**
     * Formulario de solicitud de registro de reserva de derechos.
     * 
     * @param Request $request
     * @return  Response Regresa al formulario de solicitud de derechos de autor.
     */
    public function solicitudRegistroReservaDerechosAction(Request $request){
        $asunto = "Solicitud de Reserva de Derechos";
        $reservaDerechos = new ReservaDerechos();
        $formulario = $this->createForm(RegistroReservaDerechosType::class, $reservaDerechos);
        $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()){
            $reservaDerechos =  $formulario->getData();
            //Obtiene el arreglo de colaboradores
            $arregloColaboradores = $reservaDerechos->getListaColaboradores();
            $lista=str_replace ("|","\nCoautor:\n",$arregloColaboradores);
            $reservaDerechos->setListaColaboradores(str_replace (";","\n",$lista));
            $mensaje = \Swift_Message::newInstance()
                    ->setSubject($asunto)
                    ->setFrom($this->origen)
                    ->setTo($this->destino)
                    ->setBody(
                        $this->renderView('correos/registroReservaDerechos.html.twig',
                            array('reservaDerechos' => $reservaDerechos,
                            ) ), 'text/plain');
            $this->get('mailer')->send($mensaje);
            $this->get('session')->getFlashBag()->add(
                'notificacion',
                'Se ha enviado el mensaje.'
            );
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'error',
                'Error: El mensaje no pudo ser enviado.'
            );
        }    
        return $this->render('formularios/reservaDerechos.html.twig', array(
                'formulario' => $formulario->createView(),
            ));
    }
}
