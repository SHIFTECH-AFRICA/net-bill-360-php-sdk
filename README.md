# <p align="center"><a href="https://netkodi.co.ke/" target="_blank"><img width="100" src="https://shiftechafrica.com/img/logo.png" alt="NetKodi - Connect - Bill - Sell - Internet"></a></p>

<p align="center">
  <b>NetKodi - Connect - Bill - Sell - Internet</b><br>
  <a href="https://github.com/SHIFTECH-AFRICA/net-kodi-php-sdk/issues">
    <img src="https://img.shields.io/github/issues/SHIFTECH-AFRICA/net-kodi-php-sdk.svg">
  </a>
  <a href="https://github.com/SHIFTECH-AFRICA/net-kodi-php-sdk/network/members">
    <img src="https://img.shields.io/github/forks/SHIFTECH-AFRICA/net-kodi-php-sdk.svg">
  </a>
  <a href="https://github.com/SHIFTECH-AFRICA/net-kodi-php-sdk/stargazers">
    <img src="https://img.shields.io/github/stars/SHIFTECH-AFRICA/net-kodi-php-sdk.svg">
  </a>
  <a href="https://packagist.org/packages/shiftechafrica/net-kodi-php-sdk">
    <img src="https://poser.pugx.org/shiftechafrica/net-kodi-php-sdk/v/stable">
  </a>
  <a href="https://packagist.org/packages/shiftechafrica/net-kodi-php-sdk">
    <img src="https://poser.pugx.org/shiftechafrica/net-kodi-php-sdk/downloads">
  </a>
  <br><br>
  <img src="https://alphabet.nyc3.cdn.digitaloceanspaces.com/shared/netkodi/netkodi3.png" alt="NetKodi Banner">
</p>

---

## 🚀 Introduction

**NetKodi PHP SDK** provides a simple and efficient interface for interacting with the **NetKodi Networking API** — designed for seamless integration with **Mikrotik**, **NAS**, and **PPPoE servers**.

It helps ISPs and network administrators manage and automate network operations through the NetKodi API.

### Key Features
- 🔌 Real-time user connection and disconnection
- ⚙️ Automated bandwidth management and speed enforcement
- 🧩 Centralized NAS and access server control
- 👥 Customer authentication and session management
- 🧠 Easy Laravel or standalone PHP integration

📘 **Full Documentation:** [https://docs.netkodi.co.ke](https://docs.netkodi.co.ke)

---

## ⚙️ Installation

Install via [Composer](https://getcomposer.org/):

```bash
composer require shiftechafrica/net-kodi-php-sdk
```

Update to the latest version:
```bash
composer update shiftechafrica/net-kodi-php-sdk --lock
```

If not auto-discovered, run:
```bash
composer dump-autoload
```

Publish the configuration file:
```bash
php artisan vendor:publish --provider="NetKodi\NetKodiServiceProvider"
```

The config file will be created at:
```
config/netkodi.php
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

use NetKodi\NetKodi;

/**
 * ----------------------------------------
 *  NetKodi SDK Usage Examples
 * ----------------------------------------
 * Demonstrates how to interact with the
 * NetKodi API using CRUD operations.
 */

/**
 * NAS TYPES & DEVICES
 */
return (new NetKodi)->getNasTypes();
return (new NetKodi)->getAllNas();
return (new NetKodi)->createNas([
    "nasname" => "192.168.88.109",
    "type" => "Huawei",
    "secret" => "secret",
    "port" => 1812,
    "description" => "short description"
]);
return (new NetKodi)->getNas(12);
return (new NetKodi)->deleteNas(12);

/**
 * IP POOLS
 */
return (new NetKodi)->getPools();
return (new NetKodi)->getPool(12);

/**
 * BANDWIDTH PLANS
 */
return (new NetKodi)->getPlans();
return (new NetKodi)->createPlan([
    "plan" => "700MBS",
    "download_limit" => 700,
    "upload_limit" => 700,
    "static_ip" => false
]);
return (new NetKodi)->getPlan(29);

/**
 * CUSTOMERS
 */
return (new NetKodi)->getCustomers();
return (new NetKodi)->createCustomer([
    "plan_id" => 27,
    "username" => "netkodi",
    "password" => "password"
]);
return (new NetKodi)->getCustomer('netkodi');

/**
 * SUBSCRIPTIONS
 */
return (new NetKodi)->getSubscriptions();
return (new NetKodi)->createSubscription([
    "username" => "netkodi",
    "date" => "2025-11-30 23:59:59"
]);
return (new NetKodi)->getSubscription('netkodi');
```

---

## 🧭 Version Guidance

| Version | Status | Packagist | Namespace | Release                                                                           |
|----------|--------|------------|------------|-----------------------------------------------------------------------------------|
| **1.x** | ✅ Latest | `shiftechafrica/net-kodi-php-sdk` | `NetKodi\NetKodiServiceProvider` | [v1.0.1](https://github.com/SHIFTECH-AFRICA/net-kodi-php-sdk/releases/tag/v1.0.1) |

---

## 🛡️ Security Vulnerabilities

If you discover any security vulnerabilities, please contact:  
📧 **[Bugs](mailto:bugs@shiftech.co.ke)**

---

## 📄 License

This package is open-source software licensed under the  
**[MIT License](https://opensource.org/licenses/MIT)**
