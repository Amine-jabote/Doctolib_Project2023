<?php
        // Check if user is present in the personne table
        $stmt = $conn->prepare("SELECT * FROM personne WHERE login=? AND password=?");
        $stmt->bind_param("ss", $_POST['login'], $_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // User is present in the table, redirect to fragmentmenu.php
            header("Location: fragmentmenu.php");
            exit;
        } else {
            // User is not present in the table, display an error message
            echo "Invalid login or password";
        }
?>    


<link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap53.min.css" type="text/css"/>
        <div class="card">
        <div class="card-body bg-light">
          <h5 class="card-title, text-danger">Formulaire de connexion</h5>
          <div class='mx-lg-3'> 
          <form action="" method="post">
          <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">Login :</label>
            <div class="col-sm-10">
            <input type="text" id="login" name="login" class="form-control" >
          </div>
          <div class="form-group row ">
            <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Password :</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
          </div>
          <br>
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