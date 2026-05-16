<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360ConnectionReport
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
     * Get pppoe connections reports
     */
    public function pppoeConnectionReport(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('connection-report', 'pppoe'))
            ->json();
    }
}
