@component('mail::message')

# Dear {{ auth()->user()->name }},

Thank you for giving Quizzy a try.

Payment details are as follows:

Mobile Money: 672 076 995 <br>
Account Name: Bama Kum Jude <br>
Amount : {{ $amount }} FCFA

<br>

Kindly validate your payment using the button below.

@component('mail::button', ['url' => route('validate.payment', $payment->id)])
{{ __('click here to validate payment') }}
@endcomponent

If you received this message by error, please ignore it.

Best regards,<br>
Kum Jude <br>
{{ config('app.name') }}
@endcomponent
