@component('mail::message')
# New Information for a Listing Where You're Invested
The admin team has just posted a new listing update. The update is as follows:

{{$content->content}}

Thanks,<br>
SALT Capital Management Team
@endcomponent
