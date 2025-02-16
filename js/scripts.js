document.addEventListener('DOMContentLoaded', function() {
    const cartItems = [];
    const cartList = document .getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nombre = this.getAttribute('data-nombre');
            const precio = parseFloat(this.getAttribute('data-precio'));

            cartItems.push({ id, nombre, precio });
            updateCart();
        });
    });

    function updateCart() {
        cartList.innerHTML = '';
        let total = 0;

        cartItems.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `${item.nombre} - $${item.precio.toFixed(2)}`;
            cartList.appendChild(li);
            total += item.precio;
        });

        totalPriceElement.textContent = `Total: $${total.toFixed(2)}`;
    }

    document.getElementById('checkout').addEventListener('click', function() {
        alert('Gracias por su pedido!');
        cartItems.length = 0; // Clear the cart
        updateCart();
    });
});