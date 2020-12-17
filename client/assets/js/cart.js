// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // Constructor
    function Item(name, price, count, id, shop, amount) {
        this.name = name;
        this.price = price;
        this.count = count;
        this.id = id;
        this.shop = shop;
        this.amount = amount;
    }

    // Save cart
    function saveCart() {
        sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

    // Load cart
    function loadCart() {
        cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }

    if (sessionStorage.getItem("shoppingCart") != null) {
        loadCart();
    }


    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};

    // Add to cart
    obj.addItemToCart = function (name, price, count, id, shop, amount) {
        for (var item in cart) {
            if (cart[item].name === name) {
                cart[item].count++;
                saveCart();
                return;
            }
        }
        var item = new Item(name, price, count, id, shop, amount);
        cart.push(item);
        saveCart();
    }

    // Set count from item
    obj.setCountForItem = function (name, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
    };

    // Remove item from cart
    obj.removeItemFromCart = function (name) {
        for (var item in cart) {
            if (cart[item].name === name) {
                cart[item].count--;
                if (cart[item].count === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    }

    // Remove all items from cart
    obj.removeItemFromCartAll = function (name) {
        for (var item in cart) {
            if (cart[item].name === name) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }

    // Clear cart
    obj.clearCart = function () {
        cart = [];
        saveCart();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener(
                    'mouseenter', Swal
                    .stopTimer)
                toast.addEventListener(
                    'mouseleave', Swal
                    .resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Clear cart'
        })
    }

    // Count cart 
    obj.totalCount = function () {
        var totalCount = 0;
        for (var item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }

    // Total cart
    obj.totalCart = function () {
        var totalCart = 0;
        for (var item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
    }

    // List cart
    obj.listCart = function () {
        var cartCopy = [];
        for (i in cart) {
            item = cart[i];
            itemCopy = {};
            for (p in item) {
                itemCopy[p] = item[p];

            }
            itemCopy.total = Number(item.price * item.count).toFixed(2);
            cartCopy.push(itemCopy)
        }
        return cartCopy;
    }

    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item

$('.add-to-cart').click(function (event) {
    event.preventDefault();
    var name = $(this).data('name');
    var price = Number($(this).data('price'));
    var id = Number($(this).data('id'));
    var shop = Number($(this).data('shop'));
    var amount = Number($(this).data('amount'));
    shoppingCart.addItemToCart(name, price, 1, id, shop, amount);
    displayCart();
});

// Clear items
$('.clear-cart').click(function () {
    shoppingCart.clearCart();
    displayCart();
});

function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    var outputSimple = "";

    for (var i in cartArray) {


        output += "<tr>" +
            `<th scope="row" class="text-sm">#` + cartArray[i].id + `</th>` +
            `<td>` + cartArray[i].name + `</td>` +
            `<td>` + cartArray[i].price + ` ฿</td>` +
            `<td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="minus-item btn btn-sm btn-success m-0 px-3 mr-2" type="button" data-name="` + cartArray[i].name + `"><i
                            class="fas fa-minus"></i></button>
                    <input type="number" class="form-control" style="width: 60px;" disabled
                        min="0" data-name="` + cartArray[i].name + `" value="` + cartArray[i].count + `">
                    <button class="plus-item btn btn-sm btn-warning m-0 px-3 ml-2" type="button" data-name="` + cartArray[i].name + `"><i
                            class="far fa-plus"></i></button>
                </div>
            </div>
        </td>
        <td>` + cartArray[i].total + `</td>
        <td><button class="delete-item btn btn-sm btn-danger m-0 px-3 ml-2" type="button" data-name="` + cartArray[i].name + `"><i
                    class="fad fa-trash-restore" style="font-size: 15px;"></i></button></td>

    </tr>`;

        outputSimple += "<tr>" +
            "<td>" + cartArray[i].name + "</td>" +
            "<td> (ราคา " + cartArray[i].price + " / ชิ้น)</td>" +
            "<td> จำนวน : " + cartArray[i].count + "</td>" +
            "<td> รวม : " + cartArray[i].total;
        console.log(cartArray)

    }


    $('.show-cart-simple').html(outputSimple);
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
    
}

$('.check-out').on('click', function () {
    var myCart = JSON.stringify(shoppingCart.listCart());
    if (shoppingCart.listCart().length > 0) {
        
        var income = $('#income').val();
        var coupon = $('#coupon').val();
        var pareIncome = parseInt(income);
        
        if (pareIncome > 0) {

            if (pareIncome >= shoppingCart.totalCart()) {

                $.ajax({
                    url: '../assets/php/check-out.php',
                    type: 'POST',
                    data: {cart:myCart,money:pareIncome,coupon:coupon},
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Successful payment',
                                html: `
                                <div class="text-left">Total : `+ response.total + ` ฿</br>Money received : ` + response.income + ` ฿</br>Change : ` + response.change + ` ฿</br>Receipt number : ` + response.receipt + `</br>` + `</div>`,
                                footer: '<a href="'+ response.link +'">Receipt details</a>'
                              }).then(function () {
                                shoppingCart.clearCart();
                                displayCart();
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Unsuccessful payment',
                                text: response.message,
                                footer: '<a href>Why do I have this issue?</a>'
                            });
                        }
                    },
                    error: function (request, error) {
                        alert("AJAX Call Error: " + error);
                    }
        
                    
                });
            } else {
                Swal.fire(
                    'Warning !',
                    'Please check the amount again!',
                    'warning'
                )
                
            }
            
        } else {
            Swal.fire(
                'Warning !',
                'Please enter the amount!',
                'warning'
            )
        }

    } else {
        Swal.fire(
            'Warning !',
            'Please add products to cart!',
            'warning'
        )
    }



});


// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function (event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCart(name);
    displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
    var name = $(this).data('name')
    shoppingCart.addItemToCart(name);
    displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
    var name = $(this).data('name');
    var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
});

displayCart();