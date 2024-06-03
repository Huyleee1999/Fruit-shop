<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Account</title>
</head>
<body>
    <p>
        Hello <b>{{ $details['fullname'] }}</b> !
    </p>
    <br>
    <p>
        Here is your account details :
    </p>

    <table>
        <tr>
            <td>Full Name</td>
            <td>:</td>
            <td>{{ $details['fullname'] }}</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td>{{ $details['role'] }}</td>
        </tr>    <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{ $details['website'] }}</td>
        </tr>    <tr>
            <td>Register Day</td>
            <td>:</td>
            <td>{{ $details['datetime'] }}</td>
        </tr>
        <br><br><br>
        <center>
            <h3>Bấm vào dưới đây để xác minh tài khoản : </h3>
            <a href="{{ $details['url'] }}" style="text-decoration: none; color: #FAFAFA; padding: 9px; background-color: blue; font: bold; border-radius: 20%; ">Verify</a>
            <br><br>
            <p>
                Copy right @ 2024 | Laravel
            </p>
        </center>

    </table>
</body>
</html>