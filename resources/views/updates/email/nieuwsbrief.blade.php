@component('mail::message')
# {!! $update->title !!}

{!! $update->text !!}

@component('mail::button', ['url' => route('newsletter.unsubscribe', ['token' => $user->token])])
Uitschrijven
@endcomponent
@endcomponent
