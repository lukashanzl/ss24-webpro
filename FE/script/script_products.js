$(document).ready(function() {
    let cart = [];

    // Fetch products
    fetchProducts();

    // Event Listener für die Suchleiste
    $('#searchBar').on('input', function() {
        const query = $(this).val().toLowerCase();
        fetchProducts(query, $('#categorySelect').val());
    });

    // Event Listener für das Kategorien Dropdown
    $('#categorySelect').on('change', function() {
        fetchProducts($('#searchBar').val().toLowerCase(), $(this).val());
    });

    // Event Listener für das Warenkorb-Symbol Icon
    $('#cart-icon').on('click', function() {
        $('html, body').animate({
            scrollTop: $('#cart').offset().top
        }, 1000);
    });


    

    function fetchProducts(query = '', category = 'all') {
        $.ajax({
            url: '../../BE/classes/products.php?products=all',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                renderProducts(data, query, category);
            },
            error: function(err) {
                console.error('Error fetching products', err);
            }
        });
    }

    function renderProducts(products, query, category) {
        const productsContainer = $('#products');
        productsContainer.empty();

        products.forEach(product => {
            if (product.marke.toLowerCase().includes(query) && (category === 'all' || product.kategorie === category)) {
                const productCard = `<div class="col" style="margin-top: 20px;">
                    <div class="card shadow-sm">
                    <img src="../../BE/productpictures/${product.image}" class="card-img-top" alt="${product.marke} ${product.modell}">
                        <div class="card-body">
                            <h5 class="card-title">${product.marke} ${product.modell}</h5>
                            <p class="card-text">${product.description}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text">${product.price}€</p>
                                <button type="button" class="btn btn-sm btn-outline-danger add-to-cart" data-id="${product.id}">In den Warenkorb</button>
                                <small class="text-body-secondary">${product.watt ? product.watt + ' Watt' : ''}</small>
                            </div>
                        </div>
                    </div>
                </div>`;
                productsContainer.append(productCard);
            }
        });

        // Event Listener für "In den Warenkorb" Buttons
        $('.add-to-cart').off('click').on('click', function() {
            const productId = $(this).data('id');
            addToCart(productId);
        });
    }

    function addToCart(productId) {
        // Find product by ID
        $.ajax({
            url: '../../BE/classes/products.php?products=all',  // Sicherstellen, dass der Pfad korrekt ist
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const product = data.find(p => p.id == productId);
                if (product) {
                    const existingProduct = cart.find(p => p.id == productId);
                    if (existingProduct) {
                        existingProduct.quantity += 1;
                    } else {
                        product.quantity = 1;
                        cart.push(product);
                    }
                    renderCart();
                }
            },
            error: function(err) {
                console.error('Fehler beim Abrufen des Produkts', err);
            }
        });
    }

    function renderCart() {
        const cartContent = $('#cartContent');
        const totalPriceElem = $('#totalPrice');
        const cartCountElem = $('#cart-count');
        cartContent.empty();

        if (cart.length === 0) {
            cartContent.append('<p>Warenkorb leer</p>');
            totalPriceElem.text('0.00€');
            cartCountElem.text('0');
            return;
        }

        let totalPrice = 0;
        let totalCount = 0;

        cart.forEach(product => {
            const productTotal = product.price * product.quantity;
            totalPrice += productTotal;
            totalCount += product.quantity;

            const cartItem = `<div class="cart-item">
                <span>${product.marke} ${product.modell} (${product.quantity} x ${product.price}€)</span>
                <div>
                    <button class="btn btn-sm btn-outline-secondary increase-quantity" data-id="${product.id}">+</button>
                    <button class="btn btn-sm btn-outline-secondary decrease-quantity" data-id="${product.id}">-</button>
                    <button class="btn btn-sm btn-outline-danger remove-from-cart" data-id="${product.id}">Entfernen</button>
                </div>
            </div>`;
            cartContent.append(cartItem);
        });

        totalPriceElem.text(`${totalPrice.toFixed(2)}€`);
        cartCountElem.text(totalCount);

        // Event Listener für die Mengen- und Entfernen-Buttons
        $('.increase-quantity').off('click').on('click', function() {
            const productId = $(this).data('id');
            updateCartQuantity(productId, 1);
        });

        $('.decrease-quantity').off('click').on('click', function() {
            const productId = $(this).data('id');
            updateCartQuantity(productId, -1);
        });

        $('.remove-from-cart').off('click').on('click', function() {
            const productId = $(this).data('id');
            removeFromCart(productId);
        });
    }

    function updateCartQuantity(productId, quantityChange) {
        const product = cart.find(p => p.id == productId);
        if (product) {
            product.quantity += quantityChange;
            if (product.quantity <= 0) {
                removeFromCart(productId);
            } else {
                renderCart();
            }
        }
    }

    function removeFromCart(productId) {
        cart = cart.filter(p => p.id != productId);
        renderCart();
    }
});
