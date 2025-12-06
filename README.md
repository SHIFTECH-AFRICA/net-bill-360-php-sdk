# <p align="center"><a href="https://netbill360.com/" target="_blank"><img width="100" src="https://netbill360.com/img/logo.png" alt="NetBill360 - Connect - Bill - Sell - Internet"></a></p>

<p align="center">
  <b>NetBill360 - Connect - Bill - Sell - Internet</b><br>
  <a href="https://github.com/SHIFTECH-AFRICA/net-bill-360-php-sdk/issues">
    <img src="https://img.shields.io/github/issues/SHIFTECH-AFRICA/net-bill-360-php-sdk.svg">
  </a>
  <a href="https://github.com/SHIFTECH-AFRICA/net-bill-360-php-sdk/network/members">
    <img src="https://img.shields.io/github/forks/SHIFTECH-AFRICA/net-bill-360-php-sdk.svg">
  </a>
  <a href="https://github.com/SHIFTECH-AFRICA/net-bill-360-php-sdk/stargazers">
    <img src="https://img.shields.io/github/stars/SHIFTECH-AFRICA/net-bill-360-php-sdk.svg">
  </a>
  <a href="https://packagist.org/packages/shiftechafrica/net-bill-360-php-sdk">
    <img src="https://poser.pugx.org/shiftechafrica/net-bill-360-php-sdk/v/stable">
  </a>
  <a href="https://packagist.org/packages/shiftechafrica/net-bill-360-php-sdk">
    <img src="https://poser.pugx.org/shiftechafrica/net-bill-360-php-sdk/downloads">
  </a>
  <br><br>
  <img src="https://alphabet.nyc3.cdn.digitaloceanspaces.com/shared/netbill360/netbill3602.png" alt="NetBill360 Banner">
</p>

---

## 🚀 Introduction

**NetBill360 PHP SDK** provides a simple and efficient interface for interacting with the **NetBill360 Networking API**
— designed for seamless integration with **Mikrotik**, **NAS**, and **PPPoE servers**.

It helps ISPs and network administrators manage and automate network operations through the NetBill360 API.

### Key Features

- 🔌 Real-time user connection and disconnection — Manage active sessions instantly through the API.

- ⚙️ Automated bandwidth management and speed enforcement — Dynamically apply and enforce user speed limits.

- 🧩 Centralized NAS and access server control — Manage all NAS devices from one unified interface.

- 👥 Customer authentication and session management — Seamlessly handle user creation, authentication, and tracking.

- 🌐 WireGuard VPN configuration and peer management — Automate creation, updates, and synchronization of WireGuard
  interfaces and peers.

- 💾 Dynamic IP pool allocation and tracking — Efficiently assign and monitor IP address usage across devices.

- 🧠 Easy Laravel or standalone PHP integration — Plug and play within existing Laravel apps or use standalone.

- 🔒 Secure API communication — Built-in support for secure requests and authentication.

- 📊 Comprehensive monitoring and reporting — Access real-time stats for users, plans, and network interfaces.

📘 **Full Documentation:** [https://docs.netbill360.com](https://docs.netbill360.com)

---

## ⚙️ Installation

Install via [Composer](https://getcomposer.org/):

```bash
composer require shiftechafrica/net-bill-360-php-sdk
```

Update to the latest version:

```bash
composer update shiftechafrica/net-bill-360-php-sdk --lock
```

If not auto-discovered, run:

```bash
composer dump-autoload
```

Publish the configuration file:

```bash
php artisan vendor:publish --provider="NetBill360\NetBill360ServiceProvider"
```

The config file will be created at:

```
config/netbill360.php
```

Add your API token to the `.env` file:

```dotenv
NET_BILL_360_API_TOKEN=your_api_token_here
```

---

## 🧩 Usage

Use the SDK to easily manage and automate your network infrastructure — including NAS devices, IP pools, bandwidth
plans, customer accounts, active subscriptions, and WireGuard VPN interfaces and peers — all through a consistent,
developer-friendly API.

```php
<?php

use NetBill360\NetBill360;

/**
 * ============================================================
 *                NETBILL360 SDK USAGE EXAMPLES
 * ============================================================
 * This file demonstrates how to use the NetBill360 PHP SDK
 * to perform CRUD operations against the NetBill360 API.
 *
 * Each section below focuses on a specific API entity, showing
 * how to:
 *   - Retrieve lists and single items
 *   - Create new records
 *   - Update existing records
 *   - Delete records
 *
 * Make sure you have configured your NetBill360 SDK correctly
 * before running any of these examples.
 *
 * ------------------------------------------------------------
 * Author: Shiftech Africa
 * SDK:    NetBill360 PHP SDK
 * Version: 1.0.*
 * ------------------------------------------------------------
 */

/**
 * ------------------------------------------------------------
 *  NAS TYPES & DEVICES
 * ------------------------------------------------------------
 * NAS (Network Access Servers) are devices that authenticate
 * users to the network. The following methods allow you to
 * manage NAS entries.
 */

// Retrieve available NAS types
return (new NetBill360)->getNasTypes();

// Retrieve all NAS devices
return (new NetBill360)->getAllNas();

// Create a new NAS device
return (new NetBill360)->createNas([
    "nasname" => "192.168.88.109",
    "type" => "Huawei",
    "secret" => "secret",
    "port" => 1812,
    "description" => "short description"
]);

// Update an existing NAS device (ID: 12)
return (new NetBill360)->updateNas([
    "type" => "VAS Experts",
    "secret" => "secret",
    "port" => 1812,
    "description" => "short description"
], 12);

// Get a specific NAS device (ID: 12)
return (new NetBill360)->getNas(12);

// Delete a NAS device (ID: 12)
return (new NetBill360)->deleteNas(12);


/**
 * ------------------------------------------------------------
 *  IP POOLS
 * ------------------------------------------------------------
 * IP pools define groups of IP addresses available for
 * assignment to users or devices.
 */

// Retrieve all IP pools
return (new NetBill360)->getPools();

// Get a specific IP pool (ID: 12)
return (new NetBill360)->getPool(12);


/**
 * ------------------------------------------------------------
 *  BANDWIDTH PLANS
 * ------------------------------------------------------------
 * Bandwidth plans define speed limits and usage profiles
 * for customer subscriptions.
 */

// Retrieve all plans
return (new NetBill360)->getPlans();

// Create a new bandwidth plan
return (new NetBill360)->createPlan([
    "plan" => "700MBS",
    "download_limit" => 700,
    "upload_limit" => 700,
    "static_ip" => false,
    "ip" => "192.0.0.1" // required if static_ip = true
]);

// Update an existing plan (ID: 29)
return (new NetBill360)->updatePlan([
    "plan" => "5400MBS",
    "download_limit" => 500,
    "upload_limit" => 500,
    "static_ip" => false,
    "ip" => "192.0.0.1"
], 29);

// Get a specific plan (ID: 29)
return (new NetBill360)->getPlan(29);

// Delete a bandwidth plan (ID: 29)
return (new NetBill360)->deletePlan(29);


/**
 * ------------------------------------------------------------
 *  CUSTOMERS
 * ------------------------------------------------------------
 * Customers represent network users who can be assigned
 * plans and managed via subscriptions.
 */

// Retrieve all customers
return (new NetBill360)->getCustomers();

// Create a new customer
return (new NetBill360)->createCustomer([
    "plan_id" => 27,
    "username" => "netbill360",
    "password" => "password",
    "service_type" => "pppoe", // pppoe, hotspot or static
    "ip_address" => "", // required if service_type = static
    "port_limit" => 1 // required if service_type = hotspot
]);

// Update an existing customer
return (new NetBill360)->updateCustomer([
    "plan_id" => 27,
    "username" => "netbill360",
    "password" => "password",
    "service_type" => "pppoe", // pppoe, hotspot or static
    "ip_address" => "", // required if service_type = static
    "port_limit" => 1 // required if service_type = hotspot
]);

// Retrieve a single customer by username
return (new NetBill360)->getCustomer('netbill360');

// Retrieve a single customer oline status by username
return (new NetBill360)->getCustomerOnlineStatus('netbill360');

// Disconnect customer online devices by username
return (new NetBill360)->disconnectCustomerDevices('netbill360');

// Delete a customer by username
return (new NetBill360)->deleteCustomer('netbill360');


/**
 * ------------------------------------------------------------
 *  SUBSCRIPTIONS
 * ------------------------------------------------------------
 * Subscriptions link customers to plans with a start/end
 * validity period for billing and access control.
 */

// Retrieve all subscriptions
return (new NetBill360)->getSubscriptions();

// Create a new subscription
return (new NetBill360)->createSubscription([
    "username" => "netbill360",
    "date" => "2025-11-30 23:59:59"
]);

// Update a subscription
return (new NetBill360)->updateSubscription([
    "username" => "netbill360",
    "date" => "2025-10-11 02:00:00"
]);

// Retrieve a subscription by username
return (new NetBill360)->getSubscription('netbill360');


/**
 * ------------------------------------------------------------
 *  WIREGUARD INTERFACES
 * ------------------------------------------------------------
 * Interfaces define WireGuard VPN entry points for clients.
 */

// Retrieve all WireGuard interfaces
return (new NetBill360)->getWireGuardInterfaces();

// Create a new WireGuard interface
return (new NetBill360)->createWireGuardInterface([
    "name" => "Wire 1",
    "subnet_base" => "10.11.5.0",
    "subnet_cidr" => 24,
    "listen_port" => 60000,
    "enabled" => true
]);

// Update an existing WireGuard interface (ID: 12)
return (new NetBill360)->updateWireGuardInterface([
    "name" => "VAS Experts",
    "enabled" => true
], 12);

// Retrieve a specific WireGuard interface (ID: 12)
return (new NetBill360)->getWireGuardInterface(12);

// Retrieve a specific WireGuard interface Status Logs (ID: 12)
return (new NetBill360)->getWireGuardInterfaceStatus(12);


/**
 * ------------------------------------------------------------
 *  WIREGUARD PEERS
 * ------------------------------------------------------------
 * Peers represent connected clients (devices) using a
 * specific WireGuard interface.
 */

// Retrieve all WireGuard peers
return (new NetBill360)->getWireGuardPeers();

// Create a new WireGuard peer
return (new NetBill360)->createWireGuardPeer([
    "wire_guard_id" => 1,
    "name" => "Peer 1",
    "public_key" => "8chOvnXg/Xl4jDPOmwFSVLddIs8=",
    "assigned_ip" => "10.11.5.2",
    "status" => true
]);

// Update a WireGuard peer (ID: 12)
return (new NetBill360)->updateWireGuardPeer([
    "name" => "VAS Experts",
    "status" => true,
    "public_key" => "4iUWTridPn67tVMWLBINn/ZR0lDU6byeVZoPZA4o12I="
], 12);

// Get a specific WireGuard peer (ID: 12)
return (new NetBill360)->getWireGuardPeer(12);

// Get the configuration of a peer (for device setup)
return (new NetBill360)->getWireGuardPeerConfig(12);

```

---

## 🧭 Version Guidance

| Version | Status   | Packagist | Namespace | Release                                                                               |
|---------|----------|------------|------------|---------------------------------------------------------------------------------------|
| **1.x** | ✅ Latest | `shiftechafrica/net-bill-360-php-sdk` | `NetBill360\NetBill360ServiceProvider` | [v1.1.0](https://github.com/SHIFTECH-AFRICA/net-bill-360-php-sdk/releases/tag/v1.1.0) |

---

## 🛡️ Security Vulnerabilities

If you discover any security vulnerabilities, please contact:  
📧 **[Bugs](mailto:bugs@shiftech.co.ke)**

---

## 📄 License

This package is open-source software licensed under the  
**[MIT License](https://opensource.org/licenses/MIT)**
