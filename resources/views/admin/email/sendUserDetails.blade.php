<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verify Account</title>
</head>
<body>
	<h1>Dear {{$user->first_name}} ,</h1>												
	<p>Your account created successflly. Your Credentials are
	<p>Username/Email: {{ $user->email }}</p>
	<p>Password: {{ $password }}</p>

	<p>Please change your password as soon as possible.</p>
</body>
</html>