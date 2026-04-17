<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Message</title>
</head>
<body style="background: #f4f4f4; font-family: Arial, Helvetica, sans-serif;">

    <div style="width: 600px; margin: 40px auto; background: #fff; border: 1px solid #ddd; padding: 20px; border-radius: 6px;">
        <h2 style="color: #333;">Dear Admin,</h2>
        <p style="color: #555;">Hope this email finds you well.</p>

        <p style="color: #333;">There is a new contact message with the following information:</p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; width: 100px;">Name:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['name'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Email:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Subject:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['subject'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Message:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['msg'] }}</td>
            </tr>
        </table>

        <br>
        <p style="color: #555;">Best Regards,<br> Your Website</p>
    </div>

</body>
</html>
