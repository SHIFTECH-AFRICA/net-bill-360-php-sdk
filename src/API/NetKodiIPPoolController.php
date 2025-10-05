<?php

namespace NetKodi\API;

use NetKodi\Traits\NetKodiAuthType;

class NetKodiIPPoolController
{
    use NetKodiAuthType;

    /**
     * Constructor: always use Bearer Auth
     */
    public function __construct(?string $token = null)
    {
        $this->token = $token;
    }

    /**
     * Get nas pools
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('pools', 'index'))
            ->json();
    }

    /**
     * Show nas pools
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('pools', 'show', ['id' => $id]))
            ->json();
    }
}
