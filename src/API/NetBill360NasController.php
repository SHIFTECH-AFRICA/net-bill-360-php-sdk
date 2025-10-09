<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360NasController
{
    use NetBill360AuthType;

    /**
     * Constructor: always use Bearer Auth
     */
    public function __construct(?string $token = null)
    {
        $this->token = $token;
    }

    /**
     * Get nas
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('nas', 'index'))
            ->json();
    }

    /**
     * Store nas
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netkodi_url('nas', 'store'), $data)
            ->json();
    }

    /**
     * Show nas
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('nas', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Update nas
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client($this->token)
            ->patch(netkodi_url('nas', 'update', ['id' => $id]), $data)
            ->json();
    }

    /**
     * Delete nas
     */
    public function delete(int $id): mixed
    {
        return $this->client($this->token)
            ->delete(netkodi_url('nas', 'delete', ['id' => $id]))
            ->json();
    }

}
