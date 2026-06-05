<?php
require_once 'conexion.php';

try {
    $sql = "SELECT * FROM miembros ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $miembros = $stmt->fetchAll();
} catch (PDOException $e) {
    $miembros = [];
    $error = $e->getMessage();
}
?>

<?php include 'header.php'; ?>

<div style="padding: 20px; text-align: center;">
    <h1 style="color: #d4af37;">BTS: Integrantes</h1>

    <a href="form.php" class="btn-tarjeta">Nuevo Integrante</a>
</div>

<div class="cards-grid">

<?php if (empty($miembros)): ?>

    <p style="text-align:center; color:#aaa;">
        No hay miembros registrados aún 💔
    </p>

<?php else: ?>

    <?php foreach ($miembros as $m): ?>

        <div class="x-card">

            <div class="card-header">
                <?php echo htmlspecialchars($m['nombre']); ?>
            </div>

            <div class="card-img-container">
                <?php
                if (!empty($m['foto'])) {
                    $base64 = base64_encode($m['foto']);
                    echo '<img src="data:image/jpeg;base64,' . $base64 . '" class="card-img">';
                } else {
                    echo '<div style="color:white; padding:20px;">Sin Foto</div>';
                }
                ?>
            </div>

            <div class="card-body">

                <div class="card-stat">
                    <span class="stat-label">Nombre:</span>
                    <span><?php echo htmlspecialchars($m['nombre']); ?></span>
                </div>

                <div class="card-stat">
                    <span class="stat-label">Nombre Real:</span>
                    <span><?php echo htmlspecialchars($m['nombre_real']); ?></span>
                </div>

                <div class="card-stat">
                    <span class="stat-label">Nacionalidad:</span>
                    <span><?php echo htmlspecialchars($m['nacionalidad']); ?></span>
                </div>

                <div class="card-stat">
                    <span class="stat-label">Posición:</span>
                    <span><?php echo htmlspecialchars($m['posicion'] ?? 'N/A'); ?></span>
                </div>

            </div>

        </div>

    <?php endforeach; ?>

<?php endif; ?>

    </div>