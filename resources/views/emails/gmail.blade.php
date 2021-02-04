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
<a href="{{url('approve_guarantor'), $details['id'][0]['id']}}">Verify Request</a>


{{--<h1>{{ $details['title'] }}</h1>--}}
{{--<p>{{ $details['body'] }}</p>--}}

<p>Thank you</p>
</body>
</html>
St
