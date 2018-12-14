@component('mail::message')
# Introduction

Your One Time Password (OTP) is {{ $OTP }}

@component('mail::button', ['url' => $OTP])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
