@component('mail::message')
# Register Camp: {{ $checkout->camp->title }}

Hi {{ $checkout->user->name }}
<br>
Thank you for register on <b>{{ $checkout->camp->title }}</b>, please see payment instrucitons by click the button below.

@component('mail::button', ['url' => route('dashboard')])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
