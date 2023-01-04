@extends('layouts.app')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Subscribe To {{ $plan->name}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
        	<form class="card" action="{{ route('account.payment-process') }}" method="POST" id="payment-form">
        		@csrf
        		<div class="card-body">
                    <input type="hidden" name="billing_plan_id" value="{{ $plan->id }}">
        			<div class="mb-4">
            			<label class="form-label">Card Holder Name</label>
            			<input type="text" name="name" class="form-control" id="card-holder-name" placeholder="Card holder name" autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Credit or Debit card</label>
                        <div id="card-element">
                        </div>
                        <div id="card-errors">
                        </div>
                    </div>
        		</div>
        		<div class="card-footer">
        			<button class="btn btn-indigo">Pay {{ $plan->formattedPrice()}}</button>
        		</div>
        	</form>
           
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://js.stripe.com/v3"></script>
<script>
    var stripe= Stripe("{{ env('STRIPE_KEY')}}");
    var elements=stripe.elements();

    var style={
        base{
            color:#32325d,
            fontFamily: 'Inconsolata', monospace !important,
            fontSmoothing: antialiased,
            fontSize:'16px',
            '::placeholder':{
                color: '#aab7c4'
            }

        },
        invalid: {
            color:'#fa755a',
            iconColor:'#fa755a',
        }
    };
    var card=elements.create('card',{style:style});

    card.mount('#card-element');
    card.on('change',function(event){
        var displayError=document.getElementById('card-errors');
        if(event.error)
        {
            displayError.textContent=event.error.message;
        }
        else{
             displayError.textContent='';
        }
    });

    var form=document.getElementById('payment-form');
    form.addEventListener('submit',function (event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result){
            if (result.error) {
                var errorElement=document.getElementById('card-errors');
                errorElement.textContent=result.error.message;
            }
            else{
                stripeTokenHandler(result.token)
            }
        });
    });
    function stripeTokenHandler(token) {
        var form=document.getElementById('payment-form');
        var hiddenInput=document.createElement('input');
        hiddenInput.setAttribute('type','hidden');
        hiddenInput.setAttribute('name','stripeToken');
        hiddenInput.setAttribute('value',token.id);

        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
@stop
