# Contorno de Desenvolvemento con Docker

Para a posta en marcha en local só é necesario ter instalado `git` e `docker`. Os seguintes comandos foron executados co usuario habitual nun contorno ubuntu-like, polo que o UID e GID de usuario é 1000; cambiar segundo corresponda (pódese averiguar facil co comando `id`)

## Descargamos o código e iniciamos o servidor.

- Dos seguintes comandos, se algún fallase, poderíanselle agregar os flags `--interactive --tty` por se fixera falta algunha interacción.
- Pódese usar npm e yarn de xeito indistinto.
- Clonamos o código
    ```
    git clone https://github.com/YOUR-USER/galipsum/
    cd galipsum
    git remote add upstream https://github.com/unapersona/galipsum/
    git fetch upstream
    ```
- Descargamos dependencias
    ```
    docker run --rm -v $PWD:/app -w /app --user 1000:1000 composer install
    docker run --rm -v $PWD:/app -w /app --user 1000:1000 node:buster-slim npm install
    ```
- Se o `npm install` falla por timeout, pódese probar con `yarn` en vez de `npm` (pero entón habería que utilizar `yarn` tamén nos seguintes comandos).
- Xeramos os artefactos de producción
    ```
    docker run --rm -v $PWD:/app -w /app --user 1000:1000 node:buster-slim npm scripts
    docker run --rm -v $PWD:/app -w /app --user 1000:1000 node:buster-slim npm styles
    ```
- Iniciamos a aplicación co servidor integrado de PHP
    ```
    docker run --rm -v $PWD:/app -w /app --user 1000:1000 -p 127.0.0.1:8080:8080 php:7.4-cli php -S 0.0.0.0:8080 index.php
    ```

