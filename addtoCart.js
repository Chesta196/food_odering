//js file

var addItemId = 0;
function addtoCart(item){
     addItemId =addItemId + 1;
    var selectedItem = document.createElement('div');
    selectedItem.classList.add('cartImg');
    selectedItem.setAttribute('id',addItemId);
    var img = document.createElement('img');
    img.setAttribute('src',item.children[0].currentSrc);
    var cartItems = document.getElementsById('price');
    selectedItem.append(img);
    cartItems.append(selectedItem);

}