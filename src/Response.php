<?php

namespace Slexx\Response;

use Slexx\Headers\Headers;

class Response
{
    /**
     * @var int
     */
    protected $status = 200;

    /**
     * @var null|string
     */
    protected $body = null;

    /**
     * @var Headers
     */
    protected $headers;

    /**
     *
     */
    public function __construct()
    {
        $this->setHeaders([]);
    }

    /**
     * Получение заголовков ответа
     * @return Headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Установка заголовков ответа
     * @param Headers|array|string $headers
     * @return void
     */
    public function setHeaders($headers)
    {
        if ($headers instanceof Headers) {
            $this->headers = $headers;
        } else {
            $this->headers = new Headers($headers);
        }
    }

    /**
     * Установка статуса ответа
     * @param int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Получение статуса ответа
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Установка тела ответа
     * @param string|null $body
     * @return void
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Получение тела ответа
     * @return null|string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Отправка ответа
     * @return void
     */
    public function send()
    {
        http_response_code($this->status);
        foreach($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }
        echo $this->body;
        exit;
    }

    /**
     * Перенаправление
     * @param string $url
     * @param int $status
     * @return Response
     */
    public static function redirect($url, $status = 200)
    {
        $response = new Response();
        $response->setStatus($status);
        $response->getHeaders()->set('Location', $url);
        return $response;
    }

    /**
     * Отправляет json ответ
     * @param array $data
     * @param int $status
     * @return Response
     */
    public static function json($data, $status = 200)
    {
        $response = new Response();
        $response->setStatus($status);
        $response->getHeaders()->set('Content-Type', 'application/json; charset=UTF-8');
        $response->setBody(json_encode($data, JSON_UNESCAPED_UNICODE));
        return $response;
    }

    /**
     * Отправляет ответ в виде простого текста
     * @param string $text
     * @param int $status
     * @return Response
     */
    public static function text($text, $status = 200)
    {
        $response = new Response();
        $response->setStatus($status);
        $response->getHeaders()->set('Content-Type', 'text/plain; charset=UTF-8');
        $response->setBody($text);
        return $response;
    }
}
