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
            ->get(netkodi_url('plans', 'index'))
            ->json();
    }

    /**
     * Store plans
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netkodi_url('plans', 'store'), $data)
            ->json();
    }

    /**
     * Show plans
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('plans', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Update plans
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client($this->token)
            ->patch(netkodi_url('plans', 'update', ['id' => $id]), $data)
            ->json();
    }

}
