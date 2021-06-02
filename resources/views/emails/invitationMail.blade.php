@component('mail::message')
# Please join

Invitation link zoom in below :

* Topic : {{$meeting->topic}}
* Password : {{$meeting->password}}
* Tanggal dan waktu : {{$datetime}}

@component('mail::button', ['url' => $meeting->join_url])
Join zoom
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
