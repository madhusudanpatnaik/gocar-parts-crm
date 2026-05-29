# GoCar - E-Commerce Car Parts Application

## 🚀 Application Successfully Running!

Your GoCar PHP application is now running in Docker containers.

### 📊 Project Overview

**GoCar** is a full-featured car parts e-commerce platform with an integrated CRM system built with:
- **Backend**: PHP 8.3
- **Database**: MySQL 8.0
- **Frontend**: Bootstrap 5, Vanilla JavaScript
- **Payment Gateway**: Razorpay

---

## 🌐 Access URLs

### Customer E-Commerce Frontend
- **Homepage**: http://localhost/gocarparts-main/index.php
- **Login**: http://localhost/gocarparts-main/loginpage.php
- **Register**: http://localhost/gocarparts-main/register.php
- **Products**: http://localhost/gocarparts-main/product.php
- **Shop**: http://localhost/gocarparts-main/shop-list.php
- **Cart**: http://localhost/gocarparts-main/cart.php
- **Checkout**: http://localhost/gocarparts-main/checkout.php

### Admin Dashboard (CRM)
- **Admin Panel**: http://localhost/crm1/index.PHP
- **Leads Management**: http://localhost/crm1/leads_admin.php
- **Product Management**: http://localhost/crm1/add_product.php
- **Inventory**: http://localhost/crm1/inventory.php
- **Employee Management**: http://localhost/crm1/manage_employees.php

---

## 👤 Test Credentials

### Admin User
- **Email**: admin@gocar.com
- **Password**: admin123
- **Role**: Admin

### Regular User
- **Email**: test@gocar.com
- **Password**: admin123
- **Role**: User

---

## 🗄️ Database Information

### Connection Details
- **Host**: mysql
- **Port**: 3306 (port 3306 on host machine via Docker)
- **Username**: root
- **Password**: REDACTED
- **Database**: REDACTED_DB

### Database Tables
- `users` - User accounts (customers, admins, employees)
- `products` - Product catalog
- `cart` - Shopping cart items
- `orders` - Customer orders
- `order_items` - Order line items
- `leads` - Sales leads
- `lead_notes` - Notes on leads
- `emp_tasks` - Employee tasks
- `mileage_requests` - Vehicle mileage requests
- `price_requests` - Price quote requests
- `quote_requests` - Custom quote requests
- `notes` - General notes

---

## 🐳 Docker Setup

### Running Containers
```bash
# Currently running:
gocar-app   - PHP 8.3 Apache web server (Port 80, 443)
gocar-db    - MySQL 8.0 database (Port 3306)
```

### Docker Commands

**Start the application**:
```bash
cd /Users/we45/Downloads/GoCar
docker-compose up
```

**Build and start**:
```bash
cd /Users/we45/Downloads/GoCar
docker-compose up --build
```

**Stop the application**:
```bash
docker-compose down
```

**View logs**:
```bash
docker-compose logs -f
```

**Access MySQL CLI**:
```bash
docker exec -it gocar-db mysql -uroot -pREDACTED -D REDACTED_DB
```

---

## 🎯 Key Features

### For Customers
✅ Browse car parts catalog  
✅ Search products by vehicle (engine, transmission)  
✅ Shopping cart functionality  
✅ Secure checkout with Razorpay payment integration  
✅ Order management  
✅ User account management  
✅ Get custom quotes  

### For Admin/Staff
✅ Product management (add, edit, delete)  
✅ Inventory tracking  
✅ Lead management system  
✅ Employee task assignment  
✅ User management  
✅ Order processing  
✅ Quote management  

---

## 📁 Directory Structure

```
GoCar/
├── gocarparts-main/         # Customer-facing e-commerce store
│   ├── index.php            # Homepage
│   ├── login.php            # Login handler
│   ├── register.php         # Registration handler
│   ├── product.php          # Product listing
│   ├── checkout.php         # Checkout page
│   ├── create-order.php     # Razorpay order creation
│   ├── cart.php             # Shopping cart
│   └── assets/              # CSS, JavaScript, images
│
├── crm1/                    # Admin CRM Dashboard
│   ├── index.PHP            # Dashboard home
│   ├── leads_admin.php      # Lead management
│   ├── add_product.php      # Add products
│   ├── inventory.php        # Inventory tracking
│   └── manage_employees.php # Staff management
│
├── docker-compose.yml       # Docker Compose configuration
├── Dockerfile              # PHP Apache Docker image
└── database/
    └── init.sql            # Database initialization script
```

---

## 🔧 Configuration Files Modified for Docker

All database connection strings have been updated to use Docker service names:
- **Host**: `mysql` (Docker service)
- **User**: `root`
- **Password**: `REDACTED`

Files updated:
- `gocarparts-main/db.php`
- `gocarparts-main/login.php`
- `gocarparts-main/register.php`
- All other PHP files with database connections

---

## 🛠️ Development Notes

### Application Stack
- **PHP Version**: 8.3
- **MySQL Version**: 8.0
- **Apache Modules**: rewrite, ssl
- **PHP Extensions**: mysqli, pdo_mysql

### Key Integrations
1. **Razorpay Payment Gateway** - Handles online payments
2. **Session Management** - User authentication via PHP sessions
3. **Password Security** - Uses `password_hash()` for encryption

### Database Schema
- Uses InnoDB tables with proper indexing
- Supports role-based access (user, admin, employee)
- Tracks timestamps for all major operations

---

## 🐛 Troubleshooting

### If containers won't start
```bash
# Check Docker daemon
docker ps

# Rebuild containers
docker-compose down
docker-compose up --build
```

### Check database connection
```bash
docker exec -it gocar-db mysql -uroot -pREDACTED -D REDACTED_DB -e "SHOW TABLES;"
```

### View PHP error logs
```bash
docker exec -it gocar-app tail -f /var/log/apache2/error.log
```

### Access container shell
```bash
docker exec -it gocar-app /bin/bash
docker exec -it gocar-db /bin/bash
```

---

## 📝 Next Steps

1. **Test Customer Flow**: Register as a new user and test shopping
2. **Admin Access**: Login as admin to manage products and leads
3. **Product Management**: Add new products from the admin panel
4. **Lead Management**: Test CRM lead tracking features
5. **Payment Testing**: Use Razorpay test credentials for payments

---

## 📞 API Endpoints

Key PHP endpoints (no REST API - traditional PHP MVC):
- POST `/gocarparts-main/login.php` - User authentication
- POST `/gocarparts-main/register.php` - User registration
- POST `/gocarparts-main/add-to-cart.php` - Add item to cart
- POST `/gocarparts-main/create-order.php` - Create Razorpay order
- GET `/gocarparts-main/product.php` - View products
- POST `/crm1/add_product.php` - Add product (Admin)

---

**Application Status**: ✅ **RUNNING**  
**Database Status**: ✅ **CONNECTED**  
**Last Updated**: May 28, 2026

For more information, check the individual PHP files and database schema in the [database/init.sql](database/init.sql) file.