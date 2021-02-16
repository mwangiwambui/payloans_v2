<!DOCTYPE html>
<html>
<head>
    <title>Guarantor Request Notification</title>
</head>
<body>
<h2>Hi {{$details['name'][0]['name']}}</h2>
<br>
<p>You have been requested by {{ $details['requestor'][0]['name'] }} to be their loan guarantor.</p>
<p>Kindly click on link below to approve the request</p>
<br>
{{$details['id'][0]['id']}}
<a href="{{route('approve.guarantor', $details['id'])}}">Verify Request</a>


{{--<h1>{{ $details['title'] }}</h1>--}}
{{--<p>{{ $details['body'] }}</p>--}}

<p>Thank you</p>
</body>
</html>
