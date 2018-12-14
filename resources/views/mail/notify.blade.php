@component('mail::message')
# {{$sub}}

{{$msg}}

@component('mail::button', ['url' => $url])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
