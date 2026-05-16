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

    /**
     * Get pending monthly active PPPOE
     */
    public function pendingMonthlyBillings(): mixed
    {
        return $this->client()
            ->get(netbill360_url('billings', 'pending'))
            ->json();
    }

    /**
     * Get all monthly active PPPOE
     */
    public function monthlyBillings(): mixed
    {
        return $this->client()
            ->get(netbill360_url('billings', 'all'))
            ->json();
    }

}
