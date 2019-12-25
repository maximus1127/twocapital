<table>
    <thead>
    <tr>
        <th>Investor</th>
        <th>Email</th>
        <th>          Amount Invested        </th>
        <th>ACH</th>
        <th>Routing</th>
        <th>Bank Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($investments as $investment)
        <tr>
            <td>{{ $investment->user->fname.' '.$investment->user->lname }}</td>
            <td>{{ $investment->user->email }}</td>
            <td>{{ $investment->amount_invested }}</td>
            <td>{{decrypt($investment->ach)}}</td>
            <td>{{ decrypt($investment->routing) }}</td>
            <td>{{ $investment->bank_name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
