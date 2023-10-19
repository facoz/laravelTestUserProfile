<?php

namespace App\Services;

class SendEmailService
{
    public function sendEmail($nombreDelCorreo)
    {
        if(!$nombreDelCorreo)
        {
            \Log::info("Error, no se encontró una dirección de correo");            
        }else{
            sleep(5);
            \Log::info("Mensaje enviado al correo: $nombreDelCorreo");
        }
    }
}
