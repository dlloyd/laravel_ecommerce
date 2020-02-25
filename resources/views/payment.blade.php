@extends('app')

@section('header')
  @include('headers.basic')
@endsection

@section('title','Page de paiement')
@section('content')

  <div class="container">
    <form id="payment-form" method="post" action="{{route('payment_confirmation')}}">
    <div class="row" style="margin-top:20px;">
      <div class="bor10 col-lg-10 col-xl-6 m-lr-auto m-b-50 p-t-30">
        <h4 class="mtext-109 cl2 p-b-30">
          Informations de livraison
        </h4>

          <div class="col-lg-9" id="customer_details">

            <div class="row" style="padding-left:15px;margin-bottom:15px;">

                <label>Nom
                  <abbr id="cardholder-name" style="color:red;" class="required" title="champs obligatoire">*</abbr>
                </label>
                <input type="text" name="name" placeholder="Nom et prénom" class="form-control" required/>


              </div> <!-- end name  -->

              <div class="row" style="padding-left:15px;margin-bottom:15px;">
                <label>Pays
                  <abbr class="required" style="color:red;" title="champs obligatoire">*</abbr>
                </label>
                <select class="form-control" name="country-select" id="shipping_country" required>
                  @include('country_select')
                </select>
                <input type="text" name="country" value="" hidden />

              </div>

              <div class="row" style="padding-left:15px;margin-bottom:15px;">
                <label>Ville
                  <abbr class="required" style="color:red;" title="champs obligatoire">*</abbr>
                </label>
                <input type="text" id="cardholder-city" name="city" class="form-control" required/>
              </div>

              <div class="row" style="padding-left:15px;margin-bottom:15px;">
                <label>Adresse de livraison
                  <abbr class="required" style="color:red;" title="champs obligatoire">*</abbr>
                </label>
                <input type="text"   name="address_line1" class="form-control" required/>
              </div>

              <div class="row"  style="padding-left:15px;margin-bottom:15px;">
                <textarea class="form-control" name="address_line2" placeholder='Appartement,étage...(optionel)' ></textarea>
              </div>

              <div class="row" style="margin-bottom:15px;">
                <div class="col-md-3 col-sm-3 col-lg-6 col-xl-6">
                  <label>Code Postal</label>
                  <input type="text"  name="postal_code" class="form-control" />
                </div>
              </div>

              <div class="row" style="padding-left:15px;margin-bottom:30px;">
                  <label>Email
                    <abbr class="required" style="color:red;" title="champs obligatoire">*</abbr>
                  </label>
                  <input type="email" id="cardholder-email" name="email" class="form-control" required/>
              </div>

            </div>

          </div> <!-- end col -->

          <div class="col-sm-10 col-lg-7 col-xl-6 m-lr-auto m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
              <h4 class="mtext-109 cl2 p-b-30">
                Panier
              </h4>
              <div class="order-review-wrap ecommerce-checkout-review-order">

                <table class="table shop_table ecommerce-checkout-review-order-table">
                  <tbody>
                     <!-- Dynamic cart content !-->

                  </tbody>
                </table>

              </div>

              <div>Frais de livraison: <span id="shipping-cost"></span> &euro; </div>
              <div class="flex-w flex-t p-t-27 p-b-33">
                <div class="size-208">
                  <span class="mtext-101 cl2">
                    Total:
                  </span>
                </div>

                <div class="size-209 p-t-1">
                  <span id="total" class="mtext-110 cl2">

                  </span> &euro;
                </div>
              </div>

              <div id="payment-order" class="ecommerce-checkout-payment">
                <h5 class="mtext-109 cl2 p-b-30">
                  Mode de paiement
                </h5>
                <div style="margin-bottom:30px;" class="payment-tab-trigger">
                  <img class="payment-logo" height="20px" src="https://i.imgur.com/IHEKLgm.png" alt="">
                </div>

                <div>

                  <!-- placeholder for Elements -->
                  <div id="card-element" class="form-control"></div>
                  <div id="card-errors" class="help-block" role="alert"></div>
                  <br/><br/>
                  <button id="card-button" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" data-secret="{{$intentSecret}}">
                   Valider Paiement
                  </button>

                </div>

              </div>
            </div>
          </div>

      </div>
      </form>
    </div>


@endsection

@section('javascripts')
  @parent
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){

      $.ajax({
         url : '/cart/details',
         type : 'GET',
         dataType : 'json',
         cache: false,
         success : function(data){
  				 console.log(data)

           let cartIsEmpty = !Object.keys(data).length

           if(cartIsEmpty){
             window.location.href = "{{route('welcome')}}"
           }
           initCartPayment(data)
         },
  			 error: function(error){
  				 console.log(error)
  			 }
      });

      updateShipping();

      $('#shipping_country').change(function(){
        updateShipping()
      });

      function updateShipping(){
        let code = $('#shipping_country :selected').val()
        console.log(code)
        let country_name = $('#shipping_country :selected').text()
        $("input[name='country']").val(country_name)
        console.log($("input[name='country']").val())
        let url = '{{ route("set_shipping_price") }}';
        let formData = new FormData();
        formData.append('country_code',code);
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
            $('#shipping-cost').text(data['shipping_price'])
            $('#total').text(data['total'])
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
          }
        });
      }
    });
  </script>

  <script type="text/javascript">
    $.validator.messages.required = 'Champs obligatoire';
	  var form = document.getElementById('payment-form');
	  var errors = document.getElementById('card-errors');

	  var stripe = Stripe('{{ env('STRIPE_PUB_KEY') }}');
	  var elements = stripe.elements({ locale:'{{ app()->getLocale() }}', });


	  var card = elements.create('card');

	  card.mount('#card-element');
	  card.addEventListener('change', function(event) {
	    if (event.error) {
	      errors.textContent = event.error.message;
	      form.classList.add('has-error');
	    } else {
	      errors.textContent = '';
	      form.classList.remove('has-error');
	    }
	  });

    var cardholderName = document.getElementById('cardholder-name');
    var cardButton = document.getElementById('card-button');
    var clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', function(ev) {
      event.preventDefault();
      if(!$('#payment-form').valid()){
        swal('Attention','Vérifiez que vos informations de livraison soient bien renseignées','warning')
      }
      else{
        $(this).attr('disabled',true);
        stripe.handleCardPayment(
          clientSecret, card, {
            payment_method_data: {
              billing_details: {
                name: cardholderName.value
                }
              },
              receipt_email: document.getElementById('cardholder-email').value
            }

        ).then(function(result) {
          if (result.error) {
            swal('Erreur','Erreur lors du paiement veuillez réessayer',"error");
            $('#card-button').attr('disabled',false);
          } else {
            let form = $('#payment-form');
            let url = form.attr( "action" );

            $.ajax({
              url: url,
              method: "POST",
              data: form.serialize(),
              cache: false,
              beforeSend: function (xhr) {
                  xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
              },
              success: function (data) {
                swal("Félicitation","Paiement réalisé avec succès!! Vous recevrez un email de confirmation stripe, merci de votre confiance", "success")
                 .then(()=>{
                   window.location.href = "{{route('welcome')}}"
                  });
              },
              error: function (jqXHR, textStatus, errorThrown) {
                swal('Erreur','Une erreur interne est survenu! Vérifiez que votre email est correct sinon réessayez',"error");
                $('#card-button').attr('disabled',false);
                console.log(JSON.stringify(jqXHR) )
              }
            });

        }
      });
    }
    });


	</script>


@endsection
