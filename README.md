# <p align="center"><a href="https://netbill360.com/" target="_blank"><img width="100" src="https://shiftechafrica.com/img/logo.png" alt="NetBill360 - Connect - Bill - Sell - Internet"></a></p>

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

**NetBill360 PHP SDK** provides a simple and efficient interface for interacting with the **NetBill360 Networking API** — designed for seamless integration with **Mikrotik**, **NAS**, and **PPPoE servers**.

It helps ISPs and network administrators manage and automate network operations through the NetBill360 API.

### Key Features
- 🔌 Real-time user connection and disconnection
- ⚙️ Automated bandwidth management and speed enforcement
- 🧩 Centralized NAS and access server control
- 👥 Customer authentication and session management
- 🧠 Easy Laravel or standalone PHP integration

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
NET_KODI_API_TOKEN=your_api_token_here
```

---

## 🧩 Usage

Use the SDK to manage NAS devices, IP pools, bandwidth plans, customers, and subscriptions.

```php
<?php

use NetBill360\NetBill360;

/**
 * ----------------------------------------
 *  NetBill360 SDK Usage Examples
 * ----------------------------------------
 * Demonstrates how to interact with the
 * NetBill360 API using CRUD operations.
 */

/**
 * NAS TYPES & DEVICES
 */
return (new NetBill360)->getNasTypes();
return (new NetBill360)->getAllNas();
return (new NetBill360)->createNas([
    "nasname" => "192.168.88.109",
    "type" => "Huawei",
    "secret" => "secret",
    "port" => 1812,
    "description" => "short description"
]);
return (new NetBill360)->getNas(12);
return (new NetBill360)->deleteNas(12);

/**
 * IP POOLS
 */
return (new NetBill360)->getPools();
return (new NetBill360)->getPool(12);

/**
 * BANDWIDTH PLANS
 */
return (new NetBill360)->getPlans();
return (new NetBill360)->createPlan([
    "plan" => "700MBS",
    "download_limit" => 700,
    "upload_limit" => 700,
    "static_ip" => false
]);
return (new NetBill360)->getPlan(29);

/**
 * CUSTOMERS
 */
return (new NetBill360)->getCustomers();
return (new NetBill360)->createCustomer([
    "plan_id" => 27,
    "username" => "netbill360",
    "password" => "password"
]);
return (new NetBill360)->getCustomer('netbill360');

/**
 * SUBSCRIPTIONS
 */
return (new NetBill360)->getSubscriptions();
return (new NetBill360)->createSubscription([
    "username" => "netbill360",
    "date" => "2025-11-30 23:59:59"
]);
return (new NetBill360)->getSubscription('netbill360');
```

---

## 🧭 Version Guidance

| Version | Status | Packagist | Namespace | Release                                                                               |
|----------|--------|------------|------------|---------------------------------------------------------------------------------------|
| **1.x** | ✅ Latest | `shiftechafrica/net-bill-360-php-sdk` | `NetBill360\NetBill360ServiceProvider` | [v1.0.0](https://github.com/SHIFTECH-AFRICA/net-bill-360-php-sdk/releases/tag/v1.0.0) |

---

## 🛡️ Security Vulnerabilities

If you discover any security vulnerabilities, please contact:  
📧 **[Bugs](mailto:bugs@shiftech.co.ke)**

---

## 📄 License

This package is open-source software licensed under the  
**[MIT License](https://opensource.org/licenses/MIT)**
