<?php 
// Título personalizado para esta página
$titulo_pagina = "Aurum Oro | Compra y Venta de Oro de Alta Pureza";

// Incluir el encabezado HTML
include('header.php'); 
?>

<div class="container">
    
    <!-- Hero Banner -->
    <section class="hero">
        <h1>Compramos y Vendemos Oro al Mejor Precio</h1>
        <p>Garantía de pureza, cotizaciones transparentes y pago inmediato.</p>
    </section>

    <!-- Sección de la Calculadora -->
    <?php include('calculadora.php'); ?>

</div>

<!-- Incluir el pie de página HTML -->
<?php include('footer.php'); ?>