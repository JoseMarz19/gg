<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Declinación de formato</title>
  <style>
    /* Estilos CSS para el cuerpo del correo electrónico */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    
    /* Estilos CSS para el contenido principal */
    .container {
      width: 600px;
      max-width: 100%;
      margin: 0 auto;
      background-color: #ffffff;
      border: 1px solid #cccccc;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    /* Estilos CSS para la cabecera */
    .header img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    
    /* Estilos CSS para los encabezados */
    h1 {
      font-size: 24px;
      color: #333333;
      margin: 20px;
    }
    
    /* Estilos CSS para los párrafos */
    p {
      font-size: 16px;
      line-height: 1.5;
      color: #666666;
      margin: 20px;
    }
    
    /* Estilos CSS para los botones */
    .button {
      display: inline-block;
      background-color: #4caf50;
      color: #ffffff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 16px;
      margin: 20px;
    }

    /* Estilos CSS para el pie de correo */
    .footer img {
      width: 100%;
      max-height: 100px;
      object-fit: cover;
      border-bottom-left-radius: 8px;
      border-bottom-right-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="public/img/correo/encabezado.jpg" alt="Cabecera del correo">
    </div>
    @php

    $user = DB::table('users')
        ->where('id', $authenticatedUserId)
        ->first();

        $course = DB::table('courses')
        ->where('id', $lesson->course_id)
        ->first();
        $lessons = DB::table('lessons')
        ->where('id', $lesson->lesson_id)
        ->first();
      
@endphp
    <h1>📨 DECLINACIÓN DEL DOCUMENTO 🎉</h1>
    <p>Estimado/a Alumno {{$student->name}}😊</p>
    <p>¡Le deseo un excelente día! 🌞</p>
    <p>El motivo de este mensaje es para informarle que su documento del curso:</p>
    <p><strong>{{$course->title}}</strong></p>
    <p>de la leccion correspondiente:</p>
    <p><strong>{{$lessons->name}}</strong></p>
    <p>¡Ha sido <span style="color: red;">DECLINADO</span>! 🚀🎉</p>
    <p>Sin más por el momento, le comento por favor reunase nuevamente con su instructor asignado. 
      Para poder realizar y ver las areas de oportunidad dentro del documento.
      ¡Le deseo mucho exito! 👏</p>
    <p>Atentamente,</p>
    <p>{{$user->name}} 👤</p>
    
    <a href="#" class="button">Botón de ejemplo</a>

    <div class="footer">
     
    </div>
  </div>
</body>
</html>
