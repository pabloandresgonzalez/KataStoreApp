<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Empresa</title>
  </head>
  <body>

    <div class="container" style="margin-top: 5%;">

      <div class="container-fluid" style="text-align: center;">



   <div class="card" >
    <div class="card-header">
      <h1>Empresa</h1>
    </div>
   <div class="card-body">
    
    <div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Formulario de resgitro</h2>
      <p class="lead">Por favor diligencie todos os campos.</p>
    </div>

        <div class="row g-5">
          
          <div class="col-md-7 col-lg-12">
            <form class="needs-validation" novalidate>
              <div class="row g-3">

                <form action="{{ url('empleados') }}" method="post" >
                  @csrf

                  <div>
                    <label for="name" >Nombre Completo</label>
                    <input type="text" name="name" value="">                    
                  </div>
                  <div>

                  <div>
                    <button type="submit" >Guardar</button>
                  </div>
                                   

                </form>

          </div>
        </div>
      </main>

    </div>
          
    </div>
  </div>

    <footer  style="margin-top: 8%;">
      ® Empresa 2022
    </footer>
  </div>
      

    </div>


  </body>
</html>