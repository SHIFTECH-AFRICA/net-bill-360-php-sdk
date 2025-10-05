<?php

namespace NetKodi;

use NetKodi\API\{NetKodiCustomerController,
    NetKodiIPPoolController,
    NetKodiNasController,
    NetKodiNasTypesController,
    NetKodiPlanController,
    NetKodiSubscriptionController,
    NetKodiTokenController,
    NetKodiUsersController
};
use NetKodi\Traits\NetKodiAuthType;

/**
 * --------------------------------------------------------------------------
 * NetKodi SDK Core Class
 * --------------------------------------------------------------------------
 * Acts as a unified interface to interact with all NetKodi API endpoints,
 * including Users, NAS devices, Plans, Customers, Tokens, and Subscriptions.
 *
 * This class provides high-level methods that wrap around the underlying
 * API controllers while maintaining authentication and reusability.
 *
 * @package NetKodi
 */
class NetKodi
{
    use NetKodiAuthType;

    /**
     * Initialize the SDK instance with an optional custom token.
     * If not provided, it defaults to the one from config('netkodi.net_kodi_token').
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
        return (new NetKodiUsersController())->index();
    }

    /** Create a new user */
    public function createUser(array $data): mixed
    {
        return (new NetKodiUsersController())->store($data);
    }

    /** Get details for a specific user by account ID */
    public function getUser(int $account): mixed
    {
        return (new NetKodiUsersController())->show($account);
    }

    /** Update user details */
    public function updateUser(array $data, int $account): mixed
    {
        return (new NetKodiUsersController())->update($data, $account);
    }

    /** Delete a user */
    public function deleteUser(int $account): mixed
    {
        return (new NetKodiUsersController())->delete($account);
    }

    /** Restore a deleted user */
    public function restoreUser(int $account): mixed
    {
        return (new NetKodiUsersController())->restore($account);
    }

    /* -------------------------------------------------------------------------
     | TOKEN MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all tokens */
    public function getTokens(): mixed
    {
        return (new NetKodiTokenController())->index();
    }

    /** Create a new token */
    public function createToken(array $data): mixed
    {
        return (new NetKodiTokenController())->store($data);
    }

    /** Get token details by ID */
    public function getToken(int $id): mixed
    {
        return (new NetKodiTokenController())->show($id);
    }

    /** Delete a token */
    public function deleteToken(int $id): mixed
    {
        return (new NetKodiTokenController())->delete($id);
    }

    /* -------------------------------------------------------------------------
     | NAS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get available NAS types */
    public function getNasTypes(): mixed
    {
        return (new NetKodiNasTypesController())->types();
    }

    /** Get all NAS devices */
    public function getAllNas(): mixed
    {
        return (new NetKodiNasController($this->token))->index();
    }

    /** Create a NAS device */
    public function createNas(array $data): mixed
    {
        return (new NetKodiNasController($this->token))->store($data);
    }

    /** Get NAS details by ID */
    public function getNas(int $id): mixed
    {
        return (new NetKodiNasController($this->token))->show($id);
    }

    /** Update a NAS device */
    public function updateNas(array $data, int $id): mixed
    {
        return (new NetKodiNasController($this->token))->update($data, $id);
    }

    /** Delete a NAS device */
    public function deleteNas(int $id): mixed
    {
        return (new NetKodiNasController($this->token))->delete($id);
    }

    /* -------------------------------------------------------------------------
     | IP POOLS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all IP pools */
    public function getPools(): mixed
    {
        return (new NetKodiIPPoolController($this->token))->index();
    }

    /** Get specific pool by ID */
    public function getPool(int $id): mixed
    {
        return (new NetKodiIPPoolController($this->token))->show($id);
    }

    /* -------------------------------------------------------------------------
     | PLANS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all bandwidth plans */
    public function getPlans(): mixed
    {
        return (new NetKodiPlanController($this->token))->index();
    }

    /** Create a new bandwidth plan */
    public function createPlan(array $data): mixed
    {
        return (new NetKodiPlanController($this->token))->store($data);
    }

    /** Get a specific plan */
    public function getPlan(int $id): mixed
    {
        return (new NetKodiPlanController($this->token))->show($id);
    }

    /** Update a plan */
    public function updatePlan(array $data, int $id): mixed
    {
        return (new NetKodiPlanController($this->token))->update($data, $id);
    }

    /* -------------------------------------------------------------------------
     | CUSTOMERS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all customers */
    public function getCustomers(): mixed
    {
        return (new NetKodiCustomerController($this->token))->index();
    }

    /** Create a new customer */
    public function createCustomer(array $data): mixed
    {
        return (new NetKodiCustomerController($this->token))->store($data);
    }

    /** Get customer details by username */
    public function getCustomer(string $username): mixed
    {
        return (new NetKodiCustomerController($this->token))->show($username);
    }

    /** Update customer details */
    public function updateCustomer(array $data): mixed
    {
        return (new NetKodiCustomerController($this->token))->update($data);
    }

    /* -------------------------------------------------------------------------
     | SUBSCRIPTIONS MANAGEMENT
     |-------------------------------------------------------------------------*/

    /** Get all subscriptions */
    public function getSubscriptions(): mixed
    {
        return (new NetKodiSubscriptionController($this->token))->index();
    }

    /** Create a new subscription */
    public function createSubscription(array $data): mixed
    {
        return (new NetKodiSubscriptionController($this->token))->store($data);
    }

    /** Get subscription details by username */
    public function getSubscription(string $username): mixed
    {
        return (new NetKodiSubscriptionController($this->token))->show($username);
    }

    /** Update an existing subscription */
    public function updateSubscription(array $data): mixed
    {
        return (new NetKodiSubscriptionController($this->token))->update($data);
    }
}
