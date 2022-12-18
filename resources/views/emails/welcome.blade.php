<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site {{$data['name']}}</h2>
<br/>
Your registered email address is {{$data['email']}}
<br/>
Your temporary password: {{$data['password']}}
</body>

</html>
