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

    cart.forEach((item) => {
        console.log(item);
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'items[]';
        hiddenField.value = item.id;

        form.appendChild(hiddenField);
    })

    form.submit();
}
const onChangeNip = () => {
    let value = document.getElementById('nip-input').value;
    value = value.replace(/\D/g,'');
    const array = [value.slice(0,3), value.slice(3,5), value.slice(5,7), value.slice(7,10)].filter(value => value !== '')
    document.getElementById('nip-input').value = array.join('-');
}

const onChangePhone = () => {
    let value = document.getElementById('phone-input').value;
    if(value.length > 1){
        value = value.slice(3);
    }
    value = value.replace(/\D/g,'');

    const array = [value.slice(0,3), value.slice(3,6), value.slice(6,9)].filter(value => value !== '')
    document.getElementById('phone-input').value = '+48 ' + array.join(' ');
}

// $("#cart").html("yourHtml");
window.onload = () => {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
    document.getElementById('nip-input').addEventListener('keyup', onChangeNip)
    document.getElementById('phone-input').addEventListener('keyup', onChangePhone)
    showCard();
}
