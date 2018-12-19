@component('mail::message')
# Verify your Email

Your One Time Password (OTP) is {{ $OTP }}. This OTP is valid only for 15 minutes

@component('mail::button', ['url' => ''])
{{ $OTP }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
