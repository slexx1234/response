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
     * @return $this
     */
    public function setHeaders($headers)
    {
        if ($headers instanceof Headers) {
            $this->headers = $headers;
        } else {
            $this->headers = new Headers($headers);
        }
        return $this;
    }

    /**
     * Установка статуса ответа
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
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
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
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
        return (new Response())
            ->setStatus($status)
            ->setHeader('Location', $url);
    }

    /**
     * Отправляет json ответ
     * @param array $data
     * @param int $status
     * @return Response
     */
    public static function json($data, $status = 200)
    {
        return (new Response())
            ->setStatus($status)
            ->setHeader('Content-Type', 'application/json; charset=UTF-8')
            ->setBody(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * Отправляет ответ в виде простого текста
     * @param string $text
     * @param int $status
     * @return Response
     */
    public static function text($text, $status = 200)
    {
        return (new Response())
            ->setStatus($status)
            ->setHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->setBody($text);
    }

    /**
     * @param string $html
     * @param int $status
     * @return Response
     */
    public static function html($html, $status = 200)
    {
        return (new Response())
            ->setStatus($status)
            ->setHeader('Content-Type', 'text/html; charset=UTF-8')
            ->setBody($html);
    }

    /**
     * @param string $name
     * @param string $header
     * @return $this
     */
    public function setHeader($name, $header)
    {
        $this->headers->set($name, $header);
        return $this;
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function getHeader($name)
    {
        return $this->headers->get($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasHeader($name)
    {
        return $this->headers->has($name);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeHeader($name)
    {
        $this->headers->remove($name);
        return $this;
    }
}
