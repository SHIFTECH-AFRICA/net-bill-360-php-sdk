<?php

if (!function_exists('netkodi_url')) {
    /**
     * Build a full NetKodi API URL for the given resource/action.
     *
     * Example:
     * netkodi_url('users', 'index');
     * // https://api.netkodi.co.ke/api/v1/users/index
     *
     * netkodi_url('users', 'show', ['id' => 123]);
     * // https://api.netkodi.co.ke/api/v1/users/show/123
     *
     * netkodi_url('customers', 'show', ['username' => 'ososiportal']);
     * // https://api.netkodi.co.ke/api/v1/customers/show/ososiportal
     *
     * netkodi_url('users', 'index', [], ['page' => 2, 'limit' => 20]);
     * // https://api.netkodi.co.ke/api/v1/users/index?page=2&limit=20
     *
     * @param string $resource Resource name (e.g. "users", "nas")
     * @param string $action Action name (e.g. "index", "show", "update")
     * @param array $params Placeholder replacements (e.g. ['id' => 1])
     * @param array $query
     * @return string
     *
     */
    function netkodi_url(string $resource, string $action, array $params = [], array $query = []): string
    {
        $config = config("netkodi.url");
        $endpoint = rtrim($config['endpoint'], '/');

        if (!isset($config[$resource][$action])) {
            throw new InvalidArgumentException("Action [$action] is not defined for resource [$resource].");
        }

        $path = $config[$resource][$action];

        // Replace placeholders like {id}, {username}, {account}
        foreach ($params as $key => $value) {
            $path = str_replace("{" . $key . "}", $value, $path);
        }

        $path = trim($path, '/');

        // If placeholders remain unresolved, throw an error
        if (preg_match('/{[a-zA-Z0-9_]+}/', $path)) {
            throw new InvalidArgumentException("Missing required parameters for [$resource.$action]. Path: $path");
        }

        $url = "{$endpoint}/{$resource}/{$path}";

        // Append query params if provided
        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }
}
