<?php
// Configuración básica de precios por gramo en USD (Valores editables)
$precio_base_24k = 70.000; // Precio por gramo de oro 24k

$resultado = null;

// Procesar el formulario si se envía mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gramos = floatval($_POST['gramos']);
    $kilates = intval($_POST['kilates']);
    $operacion = $_POST['operacion'];

    if ($gramos > 0) {
        // Porcentaje de pureza según el kilataje
        $pureza = $kilates / 24;
        
        // Ajuste según sea Compra o Venta
        $factor_operacion = ($operacion == 'compra') ? 0.90 : 1.10; // 10% margen
        
        // Cálculo del total
        $total = $gramos * ($precio_base_24k * $pureza) * $factor_operacion;
        $resultado = number_format($total, 3);
    }
}
?>

<div class="calc-card" id="cotizador">
    <h2>Cotizador de Oro</h2>
    <form action="index.php#cotizador" method="POST">
        
        <div class="form-group">
            <label for="operacion">Tipo de Transacción:</label>
            <select name="operacion" id="operacion" required>
                <option value="compra">Quiero Venderle a la Tienda (Nosotros Compramos)</option>
                <option value="venta">Quiero Comprar Oro (Nosotros Vendemos)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kilates">Kilataje (Pureza):</label>
            <select name="kilates" id="kilates" required>
                <option value="24">24K (Pureza 99.9%)</option>
                <option value="22">22K (Pureza 91.6%)</option>
                <option value="18" selected>18K (Pureza 75.0%)</option>
                <option value="14">14K (Pureza 58.3%)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="gramos">Peso en Gramos (g):</label>
            <input type="number" step="0.1" min="0.1" name="gramos" id="gramos" placeholder="Ej. 10.5" required>
        </div>

        <button type="submit" class="btn-submit">Calcular Valor Estimado</button>
    </form>

    <?php if ($resultado !== null): ?>
        <div class="result-box">
            <h3>Valor Estimado:</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 0.5rem;">
                $<?php echo $resultado; ?> COP
            </p>
            <small>*Este precio es una estimación sujeta a revisión física del metal.</small>
        </div>
    <?php endif; ?>
</div>