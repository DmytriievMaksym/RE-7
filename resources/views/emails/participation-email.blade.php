<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Заявка надіслана</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
<h2 style="color: #d97706;">Вітаємо, {{ $messageData['author'] }}!</h2>
<p>Вашу заявку на участь у виставці стендового моделізму надіслано на розгляд.</p>

<table style="border-collapse: collapse; width: 100%; max-width: 500px; margin-top: 15px;">
    <tr style="border-bottom: 1px solid #ddd;">
        <td style="padding: 8px 0; font-weight: bold;">Модель:</td>
        <td style="padding: 8px 0;">{{ $messageData['model'] }}</td>
    </tr>
    <tr style="border-bottom: 1px solid #ddd;">
        <td style="padding: 8px 0; font-weight: bold;">Категорія:</td>
        <td style="padding: 8px 0;">{{ $messageData['category'] }}</td>
    </tr>
    <tr style="border-bottom: 1px solid #ddd;">
        <td style="padding: 8px 0; font-weight: bold;">Масштаб:</td>
        <td style="padding: 8px 0;">{{ $messageData['scale'] }}</td>
    </tr>
    <tr style="border-bottom: 1px solid #ddd;">
        <td style="padding: 8px 0; font-weight: bold;">Телефон:</td>
        <td style="padding: 8px 0;">{{ $messageData['phone'] }}</td>
    </tr>
</table>

<p style="margin-top: 25px; font-size: 13px; color: #777;">
    З повагою,<br>
    Адміністрація виставки «Scale Models Expo»
</p>
</body>
</html>
