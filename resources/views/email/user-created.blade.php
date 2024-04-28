@component('mail::message')
Hello **{{ $user->firstname }}****{{$user->lastname}}**,

Your account has been created successfully.

**Here is your login information:** <br>
Email: {{$user->email}} <br>
Password: {{$rawPassword}}

Please login to the system and change your password: [Click here to login]({{ route('login') }})

Thank you!<br>
Best regards,<br>
ICT Team
@endcomponent