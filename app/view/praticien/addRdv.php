<link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap53.min.css" type="text/css"/>
        <div class="card">
        <div class="card-body bg-light">
          <h5 class="card-title">Ajouter des disponibilités</h5>
            <div class="mx-lg-3">
                <form method="GET" action="router2.php">
                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Date (jj/mm/aaaa) :</label>
                        <div class="col-sm-10">
                            <input type="text" name="date" id="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre_rdv" class="col-sm-2 col-form-label">Nombre de rendez-vous successifs :</label>
                        <div class="col-sm-10">
                            <input type="number" name="nombre_rdv" id="nombre_rdv" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
    </body>