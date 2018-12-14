@component('mail::message')
# {{$sub}}

{{$msg}}

@component('mail::button', ['url' => $url])
Just Unite
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
