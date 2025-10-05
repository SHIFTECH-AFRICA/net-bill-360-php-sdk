<?php

namespace NetKodi\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait NetKodiAuthType
{
    protected string $username;
    protected string $password;
    protected string|null $token;
    protected bool $isBasic = false;

    /**
     * Initialize credentials (lazy-loaded)
     */
    protected function initAuth(): void
    {
        $this->username = config('netkodi.net_kodi_username');
        $this->password = config('netkodi.net_kodi_password');
        $this->token = config('netkodi.net_kodi_token');
    }

    /**
     * Reusable HTTP client with Basic or Bearer Auth
     */
    protected function client(?string $token = null): PendingRequest
    {
        $this->initAuth();

        /**
         * Dynamically override token at runtime
         */
        if ($token) {
            $this->token = $token;
        }

        return $this->isBasic
            ? Http::withBasicAuth($this->username, $this->password)
            : Http::withToken($this->token);
    }
}
