<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso - Ayrton</title>
</head>

<body style="background-color: #F7F8FA; font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #F7F8FA; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 600px; background-color: #FFFFFF; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); overflow: hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="padding: 30px 20px 10px; text-align: center;">
                            <h2 style="margin: 0; font-size: 24px; color: #2D3748;">👋 ¡Hola, {{ $nombre }}!</h2>
                            <p style="margin: 5px 0 0; color: #718096;">Bienvenido a <strong>Ayrton</strong> 🎉</p>
                        </td>
                    </tr>

                    <!-- Main -->
                    <tr>
                        <td style="padding: 20px; text-align: center; color: #4A5568; font-size: 16px; line-height: 1.6;">
                            <p style="margin: 0 0 10px;">Tu cuenta ha sido creada con éxito.</p>
                            <p style="margin: 0 0 10px;">Puedes iniciar sesión usando este correo:</p>
                            <p style="font-size: 18px; font-weight: bold; color: #2C5282; margin: 0;">{{ $correo }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px; text-align: center;">
                            <a href="{{ url('/') }}" style="display: inline-block; background-color: #2C5282; color: #FFFFFF; padding: 12px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 16px;">
                                Ir a Ayrton
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px; text-align: center; color: #A0AEC0; font-size: 12px;">
                            <p style="margin: 0 0 5px;">Si no solicitaste este registro, puedes ignorar este mensaje.</p>
                            <p style="margin: 0;">Saludos,<br>El equipo de Ayrton</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>