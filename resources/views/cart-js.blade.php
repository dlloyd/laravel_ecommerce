<script >
//Add product on cart script
$(document).on('submit','#cart_add',function(event){
  event.preventDefault();
  const form = $(this);
  const url = form.attr( "action" );
  var formData = new FormData();
  formData.append('quantity',$('input[name=quantity]').val());
  formData.append('size_code',$('#size').val());

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
      console.log(data)
      addItemToCart(data);  // Add item on cart
      swal(data['name'], "ajouté au panier !", "success");
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert(JSON.stringify(jqXHR));
    }
  });

});

$(document).on('submit','.cart_remove',function(event){
  event.preventDefault();
  let form = $(this);
  let url = form.attr( "action" );
  $.ajax({
    url: url,
    method: "POST",
    dataType: "json",
    processData: false,
    contentType: false,
    data: form.serialize(),
    cache: false,
    beforeSend: function (xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
    },
    success: function (data) {
      deleteItemFromCart(data.data)
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('error')
    }
  });

});




function addItemToCart(item){
    let textSize='';
    if(item['size']){
      textSize = "("+item['size']+")";
    }
    deleteItemFromCart(item); // delete if same item exists
    let itemContent = "<li class='header-cart-item flex-w flex-t m-b-12' data-id="+item['id']+">"+
                        "<div class='header-cart-item-img'>"+
                          "<img src="+item['thumb']+" alt='IMG'></div>"+
                        "<div class='header-cart-item-txt p-t-8'>"+
                          "<a href='#' class='header-cart-item-name m-b-18 hov-cl1 trans-04'>"+
                            item['name'] +textSize+"</a>"+
                          "<span class='header-cart-item-info'>"+item['quantity']+"x"+item['price']+"&euro;"+
                          "</span></div></li>";


    $('#cart_content').append(itemContent);
    let itemTotalPrice = parseFloat(item['price']*item['quantity']);
    updateTotalCart(itemTotalPrice);
    updateCartItemsNumber(1);

  }

  function deleteItemFromCart(item){
    let li = $('#cart_content').children().filter(function() {
        return $(this).data("id") == item['id'];
    });
    if(li){
      let itemTotalPrice = parseFloat(item['price']*item['quantity']);
      let totalAmount = parseFloat($('#cart-total').text()) - itemTotalPrice; // update the total amount
      $('#cart-total').text(totalAmount.toFixed(2).toString());
      updateCartItemsNumber(-1);
      li.remove();
    }

  }


  function updateTotalCart(itemTotalPrice){
    let totalAmount = parseFloat($('#cart-total').text()) + parseFloat(itemTotalPrice);
    $('#cart-total').text(totalAmount.toFixed(2)); //change with the new total
  }

  function updateCartItemsNumber(val){
    let number = $('.cart-items-number').first().data("notify")+val ;
    $('.cart-items-number').data("notify",number);

  }


</script>
