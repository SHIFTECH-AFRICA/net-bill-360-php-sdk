# <p align="center"><a href="https://netbill360.com/" target="_blank"><img width="200" src="https://alphabet.nyc3.cdn.digitaloceanspaces.com/shared/netbill360/logo-white.png" alt="NetBill360"></a></p>

<p align="center">
  <b>NetBill360 — Connect · Bill · Sell · Internet</b><br><br>
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

## 🚀 What Is This?

The **NetBill360 PHP SDK** is a developer-friendly library that lets you interact with the **NetBill360 Networking API** using clean PHP code.

It's built specifically for **Internet Service Providers (ISPs)** and **network administrators** who want to automate and manage:

- Mikrotik routers
- NAS (Network Access Servers)
- PPPoE servers
- WireGuard VPN setups

Instead of manually logging in to devices or writing raw API calls, this SDK gives you simple PHP methods to handle everything in one place.

---

## ✨ Key Features

| Feature | Description |
|---|---|
| 🔌 **Connect / Disconnect Users** | Manage active user sessions in real-time |
| ⚙️ **Bandwidth Management** | Apply and enforce speed limits dynamically |
| 🧩 **NAS Device Control** | Manage all your NAS devices from one interface |
| 👥 **Customer Management** | Create, authenticate, and track user accounts |
| 🌐 **WireGuard VPN** | Automate VPN interface and peer configuration |
| 💾 **IP Pool Management** | Assign and monitor IP addresses across devices |
| 🔒 **Secure API Communication** | Built-in authentication and request security |
| 📊 **Monitoring & Reporting** | Real-time stats for users, plans, and interfaces |
| 🧠 **Easy Integration** | Works with Laravel or standalone PHP projects |

📘 **Full Documentation:** [https://docs.netbill360.com](https://docs.netbill360.com)

---

## ⚙️ Installation

> **Requirement:** [Composer](https://getcomposer.org/) must be installed.

### Step 1 — Install the package

```bash
composer require shiftechafrica/net-bill-360-php-sdk
```

### Step 2 — Update to the latest version (optional)

```bash
composer update shiftechafrica/net-bill-360-php-sdk --lock
```

### Step 3 — Refresh the autoloader (if classes aren't found)

```bash
composer dump-autoload
```

### Step 4 — Publish the config file (Laravel only) (optional)

```bash
php artisan vendor:publish --provider="NetBill360\NetBill360ServiceProvider"
```

This creates the file: `config/netbill360.php`

### Step 5 — Add your API token

Open your `.env` file and add:

```dotenv
NET_BILL_360_API_TOKEN=your_api_token_here
```

> You can find your API token in your NetBill360 dashboard.

---

## 🧩 Usage Guide

Below are practical examples organized by feature area. Each section shows how to **list**, **create**, **update**, **fetch**, and **delete** records.

```php
<?php

use NetBill360\NetBill360;

// All SDK methods are called on a new instance of NetBill360
$sdk = new NetBill360();
```

---

### 🖥️ NAS Types & Devices

> NAS devices are the servers that authenticate your users onto the network (e.g. Mikrotik, Cisco, Huawei).

```php
// Get a list of all supported NAS device types.
// Returns: ["MikroTik", "Cisco", "Huawei", "UBNT Access Point", ...]
$sdk->getNasTypes();

// Get all NAS devices registered in your account
$sdk->getAllNas();

// Add a new NAS device to your account
$sdk->createNas([
    "nasname"     => "192.168.88.109", // IP address of the NAS device
    "type"        => "Huawei",         // Must match one of the supported types
    "secret"      => "secret",         // Shared secret used for authentication
    "port"        => 1812,             // Default RADIUS port
    "description" => "Main HQ NAS"    // Optional human-readable label
]);

// Update an existing NAS device (replace 12 with the actual device ID)
$sdk->updateNas([
    "type"        => "VAS Experts",
    "secret"      => "new_secret",
    "port"        => 1812,
    "description" => "Updated HQ NAS"
], 12);

// Fetch details of a specific NAS device by its ID
$sdk->getNas(12);

// Permanently remove a NAS device by its ID
$sdk->deleteNas(12);
```

---

### 🌐 IP Pools

> IP pools are groups of IP addresses that get assigned to users or devices on your network.

```php
// List all IP pools in your account
$sdk->getPools();

// Fetch details of a specific IP pool by ID
$sdk->getPool(12);

// Delete an IP pool by ID (use with caution — active IPs may be affected)
$sdk->deletePool(12);
```

---

### 📡 Connection Report

> Get active PPPoE connection report grouped by NAS/device

```php
// Get active pppoe connections reports
$sdk->pppoeConnectionReport();
```

---

### 📊 Fair Usage Policy (FUP) — Data & Time

> FUP checks help you protect your network from heavy usage on lower-tier plans.

```php
// Check how much data a specific user has consumed in a date range
$sdk->getDataUsage([
    "username"  => "netbill360",
    "from_date" => "2025-10-27 00:00:00.000", // Start of the period
    "to_date"   => "2025-10-27 23:59:59.000"  // End of the period
]);

// Check how much time a specific user has been connected in a date range
$sdk->getTimeUsage([
    "username"  => "netbill360",
    "from_date" => "2025-10-27 00:00:00.000",
    "to_date"   => "2025-10-27 23:59:59.000"
]);
```

---

### 📶 Bandwidth Plans

> Plans define the download/upload speed limits and connection rules assigned to customers.

```php
// Get all bandwidth plans
$sdk->getPlans();

// Create a new bandwidth plan
$sdk->createPlan([
    "plan"           => "700Mbps Basic",  // Plan name (shown to admins/customers)
    "download_limit" => 700,              // Download speed in Mbps
    "upload_limit"   => 700,             // Upload speed in Mbps
    "static_ip"      => false,           // Set true if this plan uses a fixed IP address
    "bandwidth_type" => "dedicated",     // "dedicated" = full speed, "shared" = split among users
    "ip"             => "192.0.0.1",     // Required only if static_ip is true
    "devices"        => 1               // Max devices allowed per PPPoE connection
]);

// Update an existing plan by its ID
$sdk->updatePlan([
    "plan"           => "500Mbps Shared",
    "download_limit" => 500,
    "upload_limit"   => 500,
    "static_ip"      => false,
    "bandwidth_type" => "shared",
    "ip"             => "192.0.0.1",
    "devices"        => 5
], 29); // <-- Plan ID to update

// Get details for a specific plan
$sdk->getPlan(29);

// Delete a plan (make sure no active customers are using it first)
$sdk->deletePlan(29);
```

---

### 👤 Customers

> Customers are individual network users. Each customer is tied to a plan and has login credentials.

```php
// Get all customers in your account
$sdk->getCustomers();

// Create a new customer account
$sdk->createCustomer([
    "plan_id"      => 27,         // The ID of the bandwidth plan to assign
    "username"     => "netbill360",
    "password"     => "securepassword",
    "service_type" => "pppoe",    // "pppoe", "hotspot", or "static"
    "ip_address"   => "",         // Required only if service_type is "static"
    "port_limit"   => 1,          // Required only if service_type is "hotspot"
    "devices"      => 1           // Max simultaneous device connections
]);

// Update an existing customer's details
$sdk->updateCustomer([
    "plan_id"      => 27,
    "username"     => "netbill360",
    "password"     => "newpassword",
    "service_type" => "pppoe",
    "ip_address"   => "",
    "port_limit"   => 1,
    "devices"      => 1
]);

// Get full details for a specific customer by their username
$sdk->getCustomer('netbill360');

// Check if a customer is currently online
$sdk->getCustomerOnlineStatus('netbill360');

// Force-disconnect all active devices/routers for a customer
$sdk->disconnectCustomerDevices('netbill360');

// Get a list of all devices currently connected for a customer
$sdk->connectedCustomerDevices('netbill360');

// Permanently delete a customer account by username
$sdk->deleteCustomer('netbill360');
```

---

### 🗓️ Subscriptions

> Subscriptions link a customer to a plan for a set period. When a subscription expires, access is automatically cut off.

```php
// List all active and past subscriptions
$sdk->getSubscriptions();

// Create a new subscription for a customer (sets their access expiry date)
$sdk->createSubscription([
    "username" => "netbill360",
    "date"     => "2025-11-30 23:59:59", // Access expires at the end of this date/time
    "timezone" => "Africa/Nairobi" // optional - Use a valid IANA timezone
]);

// Update (extend or change) a customer's subscription expiry
$sdk->updateSubscription([
    "username" => "netbill360",
    "date"     => "2025-12-31 23:59:59", // New expiry date
    "timezone" => "Africa/Nairobi" // optional - Use a valid IANA timezone
]);

// Get a specific customer's subscription details
$sdk->getSubscription('netbill360');

// Remove a subscription (customer will lose access)
$sdk->deleteSubscription('netbill360');
```

---

### 🔐 WireGuard — Interfaces

> WireGuard interfaces are the VPN entry points your clients connect to. Think of them as VPN servers.

```php
// Get all WireGuard interfaces configured in your account
$sdk->getWireGuardInterfaces();

// Create a new WireGuard VPN interface
$sdk->createWireGuardInterface([
    "name"        => "Office VPN",   // Friendly name for this interface
    "subnet_base" => "10.11.5.0",   // Base IP of the VPN subnet
    "subnet_cidr" => 24,            // Subnet mask (24 = 255.255.255.0)
    "listen_port" => 60000,         // UDP port WireGuard listens on
    "enabled"     => true           // Whether this interface is active
]);

// Update an existing WireGuard interface by its ID
$sdk->updateWireGuardInterface([
    "name"    => "Updated Office VPN",
    "enabled" => true
], 12); // <-- Interface ID

// Fetch details of a specific interface
$sdk->getWireGuardInterface(12);

// Get connection status and activity logs for a specific interface
$sdk->getWireGuardInterfaceStatus(12);
```

---

### 🔗 WireGuard — Peers

> Peers are individual client devices connected to a WireGuard interface. Each peer has a unique public key.

```php
// Get all registered WireGuard peers
$sdk->getWireGuardPeers();

// Register a new peer (client device) on a WireGuard interface
$sdk->createWireGuardPeer([
    "wire_guard_id" => 1,                          // ID of the interface this peer belongs to
    "name"          => "John's Laptop",            // Friendly label for this peer
    "public_key"    => "8chOvnXg/Xl4jDPOmwFSVLddIs8=", // Client's WireGuard public key
    "assigned_ip"   => "10.11.5.2",               // Static IP assigned to this peer within the VPN subnet
    "status"        => true                        // Whether this peer is allowed to connect
]);

// Update an existing peer's configuration by its ID
$sdk->updateWireGuardPeer([
    "name"       => "John's Work Laptop",
    "status"     => true,
    "public_key" => "4iUWTridPn67tVMWLBINn/ZR0lDU6byeVZoPZA4o12I=" // New key if client rotated it
], 12); // <-- Peer ID

// Get full details of a specific peer
$sdk->getWireGuardPeer(12);

// Get the WireGuard config file content for a peer (used to set up the client device)
$sdk->getWireGuardPeerConfig(12);
```

---

## 🧭 Version Reference

| Version | Status | Package | Namespace | Latest Release                                                                        |
|---|---|---|---|---------------------------------------------------------------------------------------|
| **1.x** | ✅ Active | `shiftechafrica/net-bill-360-php-sdk` | `NetBill360\NetBill360ServiceProvider` | [v1.1.6](https://github.com/SHIFTECH-AFRICA/net-bill-360-php-sdk/releases/tag/v1.1.7) |

---

## 🛡️ Reporting Security Issues

If you discover a security vulnerability, please report it privately to avoid exposing users to risk.

📧 **[bugs@shiftech.co.ke](mailto:bugs@shiftech.co.ke)**

Please do **not** open a public GitHub issue for security-related problems.

---

## 📄 License

This package is open-source software released under the **[MIT License](https://opensource.org/licenses/MIT)**.

You are free to use, modify, and distribute it in your own projects.
