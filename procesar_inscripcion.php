<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "tfg");

if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$id_usuario = $_SESSION['usuario_id']; // Asumiendo que el ID del usuario está almacenado en la sesión
$id_sesion = $_POST['id_sesion']; // ID de la sesión de entrenamiento

// Verificar que el usuario tiene la mensualidad pagada
$consulta_pago = "SELECT EstadoPago FROM inscripciones WHERE IDUsuario = $id_usuario";
$resultado_pago = mysqli_query($conexion, $consulta_pago);

if ($resultado_pago) {
    $fila_pago = mysqli_fetch_assoc($resultado_pago);
    if ($fila_pago['EstadoPago'] == 'pagado') {
        // Actualizar el aforo de la sesión
        $consulta_aforo = "UPDATE sesionesentrenamiento SET Aforo = Aforo - 1 WHERE ID = $id_sesion AND Aforo > 0";
        if (mysqli_query($conexion, $consulta_aforo) && mysqli_affected_rows($conexion) > 0) {
            // Registrar la inscripción
            $fecha_inscripcion = date('Y-m-d H:i:s');
            $consulta_inscripcion = "INSERT INTO inscripciones (IDUsuario, FechaInscripcion, EstadoPago, TipoPlan) VALUES ($id_usuario, '$fecha_inscripcion', 'pagado', 'mensual')";
            if (mysqli_query($conexion, $consulta_inscripcion)) {
                echo json_encode(['success' => true, 'message' => 'Inscripción exitosa']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al registrar la inscripción']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Aforo completo o error al actualizar el aforo']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Mensualidad no pagada']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error al verificar el estado de pago']);
}

mysqli_close($conexion);
?>
