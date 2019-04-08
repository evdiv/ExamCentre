@component('mail::message')
Message from IELTick

{{ $msg['name'] }}<br>
{{ $msg['email'] }}<br>
{{ $msg['message'] }}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
