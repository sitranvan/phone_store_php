<?php

namespace App\Core;


class Route
{
    private $uri = '';
    public function handleRoute($url)
    {
        global $routes;
        $routesCheck = null;
        if (strpos($url, _ADMIN)) {
            $routesCheck = $routes[_ADMIN];
        } else {
            $routesCheck = $routes[_CLENTS];
        }

        $handleUrl = $url;
        if (!empty($routesCheck)) {
            foreach ($routesCheck as $key => $value) {
                // Check đường dẫn có khớp
                if (preg_match('~' . $key . '~is', $url)) {
                    // Thay thế
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);
                    $this->uri = $key;
                }
            }
        }
        return $handleUrl;
    }
    public function getUri()
    {
        return $this->uri;
    }
}
