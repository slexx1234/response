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
], 500);
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

**Возвращает:** `Response`

### Response->setHeader($name, $header)

Установка заголовка

**Аргументы:**

| Имя       | Тип      | Описание      |
| --------- | -------- | ------------- |
| `$name`   | `string` | Имя заголовка |
| `$header` | `string` | Заголовак     |

**Возвращает:** `Response`

### Response->getHeader($name)

Получение заголовка

**Аргументы:**

| Имя       | Тип      | Описание      |
| --------- | -------- | ------------- |
| `$name`   | `string` | Имя заголовка |

**Возвращает:** `string`, `null`

### Response->hasHeader($name)

Проверка существования заголовка

**Аргументы:**

| Имя       | Тип      | Описание      |
| --------- | -------- | ------------- |
| `$name`   | `string` | Имя заголовка |

**Возвращает:** `bool`

### Response->removeHeader($name)

Удаление заголовка

**Аргументы:**

| Имя       | Тип      | Описание      |
| --------- | -------- | ------------- |
| `$name`   | `string` | Имя заголовка |

**Возвращает:** `Response`

### Response->setStatus($status)

Устанавливает код HTTP статуса

**Аргументы:**

| Имя       | Тип   | Описание         |
| --------- | ----- | ---------------- |
| `$status` | `int` | Код HTTP статуса |

**Возвращает:** `Response`

### Response->getStatus()

Возвращает код HTTP татуса

**Возвращает:** `int`

### Response->setBody($body)

Устанавливает тело ответа

**Аргументы:**

| Имя     | Тип      | Описание    |
| ------- | -------- | ----------- |
| `$body` | `string` | Тело ответа |

**Возвращает:** `Response`

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

### Response::html($text[, $status])

Ответ сервеа в виде html кода

**Аргументы:**

| Имя       | Тип      | Описание         |
| --------- | -------- | ---------------- |
| `$html`   | `string` | html код         |
| `$status` | `int`    | Код HTTP статуса |

**Возвращает:** `Response`

