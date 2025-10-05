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
     * Get plans
     */
    public function index(): mixed
    {
        return $this->client()
            ->get(netkodi_url('plans', 'index'))
            ->json();
    }

    /**
     * Store plans
     */
    public function store(array $data): mixed
    {
        return $this->client()
            ->post(netkodi_url('plans', 'store'), $data)
            ->json();
    }

    /**
     * Show plans
     */
    public function show(int $id): mixed
    {
        return $this->client()
            ->get(netkodi_url('plans', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Update plans
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client()
            ->patch(netkodi_url('plans', 'update', ['id' => $id]), $data)
            ->json();
    }

}
