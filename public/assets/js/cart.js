(function(){
    $(document).ready(function () {
        let cart = getCartFromLocalStorage();

        if (cart) {
            const productIds = getProductIds(cart);

            toggleLoading(true);
            fetchProducts(productIds, function (response) {
                updateCart(response.data, cart);
            }, function (xhr) {
                console.error(xhr.responseText);
            }, function () {
                toggleLoading(false);
            });
        }

        $('table.cart-list').on('click', '.remove-item', function () {
            const productId = $(this).data('id');
            const confirmDeletion = confirm('ingin menghapus item ini dari keranjang?');

            if (confirmDeletion) {
                removeItemFromCart(productId);
            }
        });

        const modalIdentity = new bootstrap.Modal('#modalIdentity', {
            keyboard: false,
        });

        $('#btn-pesan').click(function() {
            modalIdentity.show();
        });

        $('#modalIdentity #btn-batalkan').click(function() {
            $('#modalIdentity #formIdentity')[0].reset();
            modalIdentity.hide();
        });

        $('#modalIdentity #btn-lanjut').click(function() {
            const nama = $('#modalIdentity #name').val();
            const nomor = $('#modalIdentity #no_telp').val();
            const dateTime = $('#modalIdentity #date-time').val();

            if (nama && nomor && dateTime) {
                modalIdentity.hide();
                $('#modalIdentity #formIdentity')[0].reset();
                sendWhatsAppMessage(nama, nomor, formatDateTime(dateTime));
            } else {
                alert('Mohon isi semua data identitas.');
            }
        });

        function sendWhatsAppMessage(nama, nomor, dateTime) {
            let cart = getCartFromLocalStorage();
            if (!cart || cart.length === 0) {
                alert("Keranjang kosong, silakan tambahkan produk terlebih dahulu.");
                return;
            }

            const button = $('#btn-pesan');
            button.prop('disabled', true);

            const productIds = getProductIds(cart);

            fetchProducts(productIds, function(response) {
                let message = `Halo, selamat ${getGreeting()}! Saya ${nama} (${nomor}).\n`;
                message += `Bisakah saya booking dan menjemput barang pada tanggal dan waktu berikut:\n${dateTime}\n\n`;
                message += "Detail barang yang ingin saya booking adalah sebagai berikut:\n";

                let total = 0;

                response.data.forEach((product, i) => {
                    const cartItem = cart.find(item => item.id === product.id);
                    const quantity = cartItem.qty;
                    const productSubtotal = quantity * product.price;
                    total += productSubtotal;
                    const productLink = `${window.location.origin}/catalogue/${product.id}`;
                    message += `\n*${i+1}.*\n`;
                    message += `Nama: ${product.name}\n`;
                    message += `Jumlah: ${quantity}x\n`;
                    message += `Subtotal: Rp${new Intl.NumberFormat('id-ID').format(productSubtotal)}\n`;
                    message += `Link barang: ${productLink}\n`;
                });
                message += `\n\nTotal: Rp${new Intl.NumberFormat('id-ID').format(total)}\n\nTerima kasih`;

                const encodedMessage = encodeURIComponent(message);
                const whatsappUrl = `https://wa.me/6285156858617?text=${encodedMessage}`;

                window.open(whatsappUrl, '_blank');
            }, function(xhr) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat mengambil data produk.");
            }, function() {
                button.prop('disabled', false);
            });
        }

        function formatDateTime(dateTime) {
            const date = new Date(dateTime);
            const options = { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' };
            return date.toLocaleDateString('id-ID', options).replace('pukul', 'pukul');
        }

        function getGreeting() {
            const hours = new Date().getHours();
            if (hours < 12) return "pagi";
            if (hours < 18) return "siang";
            if (hours < 24) return "malam";
            return "sore";
        }

        function getCartFromLocalStorage() {
            let cart = localStorage.getItem('cart');
            return cart ? JSON.parse(cart) : null;
        }

        function getProductIds(cart) {
            return cart.map(item => ({ id: item.id }));
        }

        function fetchProducts(productIds, successCallback, errorCallback, completeCallback) {
            $.ajax({
                url: '/api/products',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(productIds),
                success: successCallback,
                error: errorCallback,
                complete: completeCallback
            });
        }

        function toggleLoading(isLoading) {
            const elements = $("table.cart-list, .box_cart");
            isLoading ? elements.addClass('loading-elm') : elements.removeClass('loading-elm');
        }

        function updateCart(products, cart) {
            const tbody = $('table.cart-list tbody');
            tbody.empty();

            let subtotal = 0;

            products.forEach(product => {
                const cartItem = cart.find(item => item.id === product.id);
                const quantity = cartItem.qty;
                const price = product.price;
                const total = quantity * price;
                subtotal += total;

                const row = createCartRow(product, quantity, price, total);
                tbody.append(row);
            });

            if($('table.cart-list tbody tr').length < 1){
                $('.box_cart #btn-pesan').addClass('disabled');
            }else{
                $('.box_cart #btn-pesan').removeClass('disabled');
            }

            updateCartSummary(subtotal);
            inputIncrementer();
            updateQuantity();
        }

        function createCartRow(product, quantity, price, total) {
            return `
                <tr>
                    <td>
                        <div class="thumb_cart">
                            <img src="/storage/${product.photos[0]?.path}" alt="Gambar Produk" class="prd-img">
                        </div>
                        <span class="prd-name item_cart">${product.name}</span>
                    </td>
                    <td>
                        <strong class="prd-price">Rp${new Intl.NumberFormat('id-ID').format(price)}</strong>
                    </td>
                    <td>
                        <div class="numbers-row">
                            <input type="text" value="${quantity}" class="prd-qty qty2" name="quantity" data-min="1" data-id="${product.id}">
                            <div class="inc button_inc">+</div>
                            <div class="dec button_inc">-</div>
                        </div>
                    </td>
                    <td>
                        <strong class="prd-subtotal">Rp${new Intl.NumberFormat('id-ID').format(total)}</strong>
                    </td>
                    <td class="options">
                        <a href="javascript:void(0)" class="remove-item" data-id="${product.id}"><i class="ti-trash"></i></a>
                    </td>
                </tr>
            `;
        }

        function updateCartSummary(subtotal) {
            const formattedSubtotal = `Rp${new Intl.NumberFormat('id-ID').format(subtotal)}`;
            $('.result-subtotal').text(formattedSubtotal);
            $('.result-total').text(formattedSubtotal);
        }

        function updateQuantity() {
            $('.prd-qty').off('change').on('change', function () {
                let quantity = parseInt($(this).val());
                const productId = $(this).data('id');

                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1;
                    $(this).val(quantity);
                }

                updateLocalStorage(productId, quantity);
            });
        }

        function updateLocalStorage(productId, quantity) {
            let cart = getCartFromLocalStorage();
            if (cart) {
                const product = cart.find(item => item.id === productId);
                if (product) {
                    product.qty = quantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                }
            }

            updateCartData();
        }

        function updateCartData() {
            let cart = getCartFromLocalStorage();

            if (cart) {
                const productIds = getProductIds(cart);

                fetchProducts(productIds, function (response) {
                    updateCart(response.data, cart);
                }, function (xhr) {
                    console.error(xhr.responseText);
                });
            }
        }

        function removeItemFromCart(productId) {
            let cart = getCartFromLocalStorage();
            if (cart) {
                cart = cart.filter(item => item.id !== productId);
                localStorage.setItem('cart', JSON.stringify(cart));

                updateCartData();
            }
        }
    });
})();
