<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 2/2/2018
 * Time: 8:01 PM
 */

namespace Dry\Core\Exception;



use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;


class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {

        $exc = $event->getException();

        echo "died";
        exit;
        // You get the exception object from the received event
        $exception = $event->getException();
        $message = sprintf(
            'My Error says: %s with code: %s',
            $exception->getMessage(),
            $exception->getCode()
        );

        // Customize your response object to display the exception details
        $response = new Response();
        $response->setContent($message);

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(500);
        }

        // Send the modified response object to the event
        $event->setResponse($response);
    }
}
