
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