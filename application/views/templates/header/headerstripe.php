<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    

      <script type="text/javascript">
        var verified = false;
        // This identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_live_JBGIyIu0fQLYOg383UxcNK2G');
        var stripeResponseHandler = function(status, response) {
          var $form = $('#payment-form');
          if (response.error) {
            // Show the errors on the form
            swal(response.error.message,"Make sure your card information is filled in correctly","error");
            //$form.find('.payment-errors').text(response.error.message);
            //$form.find('button').prop('disabled', false);
          } else {
            // token contains id, last4, and card type
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and re-submit
            swal("Success!","Your card has been validated!","success");
            verified = true;
            //$form.get(0).submit();
          }
        };
        jQuery(function($) {
          $('#validateCard').click(function(e) {
            var $form = $(document.getElementById('payment-form'));
            // Disable the submit button to prevent repeated clicks
            //$form.find('button').prop('disabled', true);
            Stripe.card.createToken($form, stripeResponseHandler);
            // Prevent the form from submitting with the default action
            return false;
          });
        });
        jQuery(function($) {
          $('#payment-form').submit(function(e){
            if(!verified){
              swal("Card not validated","Please fill out your card information and click the validate button","error");
              return false;
            }
          });
        });
      </script>