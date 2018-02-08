@component('mail::message')
# Hello {{$user->name}}
Thanks for create an account. Please veryfy follow this link:

@component('mail::button', ['url' => route('verify', $user->verification_token)])
Confirm my account
@endcomponent

@endcomponent
