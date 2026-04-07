<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360IPPoolController
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
     * Get nas pools
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('pools', 'index'))
            ->json();
    }

    /**
     * Show nas pool
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('pools', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Delete nas pool
     */
    public function delete(int $id): mixed
    {
        return $this->client($this->token)
            ->delete(netbill360_url('pools', 'delete', ['id' => $id]))
            ->json();
    }
}
