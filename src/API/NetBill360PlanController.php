<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360PlanController
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
     * Get plans
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('plans', 'index'))
            ->json();
    }

    /**
     * Store plans
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netbill360_url('plans', 'store'), $data)
            ->json();
    }

    /**
     * Show plans
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('plans', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Update plans
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client($this->token)
            ->patch(netbill360_url('plans', 'update', ['id' => $id]), $data)
            ->json();
    }

    /**
     * Delete plans
     */
    public function delete(int $id): mixed
    {
        return $this->client($this->token)
            ->delete(netbill360_url('plans', 'delete', ['id' => $id]))
            ->json();
    }

}
