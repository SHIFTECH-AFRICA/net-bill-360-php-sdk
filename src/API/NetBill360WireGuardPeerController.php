<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360WireGuardPeerController
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
     * Get wire-guard-peers
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('wire-guard-peers', 'index'))
            ->json();
    }

    /**
     * Store wire-guard-peers
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netbill360_url('wire-guard-peers', 'store'), $data)
            ->json();
    }

    /**
     * Show wire-guard-peers
     */
    public function show(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('wire-guard-peers', 'show', ['id' => $id]))
            ->json();
    }

    /**
     * Show wire-guard-peer config
     */
    public function config(int $id): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('wire-guard-peers', 'config', ['id' => $id]))
            ->json();
    }

    /**
     * Update wire-guard-peers
     */
    public function update(array $data, int $id): mixed
    {
        return $this->client($this->token)
            ->patch(netbill360_url('wire-guard-peers', 'update', ['id' => $id]), $data)
            ->json();
    }

    /**
     * Delete wire-guard-peers
     */
    public function delete(int $id): mixed
    {
        return $this->client($this->token)
            ->delete(netbill360_url('wire-guard-peers', 'delete', ['id' => $id]))
            ->json();
    }
}
