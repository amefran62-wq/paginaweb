<?php
// test_db.php - VERSIÓN SIMPLIFICADA
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🧪 Prueba de Conexión Simplificada</h1>";

// Verificar si PDO está disponible
if (!class_exists('PDO')) {
    echo "❌ <strong>Error:</strong> PDO no está disponible en esta instalación de PHP<br>";
    echo "PHP Version: " . phpversion() . "<br>";
    echo "Extensions cargadas: " . implode(', ', get_loaded_extensions()) . "<br>";
    exit;
}

echo "✅ PDO está disponible<br>";

// Verificar si pdo_mysql está disponible
if (!in_array('pdo_mysql', PDO::getAvailableDrivers())) {
    echo "❌ <strong>Error:</strong> El driver pdo_mysql NO está disponible<br>";
    echo "Drivers PDO disponibles: " . implode(', ', PDO::getAvailableDrivers()) . "<br>";
    exit;
}

echo "✅ Driver pdo_mysql está disponible<br><br>";

// Intentar conexión
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=xlearning_db;charset=utf8mb4",
        'root',
        ''
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✅ <strong>Conexión exitosa</strong> a la base de datos<br><br>";
    
    // Listar tablas
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "📋 <strong>Tablas encontradas:</strong><br>";
    foreach ($tables as $table) {
        echo "• $table<br>";
    }
    
    // Contar usuarios
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM usuarios");
    $total = $stmt->fetch()['total'];
    echo "<br>👥 <strong>Total de usuarios:</strong> $total<br>";
    
} catch (PDOException $e) {
    echo "❌ <strong>Error de conexión:</strong> " . $e->getMessage() . "<br>";
    echo "Código de error: " . $e->getCode() . "<br>";
}
?>