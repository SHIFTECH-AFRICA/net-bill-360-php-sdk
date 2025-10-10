<?php

namespace NetBill360;

use NetBill360\API\{NetBill360CustomerController,
    NetBill360IPPoolController,
    NetBill360NasController,
    NetBill360NasTypesController,
    NetBill360PlanController,
    NetBill360SubscriptionController,
    NetBill360TokenController,
    NetBill360UsersController
};
use NetBill360\Traits\NetBill360AuthType;

/**
 * --------------------------------------------------------------------------
 * NetBill360 SDK Core Class
 * --------------------------------------------------------------------------
 * Acts as a unified interface to interact with all NetBill360 API endpoints,
 * including Users, NAS devices, Plans, Customers, Tokens, and Subscriptions.
 *
 * This class provides high-level methods that wrap around the underlying
 * API controllers while maintaining authentication and reusability.
 *
 * @package NetBill360
 */
class NetBill360
{
    use NetBill360AuthType;

    /**
     * Initialize the SDK instance with an optional custom token.
     * If not provided, it defaults to the one from config('netbill360.net_bill_360_token').
     */
    public function __construct(?string $token = null)
    {
        $this->token = $token;
    }

    /* -------------------------------------------------------------------------
     | USERS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all users */
    public function getUsers(): mixed
    {
        return (new NetBill360UsersController())->index();
    }

    /** Create a new user */
    public function createUser(array $data): mixed
    {
        return (new NetBill360UsersController())->store($data);
    }

    /** Get details for a specific user by account ID */
    public function getUser(int $account): mixed
    {
        return (new NetBill360UsersController())->show($account);
    }

    /** Update user details */
    public function updateUser(array $data, int $account): mixed
    {
        return (new NetBill360UsersController())->update($data, $account);
    }

    /** Delete a user */
    public function deleteUser(int $account): mixed
    {
        return (new NetBill360UsersController())->delete($account);
    }

    /** Restore a deleted user */
    public function restoreUser(int $account): mixed
    {
        return (new NetBill360UsersController())->restore($account);
    }

    /* -------------------------------------------------------------------------
     | TOKEN MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all tokens */
    public function getTokens(): mixed
    {
        return (new NetBill360TokenController())->index();
    }

    /** Create a new token */
    public function createToken(array $data): mixed
    {
        return (new NetBill360TokenController())->store($data);
    }

    /** Get token details by ID */
    public function getToken(int $id): mixed
    {
        return (new NetBill360TokenController())->show($id);
    }

    /** Delete a token */
    public function deleteToken(int $id): mixed
    {
        return (new NetBill360TokenController())->delete($id);
    }

    /* -------------------------------------------------------------------------
     | NAS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get available NAS types */
    public function getNasTypes(): mixed
    {
        return (new NetBill360NasTypesController())->types();
    }

    /** Get all NAS devices */
    public function getAllNas(): mixed
    {
        return (new NetBill360NasController($this->token))->index();
    }

    /** Create a NAS device */
    public function createNas(array $data): mixed
    {
        return (new NetBill360NasController($this->token))->store($data);
    }

    /** Get NAS details by ID */
    public function getNas(int $id): mixed
    {
        return (new NetBill360NasController($this->token))->show($id);
    }

    /** Update a NAS device */
    public function updateNas(array $data, int $id): mixed
    {
        return (new NetBill360NasController($this->token))->update($data, $id);
    }

    /** Delete a NAS device */
    public function deleteNas(int $id): mixed
    {
        return (new NetBill360NasController($this->token))->delete($id);
    }

    /* -------------------------------------------------------------------------
     | IP POOLS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all IP pools */
    public function getPools(): mixed
    {
        return (new NetBill360IPPoolController($this->token))->index();
    }

    /** Get specific pool by ID */
    public function getPool(int $id): mixed
    {
        return (new NetBill360IPPoolController($this->token))->show($id);
    }

    /* -------------------------------------------------------------------------
     | PLANS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all bandwidth plans */
    public function getPlans(): mixed
    {
        return (new NetBill360PlanController($this->token))->index();
    }

    /** Create a new bandwidth plan */
    public function createPlan(array $data): mixed
    {
        return (new NetBill360PlanController($this->token))->store($data);
    }

    /** Get a specific plan */
    public function getPlan(int $id): mixed
    {
        return (new NetBill360PlanController($this->token))->show($id);
    }

    /** Update a plan */
    public function updatePlan(array $data, int $id): mixed
    {
        return (new NetBill360PlanController($this->token))->update($data, $id);
    }

    /* -------------------------------------------------------------------------
     | CUSTOMERS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all customers */
    public function getCustomers(): mixed
    {
        return (new NetBill360CustomerController($this->token))->index();
    }

    /** Create a new customer */
    public function createCustomer(array $data): mixed
    {
        return (new NetBill360CustomerController($this->token))->store($data);
    }

    /** Get customer details by username */
    public function getCustomer(string $username): mixed
    {
        return (new NetBill360CustomerController($this->token))->show($username);
    }

    /** Update customer details */
    public function updateCustomer(array $data): mixed
    {
        return (new NetBill360CustomerController($this->token))->update($data);
    }

    /** Delete a customer */
    public function deleteCustomer(string $username): mixed
    {
        return (new NetBill360CustomerController($this->token))->delete($username);
    }

    /* -------------------------------------------------------------------------
     | SUBSCRIPTIONS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all subscriptions */
    public function getSubscriptions(): mixed
    {
        return (new NetBill360SubscriptionController($this->token))->index();
    }

    /** Create a new subscription */
    public function createSubscription(array $data): mixed
    {
        return (new NetBill360SubscriptionController($this->token))->store($data);
    }

    /** Get subscription details by username */
    public function getSubscription(string $username): mixed
    {
        return (new NetBill360SubscriptionController($this->token))->show($username);
    }

    /** Update an existing subscription */
    public function updateSubscription(array $data): mixed
    {
        return (new NetBill360SubscriptionController($this->token))->update($data);
    }
}
