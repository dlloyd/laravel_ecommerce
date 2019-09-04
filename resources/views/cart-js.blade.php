<script >
//Add product on cart script
$(document).on('submit','#cart_add',function(event){
  event.preventDefault();
  const form = $(this);
  const url = form.attr( "action" );
  var formData = new FormData();
  formData.append('quantity',$('input[name=quantity]').val());

  if($('#size').length){  // if product has size add it
    formData.append('size_code',$('#size').val());
  }

  $.ajax({
    url: url,
    method: "POST",
    dataType: "json",
    processData:false,
    contentType:false,
    data: formData,
    cache: false,
    beforeSend: function (xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
    },
    success: function (data) {
      addItemToCart(data);  // Add item on cart
      swal(data['name'], "ajouté au panier !", "success");
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('Erreur interne veuillez réessayer');
    }
  });

});

$(document).on('submit','.cart_remove',function(event){
  event.preventDefault();
  let form = $(this);
  let url = form.attr( "action" );
  $.ajax({
    url: url,
    type:'DELETE',
    dataType: "json",
    processData: false,
    contentType: false,
    data: form.serialize(),
    cache: false,
    beforeSend: function (xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
    },
    success: function (data) {
      deleteItemFromCart(data,data['totalPrice'])
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('Erreur interne veuillez réessayer');
    }
  });

});




function addItemToCart(item){
    let textSize='';
    if(item['size']){
      textSize = "("+item['size']+")";
    }
    let itemTotalPrice = parseFloat(item['price']*item['quantity']);
    deleteItemFromCart(item,itemTotalPrice); // delete if same item exists

    let deleteButton = "<form class='cart_remove'  method='post' action="+item['delete_route']+" >"+
                          "<input type='hidden' name='_method' value='delete'>"+
                          "<button type='submit' >Supprimer</button></form>";


    let itemContent = "<li class='header-cart-item flex-w flex-t m-b-12' data-id="+item['id']+">"+
                        "<div class='header-cart-item-img'>"+
                          "<img src="+item['thumb']+" alt='IMG'></div>"+
                        "<div class='header-cart-item-txt p-t-8'>"+
                          "<a href='#' class='header-cart-item-name m-b-18 hov-cl1 trans-04'>"+
                            item['name'] +textSize+"</a>"+
                          "<span class='header-cart-item-info'>"+item['quantity']+"x"+item['price']+"&euro;"+
                          "</span>"+deleteButton+"</div></li>";


    $('#cart_content').append(itemContent);

    updateTotalCart(itemTotalPrice);
    updateCartItemsNumber(1);

  }

  function deleteItemFromCart(item,itemTotalPrice){
    let li = $('#cart_content').children().filter(function() {
        return $(this).data("id") == item['id'];
    });

    if(li.length >0){
      let totalAmount = parseFloat($('#cart-total').text()) - itemTotalPrice; // update the total amount
      $('#cart-total').text(totalAmount.toFixed(2));
      updateCartItemsNumber(-1);
      li.remove();
    }

  }


  function updateTotalCart(itemTotalPrice){
    let totalAmount = parseFloat($('#cart-total').text()) + parseFloat(itemTotalPrice);
    $('#cart-total').text(totalAmount.toFixed(2)); //change with the new total
  }

  function updateCartItemsNumber(val){
    let number = parseInt($('.cart-items-number').first().attr("data-notify"))+val ;
    $('.cart-items-number').attr("data-notify",number);

  }


</script>
