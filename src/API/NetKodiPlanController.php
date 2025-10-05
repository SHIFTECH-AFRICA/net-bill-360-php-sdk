<?php

namespace NetKodi\API;

use NetKodi\Traits\NetKodiAuthType;

class NetKodiPlanController
{
    use NetKodiAuthType;

    /**
     * Constructor: always use Bearer Auth
     */
    public function __construct(?string $token = null)
    {
        if ($token) {
            $this->token = $token;
        }
    }

    /**
     * Get nas
     */
    public function index(): mixed
    {
        return $this->client()
            ->get(netkodi_url('nas', 'index'))
            ->json();
    }

    /**
     * Store nas
     */
    public function store(array $data): mixed
    {
        return $this->client()
            ->post(netkodi_url('nas', 'store'), $data)
            ->json();
    }

    /**
     * Show nas
     */
    public function show(int $id): mixed
    {
        return $this->client()
            ->get(netkodi_url('nas', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Update nas
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client()
            ->patch(netkodi_url('nas', 'update', ['id' => $id]), $data)
            ->json();
    }

}
