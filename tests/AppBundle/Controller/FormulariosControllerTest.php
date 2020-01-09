<?php

/*
 * Copyright (C) 2019 Ingeniero en Computación: Ricardo Presilla
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

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
/**
 * Description of FormulariosControllerTest
 *
 * @author Ing. Ricardo Presilla
 * @version 1.0
 */
class FormulariosControllerTest extends WebTestCase {
    /**
     * @var array
     */
    private $destino = array('carlos.duran.1410@gmail.com','marcandur@marcandur.com','prueba2@marcandur.com');
    /**
     * Prueba del envío del formulario de contacto.
     **/
    public function testContacto(Request $request){
        $client = static::createClient();
        /*Habilita el generador de perfiles para la siguiente solicitud (no hace 
         * nada si el generador de perfiles no está disponible)*/
        $client->enableProfiler();
        $crawler = $client->request('POST', '/Contacto.html');
        $mailCollector = $client->getProfile()->getCollector('swiftmailer');
        // checks that an email was sent
        $this->assertSame(1, $mailCollector->getMessageCount());
        $collectedMessages = $mailCollector->getMessages();
        $message = $collectedMessages[0];
        // Asserting email data
        $this->assertInstanceOf('Swift_Message', $message);
        $this->assertSame('Derechos de Autor', $message->getSubject());
        $this->assertSame('contacto@marcandur.com.mx', key($message->getFrom()));
        $this->assertSame($destino, key($message->getTo()));
        $this->assertContains(
            'Prueba',
            $message->getBody()
        );
    }
}
