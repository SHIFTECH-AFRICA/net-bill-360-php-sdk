<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360WireGuardController
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
     * Get wire-guards
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('wire-guards', 'index'))
            ->json();
    }

    /**
     * Store wire-guards
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netbill360_url('wire-guards', 'store'), $data)
            ->json();
    }

    /**
     * Show wire-guards
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('wire-guards', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Show wire-guards status
     */
    public function showStatus(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('wire-guards', 'status', ['id' => $id]))
            ->json();
    }

    /**
     * Update wire-guards
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client($this->token)
            ->patch(netbill360_url('wire-guards', 'update', ['id' => $id]), $data)
            ->json();
    }

    /**
     * Delete wire-guards
     */
    public function delete(int $id): mixed
    {
        return $this->client($this->token)
            ->delete(netbill360_url('wire-guards', 'delete', ['id' => $id]))
            ->json();
    }
}
