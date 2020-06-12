let cart = [];

const item_cart = (item) => (
    `<div>${item.name}</div>`
)

const showCard = () => {
    document.getElementById('cart').innerHTML = cart.map(item => item.name);
    document.getElementById('form-checkout').value = cart.map(item => item.id);
}

const addToCart = (id, name) => {
    console.log('added to cart', name);
    cart = [...cart, {id, name}];
    localStorage.setItem('cart', JSON.stringify(cart));
    showCard();
}

const resetCart = () => {
    localStorage.setItem('cart', JSON.stringify([]));
    cart = [];
    showCard();
}

const checkout = () => {
    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    const form = document.getElementById('checkout-form');
    form.method = 'post';
    form.action = '/checkout';

    for (item in cart) {
        const hiddenField = document.createElement('input');
        hiddenField.name = 'items[]';
        hiddenField.value = item;

        form.appendChild(hiddenField);
    }

    form.submit();
}
// $("#cart").html("yourHtml");
window.onload = () => {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
    showCard();
}
