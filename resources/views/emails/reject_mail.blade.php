<!DOCTYPE html>
<html>
<head>
    <title>Progress Email Notification</title>
</head>

<body>
<h2 style="text-decoration: underline;">Proposal Rejected Mail.</h2>
<br/>
Hi!,</br>
This is to let you know that your proposal was <strong>rejected</strong> from the initial stage as it could not meet our minimum conditions. Try again Later.<br><br>
<b>Title:</b>{{$proposal->title}}<br><br>
<b>Description:</b> {{$proposal->summary}}<br><br>
<p>Thanks for your proposal.</p>
</body>

</html>