@component('mail::message')
# New Comments for a Listing Where You're Invested
There has been a new comment or update on a property where you're invested. Check it out to get updated or offer support for new investors.

<a href="{{route('investor-listing', $listing)}}"><button class="btn btn-primary">Go To Property</button></a>

Thanks,<br>
SALT Capital Management Team
@endcomponent
