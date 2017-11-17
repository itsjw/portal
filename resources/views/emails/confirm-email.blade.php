@component('mail::message')
    # Welcome to {{ config('app.name') }}!

    Please Confirm Your email:

    @component('mail::button', ['url' => url('/confirm/' . $user->confirmation_token)])
        Confirm
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent