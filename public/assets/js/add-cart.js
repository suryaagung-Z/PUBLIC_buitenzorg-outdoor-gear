$(document).ready(function () {
    $('.submit-cart').on('click', function () {
        const form = $(this).closest('.form-to-cart');
        const productId = form.find('input[name="id"]').val();
        const quantity = form.find('input[name="quantity"]').val();
        const productName = form.find('input[name="name"]').val();
        const productPrice = form.find('input[name="price"]').val();
        const productImage = form.find('input[name="path-img"]').val();

        let cart = localStorage.getItem('cart');

        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = [];
        }

        const existingProduct = cart.find(item => item.id === productId);

        if (existingProduct) {
            existingProduct.qty += parseInt(quantity);
        } else {
            cart.push({ id: productId, qty: parseInt(quantity) });
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        const top_panel = $('.top_panel');
        top_panel.find('#img-top_panel').attr('src', productImage);
        top_panel.find('#name-top_panel').text(`${quantity}x ${productName}`);
        top_panel.find('#price-top_panel').text(`Rp${new Intl.NumberFormat('id-ID').format(productPrice)}`);

        top_panel.addClass('show');

        const uniqueProductCount = cart.length;
        $('#count_cart').text(uniqueProductCount);
        if (uniqueProductCount > 0) {
            $('#count_cart').css('display', 'inline');
        } else {
            $('#count_cart').css('display', 'none');
        }

        form.find('input[name="quantity"]').val(1);
    });
});
