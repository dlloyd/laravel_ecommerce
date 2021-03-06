<script >
//Add product on cart script
$(document).on('submit','#cart_add',function(event){
  event.preventDefault();
  $('#add-to-cart-button').attr("disabled", true);
  const form = $(this);
  const url = form.attr( "action" );
  let formData = new FormData();
  formData.append('quantity',$('#stock').val());

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
      $('#add-to-cart-button').attr("disabled", false);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      swal('Erreur' ,'Une erreur interne est survenue veuillez réessayer','error');
      console.log(JSON.stringify(jqXHR));
      $('#add-to-cart-button').attr("disabled", false);
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
      deleteItemFromCart(data)
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.log(JSON.stringify(jqXHR))
    }
  });

});




function addItemToCart(item){
    let itemTotalPrice = parseFloat(item['price']*item['quantity']);
    deleteItemFromCart(item); // delete if same item exists
    appendItemToCartContent(item)


    updateTotalCart(itemTotalPrice);
    updateCartItemsNumber(1);

  }

  function deleteItemFromCart(item){
    let li = $('#cart_content').children().filter(function() {
        return $(this).data("id") == item['id'];
    });

    if(li.length >0){
      let price = parseFloat(li.data('price'));
      let qty = parseFloat(li.data('quantity'));
      let itemTotalPrice = price*qty;
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

    toggleCartButtons(number)

  }


  function initCart(items){
    let totalAmount = 0
    let itemsNumber = 0
    for (let [key,item] of Object.entries(items)) {
      itemsNumber++
      totalAmount += parseFloat(item['price']*item['quantity']);
      appendItemToCartContent(item)

    }

    $('#cart-total').text(totalAmount.toFixed(2));
    $('.cart-items-number').attr("data-notify",itemsNumber);
    toggleCartButtons(itemsNumber)

  }

  function initCartPayment(items){
    let totalAmount = 0
    for (let [key,item] of Object.entries(items)) {
      totalAmount += parseFloat(item['price']*item['quantity'])
      appendItemToCartPaymentContent(item)

    }

    $('#cart-total').text(totalAmount.toFixed(2));
  }

  function toggleCartButtons(itemsNumber){
    if(itemsNumber==0){
      $('#payment-link').hide();
      $('#empty-cart').show();
    }
    else{
      $('#payment-link').show();
      $('#empty-cart').hide();
    }
  }

  function appendItemToCartContent(item){
    let textSize='';
    if(item['size']){
      textSize = "("+item['size']+")";
    }


    let deleteButton = "<form class='cart_remove'  method='post' action="+item['delete_route']+" >"+
                          "<input type='hidden' name='_method' value='delete'>"+
                          "<button type='submit' ><i class='zmdi zmdi-delete'></i> &nbsp; supprimer</button></form>";


    let itemContent = "<li class='header-cart-item flex-w flex-t m-b-12' data-id="+item['id']+"  data-price="+item['price']+"  data-quantity="+item['quantity']+" >"+
                        "<div class='header-cart-item-img'>"+
                          "<img src="+item['thumb']+" alt='IMG'></div>"+
                        "<div class='header-cart-item-txt p-t-8'>"+
                          "<a href='#' class='header-cart-item-name m-b-18 hov-cl1 trans-04'>"+
                            item['name'] +textSize+"</a>"+
                          "<span class='header-cart-item-info'>"+item['quantity']+"x"+item['price']+"&euro;"+
                          "</span>"+deleteButton+"</div></li>";


    $('#cart_content').append(itemContent);
  }


  function appendItemToCartPaymentContent(item){
    let textSize='';
    if(item['size']){
      textSize = "("+item['size']+")";
    }

    let itemContent = "<tr> <th class='how-itemcart1'> <img src="+item['thumb']+" alt='IMG'> </th>"+
                        "<th>"+item['name']+textSize+"</span></th>"+
                          "<td>"+
                            "<span class='amount'>"+item['quantity']+" x" + item['price']+" &euro;</span>"+
                          "</td></tr>";

    $('tbody').append(itemContent);
  }




</script>
