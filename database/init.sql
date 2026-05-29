-- GoCar Database Initialization Script
-- Creates all necessary tables for the PHP application
-- Schema aligned with actual PHP application code

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin', 'employee') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_role (role)
);

-- Products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description LONGTEXT,
    price DECIMAL(10, 2) NOT NULL,
    sku VARCHAR(100),
    engine_type VARCHAR(100),
    transmission_type VARCHAR(100),
    category VARCHAR(100),
    image_url VARCHAR(500),
    in_stock BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_name (name),
    INDEX idx_category (category),
    INDEX idx_sku (sku)
);

-- Cart table
CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    UNIQUE KEY unique_cart_item (user_id, product_id),
    INDEX idx_user_id (user_id),
    INDEX idx_product_id (product_id)
);

-- Orders table (aligned with place-order.php)
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    email_or_mobile VARCHAR(100),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    company_name VARCHAR(200),
    address TEXT,
    city VARCHAR(100),
    country VARCHAR(100),
    postal_code VARCHAR(20),
    order_notes TEXT,
    order_time DATETIME,
    total_amount DECIMAL(10, 2) DEFAULT 0,
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    payment_method VARCHAR(100),
    razorpay_order_id VARCHAR(100),
    razorpay_payment_id VARCHAR(100),
    product_name VARCHAR(255),
    quantity INT,
    price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_id (user_id),
    INDEX idx_status (status),
    INDEX idx_razorpay_order_id (razorpay_order_id)
);

-- Order items table (aligned with update-order-items.php)
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_name VARCHAR(255),
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2),
    product_image VARCHAR(500),
    payment_id VARCHAR(100),
    payment_status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    INDEX idx_order_id (order_id),
    INDEX idx_payment_id (payment_id)
);

-- Employee Tasks table (aligned with assign_task.php)
CREATE TABLE IF NOT EXISTS emp_tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lead_id INT,
    lead_type VARCHAR(50),
    employee_id INT,
    assigned_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'pending',
    title VARCHAR(255),
    description LONGTEXT,
    assigned_to INT,
    assigned_by INT,
    due_date DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_employee_id (employee_id),
    INDEX idx_lead_id (lead_id),
    INDEX idx_status (status)
);

-- Mileage requests table (aligned with submit_mileage.php)
CREATE TABLE IF NOT EXISTS mileage_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    email VARCHAR(100),
    contact_number VARCHAR(20),
    zipcode VARCHAR(20),
    notes TEXT,
    make VARCHAR(100),
    model VARCHAR(100),
    category VARCHAR(100),
    year VARCHAR(10),
    submodel VARCHAR(100),
    mileage INT,
    transmission_type VARCHAR(100),
    engine_type VARCHAR(100),
    status VARCHAR(50) DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_id (user_id),
    INDEX idx_status (status)
);

-- Price requests table (aligned with submit_price.php)
CREATE TABLE IF NOT EXISTS price_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    email VARCHAR(100),
    contact_number VARCHAR(20),
    zipcode VARCHAR(20),
    notes TEXT,
    make VARCHAR(100),
    model VARCHAR(100),
    category VARCHAR(100),
    year VARCHAR(10),
    submodel VARCHAR(100),
    product_id INT,
    requested_price DECIMAL(10, 2),
    status VARCHAR(50) DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_id (user_id),
    INDEX idx_status (status)
);

-- Quote requests table (aligned with submit_quote.php)
CREATE TABLE IF NOT EXISTS quote_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    email VARCHAR(100),
    contact_number VARCHAR(20),
    zipcode VARCHAR(20),
    notes TEXT,
    make VARCHAR(100),
    model VARCHAR(100),
    category VARCHAR(100),
    year VARCHAR(10),
    submodel VARCHAR(100),
    engine_type VARCHAR(100),
    transmission_type VARCHAR(100),
    mileage INT,
    other_details LONGTEXT,
    status VARCHAR(50) DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_id (user_id),
    INDEX idx_status (status)
);

-- Leads table
CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    status ENUM('new', 'in_progress', 'completed', 'closed') DEFAULT 'new',
    assigned_to INT,
    notes LONGTEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_status (status),
    INDEX idx_assigned_to (assigned_to)
);

-- Lead notes table
CREATE TABLE IF NOT EXISTS lead_notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lead_id INT NOT NULL,
    note_text LONGTEXT NOT NULL,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_lead_id (lead_id)
);

-- Notes table
CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    content LONGTEXT NOT NULL,
    note_type VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id)
);

-- Custom quote table (aligned with getcustomquote.php)
CREATE TABLE IF NOT EXISTS get_custom_quote (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    zipcode VARCHAR(20),
    preferred_price VARCHAR(50),
    preferred_miles VARCHAR(50),
    notes TEXT,
    need_mechanic VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data for admin and test user
-- Password hash for "admin123": $2y$10$YOW33Z.5E.ym6ZJ3xR3h7OXC/qJNd0zHp1vClHfPU1JdN5Vj6P2Ka
INSERT IGNORE INTO users (id, username, email, password, role) VALUES
    (1, 'admin', 'admin@gocar.com', '$2y$10$YOW33Z.5E.ym6ZJ3xR3h7OXC/qJNd0zHp1vClHfPU1JdN5Vj6P2Ka', 'admin'),
    (2, 'testuser', 'test@gocar.com', '$2y$10$YOW33Z.5E.ym6ZJ3xR3h7OXC/qJNd0zHp1vClHfPU1JdN5Vj6P2Ka', 'user');

-- Insert sample products
INSERT IGNORE INTO products (id, name, description, price, sku, engine_type, transmission_type, category) VALUES
    (1, 'Engine Block - 2000cc', 'Complete engine block assembly for 2000cc engines', 45000.00, 'ENG-2000', '2000cc', 'Manual', 'Engine'),
    (2, 'Transmission Box - Automatic', 'Fully reconditioned automatic transmission', 35000.00, 'TRN-AUTO', 'All', 'Automatic', 'Transmission'),
    (3, 'Alternator - 80A', 'High output alternator for modern vehicles', 5000.00, 'ALT-80A', 'All', 'All', 'Electrical'),
    (4, 'Brake Pads - Front Set', 'OEM quality front brake pads', 2500.00, 'BRK-FRONT', 'All', 'All', 'Brakes');
