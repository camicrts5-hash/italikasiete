-- 1. Asegurar el uso de la base de datos correcta
USE italikasiete;

-- 2. Limpiar la tabla si ya existía para evitar duplicados o errores
DROP TABLE IF EXISTS refacciones;

-- 3. Crear la tabla 'refacciones' con la estructura limpia y correcta
CREATE TABLE refacciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL
);

-- 4. Inserción masiva de los 50 registros reales del proyecto Italika Siete
INSERT INTO refacciones (nombre, precio, stock) VALUES
('Balatas Delanteras Italika', 250.50, 15),
('Llantas 120/70-17 traseras', 1250.00, 10),
('Bateria de gel 12V', 350.50, 150),
('Kit de Cilindro 125cc', 1450.00, 50),
('Carburador P227', 450.00, 12),
('Amortiguador trasero de fuerza', 900.00, 31),
('Cadena de traccion 428H', 320.00, 25),
('Espejos laterales deportivos', 280.00, 30),
('Disco de freno delantero', 550.00, 14),
('Caliper de freno completo', 720.00, 6),
('Chicote de embrague', 85.00, 45),
('Chicote de acelerador', 85.00, 40),
('Pedal de arranque cromado', 180.00, 18),
('Palanca de cambios', 150.00, 25),
('Faro principal LED', 550.00, 9),
('Direccionales traseras (par)', 210.00, 22),
('Mando derecho arranque', 340.00, 11),
('Mando izquierdo luces', 340.00, 11),
('Bobina de encendido racing', 290.00, 16),
('CDI de alta rendimiento', 330.00, 13),
('Regulador de voltaje', 220.00, 10),
('Estator de 8 polos', 550.00, 7),
('Marcha de motor', 890.00, 5),
('Switch de encendido con llaves', 310.00, 15),
('Tapa de tanque de gasolina', 180.00, 20),
('Asiento para FT150', 550.00, 4),
('Salpicadera delantera negra', 390.00, 8),
('Parrilla de carga trasera', 480.00, 12),
('Juego de empaques de motor', 220.00, 35),
('Valvulas de admision y escape', 195.00, 20),
('Arbol de levas', 410.00, 10),
('Bomba de aceite', 280.00, 15),
('Engrane de distribucion', 130.00, 25),
('Piston con anillos estandar', 350.00, 18),
('Rines de Aspas Delantero', 1450.00, 6),
('Rines de Aspas Trasero', 1600.00, 4),
('Tubo de escape deportivo', 1250.00, 5),
('Camara de llanta 18', 110.00, 40),
('Puños de manubrio goma', 75.00, 50),
('Cable de bujia reforzado', 75.00, 48),
('Bujia NGK C7HSA', 45.00, 200),
('Filtro de aire de alto flujo', 160.00, 30),
('Filtro de gasolina de cristal', 45.00, 80),
('Aceite Motul 4T 20W50', 185.00, 60),
('Retenes de barral delantero', 90.00, 24),
('Resortes de embrague', 120.00, 15),
('Pasta de embrague (Kit)', 290.00, 18),
('Eje de rueda delantero', 110.00, 12),
('Parador lateral negro', 140.00, 14),
('Balero de maza 6301', 55.00, 100);
