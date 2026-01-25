<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360BillingController
{
    use NetBill360AuthType;

    /**
     * Constructor: always use Basic Auth
     */
    public function __construct()
    {
        $this->isBasic = true;
    }

    /**
     * Update PPPOE Billing
     */
    public function pppoeBilling(array $data, int $id): mixed
    {
        return $this->client()
            ->patch(netbill360_url('billings', 'pppoe', ['id' => $id]), $data)
            ->json();
    }

}
