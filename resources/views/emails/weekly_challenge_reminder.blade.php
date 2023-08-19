@component('mail::message')

# Hello {{ $user_email }},

We hope you are well and working hard to achieve your goals.

A new Challenge is now available. This challenge shall end today at 11:59 pm.
<br>
<div style="text-align:center;padding:10px;">
    <a href="https://quizzy.cm/weekly-challenge" style="background: #4267B2;border: medium none;border-radius: 6px;text-decoration:none;color: #fff;display: inline-block;font-size: 13px;font-weight: 400;padding: 8px 18px;text-transform: capitalize;">Take Challenge</a>
 </div>
<br>

Feel free to complete the challenge at anytime at your convenience
within the deadline.
 <br>

 Note: Any form of cheating is not allowed!

 <br>


Best regards,<br>
{{ config('app.name') }}
<br>

<small>If you received this message by error, please ignore it.</small>
@endcomponent
