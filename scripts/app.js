
// Product Panel - Not used!
let prod_panel_closed = true;

function OpenProductPanel() {
    if(prod_panel_closed) { // open
        $('#product_panel').animate({
            right: 0
        }, 420, 'swing'); 
    }
    else { // close
        $('#product_panel').animate({
            right: -640
        }, 420, 'swing');    
    }
    prod_panel_closed = !prod_panel_closed;
}

// Product Details Page
let hero_image = document.querySelector('#hero_image');
let product_details_images = document.querySelectorAll('.product_details_image');

function SwapImage(imageURL) {
    hero_image.setAttribute('src', imageURL);
}



function updateTotalPrice(element) {
    var xhr = new XMLHttpRequest();
    var qty = element.value;
    var itemId = element.parentElement.querySelector("input[name='item_id']").value;

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("total-price").innerHTML = this.responseText;
        }
    };

    xhr.open("POST", "update_total_price.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("qty=" + qty + "&item_id=" + itemId);
}
