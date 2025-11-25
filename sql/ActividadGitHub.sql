CREATE DATABASE IF NOT EXISTS ActividadGitHub;
USE ActividadGitHub;

-- ================================
-- TABLA DE USUARIOS
-- ================================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(150) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- ================================
-- TABLA DE PRODUCTOS
-- ================================
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    articulo VARCHAR(150) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    nombre VARCHAR(150) NOT NULL,
    proveedor VARCHAR(150) NOT NULL,
    marca VARCHAR(100) NULL,
    modelo VARCHAR(100) NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    cantidad INT NOT NULL,
    fecha_ingreso DATE,
    estado VARCHAR(50)
);

-- ================================
-- INSERTS
-- ================================
INSERT INTO productos (articulo, categoria, nombre, proveedor, marca, modelo, descripcion, precio, cantidad, fecha_ingreso, estado)
VALUES
('Laptop Gamer', 'Tecnología', 'Laptop Nitro 5', 'Acer', 'Acer', 'AN515', 'Laptop gamer i5 con GPU GTX', 55000.00, 10, '2025-01-15', 'Activo'),
('Mouse Inalámbrico', 'Accesorios', 'Mouse Logitech M170', 'Logitech', 'Logitech', 'M170', 'Mouse inalámbrico óptico', 850.00, 50, '2025-01-20', 'Activo'),
('Teclado Mecánico', 'Accesorios', 'Teclado Redragon Kumara', 'Redragon', 'Redragon', 'K552', 'Teclado mecánico retroiluminado', 3200.00, 25, '2025-02-02', 'Activo'),
('Smartphone', 'Electrónica', 'Samsung A34', 'Samsung', 'Samsung', 'A34', 'Teléfono inteligente Android', 22000.00, 15, '2025-02-10', 'Activo'),
('Auriculares Bluetooth', 'Audio', 'Sony WH-CH510', 'Sony', 'Sony', 'CH510', 'Audífonos inalámbricos', 4200.00, 18, '2025-02-11', 'Activo'),
('Monitor LED 24"', 'Pantallas', 'Dell SE2419H', 'Dell', 'Dell', 'SE2419H', 'Monitor LED Full HD', 12800.00, 12, '2025-01-30', 'Activo'),
('Impresora Multifuncional', 'Oficina', 'HP DeskJet 2775', 'HP', 'HP', '2775', 'Impresora multifuncional WiFi', 7800.00, 8, '2025-01-18', 'Activo'),
('Memoria USB 64GB', 'Almacenamiento', 'USB Kingston', 'Kingston', 'Kingston', 'DT100', 'Memoria USB 3.0', 950.00, 60, '2025-02-05', 'Activo'),
('Cámara Web 1080p', 'Accesorios', 'Webcam Nexxt', 'Nexxt', 'Nexxt', 'FHD100', 'Cámara web Full HD', 2100.00, 22, '2025-02-12', 'Activo'),
('Tablet 10"', 'Electrónica', 'Lenovo Tab M10', 'Lenovo', 'Lenovo', 'TB-X505', 'Tablet Android 10"', 15000.00, 9, '2025-02-08', 'Activo');
