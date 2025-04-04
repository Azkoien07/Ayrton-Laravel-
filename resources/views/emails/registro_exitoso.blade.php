<!DOCTYPE html>
<html>
<head>
    <title>Registro Exitoso</title>
</head>
<body style="background-color: #F7F8FA; font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <table role="presentation" style="width: 100%; background-color: #F7F8FA; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" style="max-width: 600px; width: 100%; background: #FFFFFF; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px;">
                    
                    <tr>
                        <td style="text-align: center; padding: 10px;">
                            <h2 style="color: #4A5568;">👋 Hola, {{ $nombre }} </h2>
                            <p style="color: #718096;">¡Bienvenido a Ayrton! 🎉</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 20px; color: #2D3748; text-align: center;">
                            <p>Tu cuenta ha sido creada con éxito.</p>
                            <p>Puedes iniciar sesión con tu correo:</p>
                            <p style="font-size: 18px; font-weight: bold; color: #4A5568;">{{ $correo }}</p>
                        </td>
                    </tr>
                
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <a href="{{ url('/') }}" style="background-color: #2C5282; color: #FFFFFF; padding: 12px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">Ir a Ayrton</a>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: center; padding: 10px; color: #718096; font-size: 12px;">
                            <p>Si no solicitaste este registro, ignora este mensaje.</p>
                            <p>Saludos,</p>
                            <p>El equipo de Ayrton</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
