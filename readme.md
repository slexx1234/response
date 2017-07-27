Response
=========================================
[![Latest Stable Version](https://poser.pugx.org/slexx/response/v/stable)](https://packagist.org/packages/slexx/response) [![Total Downloads](https://poser.pugx.org/slexx/response/downloads)](https://packagist.org/packages/slexx/response) [![Latest Unstable Version](https://poser.pugx.org/slexx/response/v/unstable)](https://packagist.org/packages/slexx/response) [![License](https://poser.pugx.org/slexx/response/license)](https://packagist.org/packages/slexx/response)

## Установка

```
$ composer require slexx/response
```

## Базовое использование

Класс для управления ответом сервера

```php
Response::json([
    'error' => 'Unexpected error!',
]);
```

## Документация

### Response->__construct()

Конструктор не принимает ни каких аргументов.

### Response->getHeaders()

Возвращает заголовки ответа

**Возвращает:** `Headers`

### Response->setHeaders($headers)

Устанавливает заголовки ответа

**Аргументы:**

| Имя        | Тип                          | Описание         |
| ---------- | ---------------------------- | ---------------- |
| `$headers` | `Headers`, `array`, `string` | Заголовки ответа |

**Возвращает:** `void`

### Response->setStatus($status)

Устанавливает код HTTP статуса

**Аргументы:**

| Имя       | Тип   | Описание         |
| --------- | ----- | ---------------- |
| `$status` | `int` | Код HTTP статуса |

**Возвращает:** `void`

### Response->getStatus()

Возвращает код HTTP татуса

**Возвращает:** `int`

### Response->setBody($body)

Устанавливает тело ответа

**Аргументы:**

| Имя     | Тип      | Описание    |
| ------- | -------- | ----------- |
| `$body` | `string` | Тело ответа |

**Возвращает:** `void`

### Response->getBody()

Возвращает тело ответа

**Возвращает:** `string`, `null`

### Response->send()

Отправляет ответ. В этом методе вызывается функция `exit`, любой код после отправки ответа
от сервера не заработает.

**Возвращает:** `void`

### Response::redirect($url[, $status])

Создаёт редирект

**Аргументы:**

| Имя       | Тип      | Описание                   |
| --------- | -------- | -------------------------- |
| `$url`    | `string` | Ссылка для перенаправления |
| `$status` | `int`    | Код HTTP статуса           |

**Возвращает:** `Response`

### Response::json($data[, $status])

Создаёт объект для json ответа

**Аргументы:**

| Имя       | Тип     | Описание                     |
| --------- | ------- | ---------------------------- |
| `$json`   | `array` | Ответ сервера в виде массива |
| `$status` | `int`   | Код HTTP статуса             |

**Возвращает:** `Response`

### Response::text($text[, $status])

Ответ сервеа в виде обычного текста

**Аргументы:**

| Имя       | Тип      | Описание                    |
| --------- | -------- | --------------------------- |
| `$text`   | `string` | Ответ сервера в виде строки |
| `$status` | `int`    | Код HTTP статуса            |

**Возвращает:** `Response`
