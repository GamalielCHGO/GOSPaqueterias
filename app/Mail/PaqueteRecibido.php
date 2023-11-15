<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class PaqueteRecibido extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;

    /**
     * Create a new message instance.
     */
    public function __construct($mensaje)
    {
        $this->mensaje=$mensaje;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Guia generada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Your Account SID and Auth Token from twilio.com/console
        // To set up environmental variables, see http://twil.io/secure
        $sid    = "AC9732b61a65c8b1ae84c1abdc118e4682";
        $token  = "793b36c7c52b7175761d6b13336919cb";
        $twilio = new Client($sid, $token);
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
        // A Twilio number you own with SMS capabilities
        // descomentar esto para enviar el mensaje
        // $message = $twilio->messages->create("+525529644454", // to
        // array(
        //         "messagingServiceSid" => "MG2de1e84aa9aff165fc81862d686192c1",
        //           "body" => "Un nuevo envio ha sido generado con  la guia:".$this->mensaje['guia']."\n"."Tu contrasena para recibir el paquete es la siguiente: ".$this->mensaje['clave']
        //     )
        //     );
        return new Content(
            view: 'mail.paqueteRecibido',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath('\gospaqueterias\public\assets\images\logo GOS.png'),
        ];
    }
}
