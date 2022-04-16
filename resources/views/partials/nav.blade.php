<!doctype html>
<html lang=" str_replace('_', '-', app()->getLocale()) ">
<head>
    <meta charset="utf-8">

    <title>Mi cuenta</title>


    <script src=" {{asset('js/app.js')}} " defer></script>


    <link href=" {{asset('css/app.css')}} " rel="stylesheet" defer>
</head>

<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
</body>
</html>
