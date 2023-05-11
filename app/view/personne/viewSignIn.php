<link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap53.min.css" type="text/css"/>
        <div class="card">
        <div class="card-body bg-light">
          <h5 class="card-title, text-danger">Formulaire d'inscription</h5>
          <div class='mx-lg-3'> 
          <form action="" method="post">
            <div class="form-group row">
              <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
              <div class="col-sm-10">
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Lemercier">
              </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">Prenom :</label>
                <div class="col-sm-10">
                <input type="text" id="prenom" name="prenom" class="form-control" placeholder ="Marc">
            </div>
         
        <div class="form-group row ">
            <label for="adresse" class="col-sm-2 col-form-label">Adresse :</label>
            <div class="col-sm-10">
            <input type="text" id="adresse" name="adresse" class="form-control" placeholder = "Troyes">
            </div>
            <div class="form-group row ">
        <div class="form-group row ">
            <label for="login" class="col-sm-2 col-form-label">Login :</label>
            <div class="col-sm-10">
            <input type="text" id="login" name="login" class="form-control">
         </div>
         <div class="form-group row ">
            <label for="password" class="col-sm-2 col-form-label">Password :</label>
            <div class="col-sm-10">
            <input type="password" id="password" name="password" class="form-control">
          </div>
              <br>
          <div class="form-group">
          <label for="statut">State :</label>
          <select id="inputState" class="form-control">
            <option> Administrateur</option>
            <option>Practicien</option>
            <option>Patient</option>
          </select>
          </div>
              <br>
          <div class="form-group">
          <label for ="specialite">Votre spécialité si vous êtes praticien :</label>
          <select for="specialite" class="form-control">
            <option>Je ne suis pas un practicien</option>
            <option>Médecin généraliste</option>
            <option>Infirmier</option>
            <option>Dentiste</option>
            <option>Sage-femme</option>
            <option>Ostéopathe</option>
            <option>Kinésithérapeute</option>
          </select>
          <br>
          </div>
            <div class="form-group row">
            <div class="col-sm-10">
                <br>
              <button type="submit" class="btn btn-success btn-sm">Submit</button>
              <button type="submit" class="btn btn-danger btn-sm">Reset</button>
              <br>
            </div>
          </div>
        </form>
    </body>