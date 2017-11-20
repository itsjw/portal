<h1>Welcome to {{ config('app.name') }}!</h1>

Please Confirm Your email:

<a href="{{ url('/confirm/' . $user->confirmation_token) }}">Confirm</a>

<br><br>
Thanks,<br>
{{ config('app.name') }}