$('#currency').on('change', function () {
    window.location = 'currency/change?curr=' + $(this).val();
});

$('.available select').on('change', function () {
   let modeID = $(this).val(),
       color = $(this).find('option').filter(':selected').data('title'),
       price = $(this).find('option').filter(':selected').data('price'),
       basePrice = $('#base-price').data('base');

   if(price){
       $('#base-price').text(symbolLeft + price + symbolRight);
   }else{
       $('#base-price').text(symbolLeft + basePrice + symbolRight);
   }

});
