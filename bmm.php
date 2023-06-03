<?php

class bmm
{
    private $backendUrl;
    private $UUID;

    public function __construct($backendUrl, $uuid)
    {
        $this->backendUrl = $backendUrl;
        $this->UUID = $uuid;
    }

    public function getEvents()
    {
        $ch = curl_init($this->backendUrl . '/api/events/bygenerator/' . $this->UUID);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function postEvent($eventUuid, $content)
    {
        $data = [
            'uuid' => $this->UUID,
            'eventUuid' => $eventUuid,
            'content' => $content,
        ];
        $req = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->backendUrl . '/api/events/notify/' . $eventUuid);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($req)
            ]
        );
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}