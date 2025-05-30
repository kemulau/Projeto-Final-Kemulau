<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $instanceId;
    protected $token;

    public function __construct()
    {
        $this->instanceId = config('services.ultramsg.instance_id');
        $this->token = config('services.ultramsg.token');
    }

    public function enviarMensagem($numero, $mensagem)
    {
        $url = "https://api.ultramsg.com/{$this->instanceId}/messages/chat";

        $response = Http::asForm()->post($url, [
            'token' => $this->token,
            'to' => $numero,
            'body' => $mensagem,
            'priority' => 10,
        ]);

        return $response->successful();
    }
}
