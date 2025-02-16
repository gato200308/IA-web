<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\styles.css">
    <script src="js/scripts.js" defer></script>
    <title>Menú - Restaurante Gourmet</title>
</head>
<body>
    <header>
        <h1>Menú</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="reserva.html">Reservas</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Nuestros Platos</h2>
        <div id="menu-items">
            <?php
            include 'db.php';

            $query = "SELECT * FROM menu";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='plato'>";
                    echo "<h3>" . $row['nombre_plato'] . "</h3>";
                    echo "<p>" . $row['descripcion'] . "</p>";
                    echo "<p>Precio: $" . number_format($row['precio'], 2) . "</p>";
                    echo "<button class='add-to-cart' data-id='" . $row['id'] . "' data-nombre='" . $row['nombre_plato'] . "' data-precio='" . $row['precio'] . "'>Añadir al Carrito</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay platos disponibles.</p>";
            }
            $conn->close();
            ?>
        </div>
        <div id="cart">
            <h2>Carrito</h2>
            <ul id="cart-items"></ul>
            <p id="total-price">Total: $0.00</p>
            <button id="checkout">Realizar Pedido</button>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Restaurante Gourmet</p>
    </footer>
</body>
</html>