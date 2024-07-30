document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();

    function updateCartCount() {
        fetch('/cart/count')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('cart-count').textContent = data.count;
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
    }

    // Optionally, update the count after adding an item to the cart
    document.getElementById('add-to-cart-button').addEventListener('click', function() {
        // Call the function that adds the item to the cart
        addToCart();

        // Update the cart count
        updateCartCount();
    });

    function addToCart() {
        // Add item to cart logic here
        // This could be an AJAX request to your server to add the item to the cart
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: 1, // example product ID
                quantity: 1    // example quantity
            })
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            console.log('Item added to cart:', data);
        }).catch(error => {
            console.error('Error adding item to cart:', error);
        });
    }
});
