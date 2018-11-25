<?php
// src/EventListener/ExceptionListener.php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HtppExceptionInterface;

class ExceptionListener {
    public function onKernelException(GetResponseExceptionEvent $event) {
        
        // Obtienes el objeto exception del evento recibido
        $exception = $event->getException();
        $message = sprintf('Mi error dice %s en el código: %s',
            $exception->getMessage(),
            $exception->getCode()
        );
        
        // Modifica tu response object para mostrar los detalles de excepción
        $response = new Response();
        $response->setContent($message);
        
        // HttpExceptionInterface es un tipo de especia lde excepción
        // que mantiene los detalles de header y código de estado
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($excpetion->getStatusCode());
            $response->headers->replace($excpetion->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        // Enviar el objeto Response modificado al evento
        $event->setResponse($response);
    }
}