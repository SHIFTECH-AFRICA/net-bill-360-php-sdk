<?php

namespace NetKodi\Traits;

use InvalidArgumentException;

trait FreeRadiusUrl
{
    /**
     * -------------------------------------------------------------------------------
     * netkodi_url('users', 'index');
     * // https://free-radius.shiftechafrica.com/api/v1/users/index
     *
     * netkodi_url('users', 'show', ['id' => 470970]);
     * // https://free-radius.shiftechafrica.com/api/v1/users/show/470970
     *
     * netkodi_url('customers', 'show', ['username' => 'ososiportal']);
     * // https://free-radius.shiftechafrica.com/api/v1/customers/show/ososiportal
     *
     * netkodi_url('nas', 'update', ['id' => 10]);
     * // https://free-radius.shiftechafrica.com/api/v1/nas/update/10
     * ---------------------------------------------------------------------------------
     */
    function passUrl(string $resource, string $action, array $params = []): string
    {
        $config = config("netkodi.url");
        $endpoint = rtrim($config['endpoint'], '/');

        if (!isset($config[$resource][$action])) {
            throw new InvalidArgumentException("No [$action] for [$resource]");
        }

        $path = $config[$resource][$action];

        // Replace placeholders e.g. {id}, {username}
        foreach ($params as $key => $val) {
            $path = str_replace("{" . $key . "}", $val, $path);
        }

        return "{$endpoint}/{$resource}/{$path}";
    }

}
