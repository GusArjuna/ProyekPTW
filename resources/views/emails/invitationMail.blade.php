@component('mail::message')
# Please join

Invitation link zoom in below :

* Topic : {{$meeting->topic}}
* Password : {{$meeting->password}}
* Tanggal dan waktu : {{$datetime}}

@component('mail::button', ['url' => $meeting->join_url])
Join zoom
@endcomponent

@component('mail::button', ['url' => route('attendences.presensi', $attendences->id)])
Link Presensi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
