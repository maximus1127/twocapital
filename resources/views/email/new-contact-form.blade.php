@component('mail::message')
# New Contact Form Message

The user {{$user.' at '.$email}} has sent a message. The message is:
<br />
{!!$content!!}

{!!$permission!!}

Thanks,<br>
SALT Capital Development Team
@endcomponent
