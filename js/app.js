(function($){

	$('.addPanier').click(function(event){
		event.preventDefault();
		$.get($(this).attr('href'),{},function(data){
			if(data.error){
				alert(data.message);
			}else{
                $.confirm({
                    columnClass: 'small',
                    boxWidth: '300px',
                    useBootstrap: true,
                    draggable: true,
                    alignMiddle: true,
                    dragWindowBorder: false,
                    dragWindowGap: 0, // number of px of distance
                    title: 'Panier',
                    content: data.message + '. Voulez vous consulter votre panier ?',
                    buttons: {
                        Oui: function () {
                            location.href = 'panier.php';
                        },
                        Non: function () {
                            
                            $('#total').empty().append(data.total);
                            $('#count').empty().append(data.count);
                        }
                    }
                });
			}
		},'json');
		return false;
	});

})(jQuery);
/*let screenW = window.innerWidth;
let screenH = window.innerHeight;
var posx = (screenW.width() - $("#dialog-confirm").width()) / 2;
var posy = (screenH.height() - $("#dialog-confirm").height()) / 2;
$("#dialog-confirm").offset({ top: posy , left: posx });*/
/*$.confirm({
    title: 'Confirm!',
    content: 'Simple confirm!',
    buttons: {
        confirm: function () {
            $.alert('Confirmed!');
        },
        cancel: function () {
            $.alert('Canceled!');
        }
    }
});*/