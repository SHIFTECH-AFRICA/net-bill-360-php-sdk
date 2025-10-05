<?php

namespace NetKodi\API;

use NetKodi\Traits\NetKodiAuthType;

class NetKodiCustomerController
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
     * Get customers
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('customers', 'index'))
            ->json();
    }

    /**
     * Store customers
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netkodi_url('customers', 'store'), $data)
            ->json();
    }

    /**
     * Show customers
     */
    public function show(string $username): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('customers', 'show', ['username' => $username]))
            ->json();
    }

    /**
     * Update customers
     */
    public function update(array $data): mixed
    {
        return $this->client($this->token)
            ->patch(netkodi_url('customers', 'update'), $data)
            ->json();
    }

}
