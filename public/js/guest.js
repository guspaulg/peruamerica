

$(function(){      
            
    $('#add-book').modal({
        show: false,
        backdrop: 'static',
        keyboard: false
    }); 
            
    var cart = new Cart({'url': '/carrito/confirm'});

    if(!$.isEmptyObject($.cookie('cart'))) {
        cart.setData(JSON.parse($.cookie('cart')).data).printHTML('#my-order-items');
    }
    else {
        var cart = new Cart({'url': '/carrito/confirm'});
    }                
    
    $('.comprar').click(function(){
        var chachibook = {
            'index': cart.data.counter,
            'producto': $(this).attr('data-producto'),
            'cantidad': $(this).attr('data-cantidad'),
            'detalles': $(this).attr('data-detalles'),
            'codigo': $(this).attr('data-codigo'),
            'observaciones': $(this).attr('data-observaciones'),
            'precio': parseFloat($(this).attr('data-precio'))
        };
        cart.addItem(chachibook);
    
        $.cookie('cart', JSON.stringify(cart), { expires: 1, path: '/' }); 
        return true;
    });
    


    $(document).on('click', 'a.remove', function(){
        cart.removeItem($(this).attr('data-index'));
        $.cookie('cart', JSON.stringify(cart), { expires: 1, path: '/' }); 
        cart.printHTML('tbody#confirm-cart');
        return false;

    });

    $(document).on('click', '.finalizarcompra', function(){
        $.cookie('cart', JSON.stringify(cart), { expires: 1, path: '/' });                
        return true;
    });
            
});