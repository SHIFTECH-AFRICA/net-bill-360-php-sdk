<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360CustomerController
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
     * Get customers
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('customers', 'index'))
            ->json();
    }

    /**
     * Store customers
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netbill360_url('customers', 'store'), $data)
            ->json();
    }

    /**
     * Show customers
     */
    public function show(string $username): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('customers', 'show', ['username' => $username]))
            ->json();
    }

    /**
     * Update customers
     */
    public function update(array $data): mixed
    {
        return $this->client($this->token)
            ->patch(netbill360_url('customers', 'update'), $data)
            ->json();
    }

}
