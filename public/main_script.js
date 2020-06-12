let cart = [];

const showCard = () => {
    document.getElementById('cart').innerHTML = cart.map(item => `<li> ${item.name} </li>`);
}

const addToCart = (id, name) => {
    console.log('added to cart', name);
    cart = [...cart, {id, name}];
    localStorage.setItem('cart', JSON.stringify(cart));
    showCard();
}
// $("#cart").html("yourHtml");
window.onload = () => {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
    showCard();
}
