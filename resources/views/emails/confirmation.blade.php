<!DOCTYPE html>
<html>
  <body>
    <p>Thank you! Please confirm your email by clicking the link below:</p>
    <a href="{{ url('/confirm?email=' . urlencode($email)) }}">Confirm Email</a>
  </body>
</html>
