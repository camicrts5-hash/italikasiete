<?php
session_start();
// Control de sesión exigido
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
include 'config.php';

// CREATE (Operación de Alta usando 'stock')
if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    
    // Se removió el campo descripción que no pertenece a la tabla actual
    $sql = "INSERT INTO refacciones (nombre, precio, stock) VALUES ('$nombre', '$precio', '$stock')";
    $conn->query($sql);
}

// DELETE (Operación de Baja con redirección limpia)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM refacciones WHERE id=$id");
    header('Location: admin.php');
    exit();
}

// UPDATE (Operación de Modificación corrigiendo el Error 500)
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    
    // Se unificaron las columnas con la estructura limpia de la base de datos
    $sql = "UPDATE refacciones SET nombre='$nombre', precio='$precio', stock='$stock' WHERE id=$id";
    $conn->query($sql);
    header('Location: admin.php');
    exit();
}

// READ (Consulta de los 50 registros asignados)
$resultado = $conn->query("SELECT * FROM refacciones LIMIT 50");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - CRUD Refacciones</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; margin: 20px; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #1d3557; color: white; }
        .btn { padding: 5px 10px; margin: 2px; text-decoration: none; border-radius: 3px; display: inline-block; }
        .btn-editar { background: #ffc107; color: black; }
        .btn-eliminar { background: #e63946; color: white; }
        .formulario { background: #e9ecef; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        input { padding: 8px; margin: 5px; width: 200px; }
        button { padding: 8px 15px; background: #1d3557; color: white; border: none; border-radius: 3px; cursor: pointer; }
        button:hover { background: #457b9d; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏍️ Gestión de Refacciones Camila</h1>
        <a href="logout.php">Cerrar Sesión</a>

        <div class="formulario">
            <h3>➕ Agregar Nueva Refacción</h3>
            <form method="post">
                <input type="text" name="nombre" placeholder="Nombre de Refacción" required>
                <input type="number" step="0.01" name="precio" placeholder="Precio" required>
                <input type="number" name="stock" placeholder="Stock / Cantidad" required>
                <button type="submit" name="crear">Guardar</button>
            </form>
        </div>

        <h3>📋Inventario italika</h3>
        <table>
            <tr>
                <th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th>
            </tr>
            <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                <td>$<?php echo number_format($fila['precio'], 2); ?></td>
                <td><?php echo $fila['stock']; ?></td>
                <td>
                    <a href="?edit=<?php echo $fila['id']; ?>" class="btn btn-editar">Editar</a>
                    <a href="?delete=<?php echo $fila['id']; ?>" class="btn btn-eliminar" onclick="return confirm('¿Seguro que deseas eliminar esta refacción?');">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php if (isset($_GET['edit'])): 
            $id_edit = $_GET['edit'];
            $result_edit = $conn->query("SELECT * FROM refacciones WHERE id=$id_edit");
            if ($result_edit && $result_edit->num_rows > 0):
                $row_edit = $result_edit->fetch_assoc();
        ?>
        <div class="formulario">
            <h3>✏️ Editar Refacción (UPDATE)</h3>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $row_edit['id']; ?>">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($row_edit['nombre']); ?>" required>
                <label>Precio:</label>
                <input type="number" step="0.01" name="precio" value="<?php echo $row_edit['precio']; ?>" required>
                <label>Stock:</label>
                <input type="number" name="stock" value="<?php echo $row_edit['stock']; ?>" required>
                <button type="submit" name="actualizar">Actualizar</button>
            </form>
        </div>
        <?php endif; endif; ?>
    </div>
</body>
</html>
