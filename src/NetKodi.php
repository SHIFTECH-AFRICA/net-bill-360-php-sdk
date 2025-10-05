<?php

namespace NetKodi;

use NetKodi\API\NetKodiCustomerController;
use NetKodi\API\NetKodiIPPoolController;
use NetKodi\API\NetKodiNasController;
use NetKodi\API\NetKodiNasTypesController;
use NetKodi\API\NetKodiPlanController;
use NetKodi\API\NetKodiSubscriptionController;
use NetKodi\API\NetKodiTokenController;
use NetKodi\API\NetKodiUsersController;
use NetKodi\Traits\NetKodiAuthType;

class NetKodi
{
    use NetKodiAuthType;

    /**
     * Constructor: always use Bearer Auth
     */
    public function __construct(?string $token = null)
    {
        $this->token = $token;
    }

    /**
     * ---------------------------------------
     * Handle all that relates to users
     * --------------------------------------
     */
    public function getUsers(): mixed
    {
        return (new NetKodiUsersController())->index();
    }

    public function createUser(array $data): mixed
    {
        return (new NetKodiUsersController())->store($data);
    }

    public function getUser(int $account)
    {
        return (new NetKodiUsersController())->show($account);
    }

    public function updateUser(array $data, int $account): mixed
    {
        return (new NetKodiUsersController())->update($data, $account);
    }

    public function deleteUser(int $account)
    {
        return (new NetKodiUsersController())->delete($account);
    }

    public function restoreUser(int $account)
    {
        return (new NetKodiUsersController())->restore($account);
    }

    /**
     * -------------------------------------------------
     * Generate tokens to be used for as bearer token
     * -------------------------------------------------
     */
    public function getTokens()
    {
        return (new NetKodiTokenController())->index();
    }

    public function createToken(array $data): mixed
    {
        return (new NetKodiTokenController())->store($data);
    }

    public function getToken(int $account)
    {
        return (new NetKodiTokenController())->show($account);
    }

    public function deleteToken(int $account)
    {
        return (new NetKodiTokenController())->delete($account);
    }


    /**
     * ----------------------------------------------
     * Handle all that relates to nas
     * ----------------------------------------------
     */
    public function nasTypes()
    {
        return (new NetKodiNasTypesController())->types();
    }


    /**
     * --------------------------------------------
     * Handle nas devices
     * --------------------------------------------
     */
    public function getAllNas()
    {
        return (new NetKodiNasController($this->token))->index();
    }

    public function createNas(array $data): mixed
    {
        return (new NetKodiNasController($this->token))->store($data);
    }

    public function getNas(int $id)
    {
        return (new NetKodiNasController($this->token))->show($id);
    }

    public function updateNas(array $data, int $id): mixed
    {
        return (new NetKodiNasController($this->token))->update($data, $id);
    }

    public function deleteNas(int $id)
    {
        return (new NetKodiNasController($this->token))->delete($id);
    }

    /**
     * ----------------------------------
     * Handle Nas Pools Operations
     * ---------------------------------
     */
    public function getPools()
    {
        return (new NetKodiIPPoolController($this->token))->index();
    }

    public function getPool(int $id)
    {
        return (new NetKodiIPPoolController($this->token))->show($id);
    }

    /**
     * -------------------------------------
     * Handle Bandwidth plans
     * ------------------------------------
     */
    public function getPlans()
    {
        return (new NetKodiPlanController($this->token))->index();
    }

    public function createPlan(array $data): mixed
    {
        return (new NetKodiPlanController($this->token))->store($data);
    }

    public function getPlan(int $id)
    {
        return (new NetKodiPlanController($this->token))->show($id);
    }

    public function updatePlan(array $data, int $id): mixed
    {
        return (new NetKodiPlanController($this->token))->update($data, $id);
    }

    /**
     * -------------------------------------
     * Handle Customer/Clients
     * ------------------------------------
     */
    public function getCustomers()
    {
        return (new NetKodiCustomerController($this->token))->index();
    }

    public function createCustomer(array $data): mixed
    {
        return (new NetKodiCustomerController($this->token))->store($data);
    }

    public function getCustomer(string $username)
    {
        return (new NetKodiCustomerController($this->token))->show($username);
    }

    public function updateCustomer(array $data): mixed
    {
        return (new NetKodiCustomerController($this->token))->update($data);
    }

    /**
     * ----------------------------------------
     * Handle Customer/Clients Subscriptions
     * ----------------------------------------
     */
    public function getSubscriptions()
    {
        return (new NetKodiSubscriptionController($this->token))->index();
    }

    public function createSubscription(array $data): mixed
    {
        return (new NetKodiSubscriptionController($this->token))->store($data);
    }

    public function getSubscription(string $username)
    {
        return (new NetKodiSubscriptionController($this->token))->show($username);
    }

    public function updateSubscription(array $data): mixed
    {
        return (new NetKodiSubscriptionController($this->token))->update($data);
    }

}
