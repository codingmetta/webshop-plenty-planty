<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">
  <a class="navbar-brand" href="../index.php">Plenty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Links -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="modifyProductList.php">Products</a>
    </li>
     <li class="nav-item active">
      <a class="nav-link" href="modifyUserList.php">Costumers</a>
    </li>
    </ul>
    <ul class="navbar-nav navbar-right">
        <li class="nav-item ">
        <a class="nav-link text-danger" href="../scripts/destroySession.php">Log Out</a></li>
    </ul>
</nav>


    <br> <br>

    <div class="container">
        <!-- Card displaying Users from db-->
        <div class="card d-flex bg-light justify-content-center" id="right-card" style="max_width:80%; padding: 3.5%" >
            <div class="card-head">
                <br> <br>
                <h1 class="text-center"> Welcome back, Admin! </h1>
            </div>
            <div class="card-body">
                <br> 
                <h3><i class="fas fa-users" style="margin:1%"></i> Costumer List </h3>
                <br>
                <table class="table table-striped table-bordered" id="productList">
                    <thead> 
                        <tr>
                            <th>Costumer ID</th>
                            <th>Forename</th>
                            <th>Surname</th>
                            <th>Username</th>
                            <th>E-Mail</th>
                        </tr>
                    </thead>

                    <?php
                    require '../scripts/login.php';

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "SELECT user_id, forename, surname, username, email FROM Users";
                    $result = $conn->query($sql);

                    ?>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr> 
                            <td>" . $row[0] .  "</td>
                            <td>" . $row[1] .  "</td>
                            <td>" . $row[2] .  "</td>
                            <td>" . $row[3] .  "</td>
                            <td>" . $row[4] .  "</td>
                            </tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                    </tbody>
                </table>
                <br>
                <hr>

                <!--Card/Section where Admin can Remove an user from db-->
                <div class="d-flex flex-row justify-content-end">
                    <div id="remove-group" class="card text-white bg-dark p-2" style="max-width: 25%" >
                        <div class="card-header">
                            <h5> Remove Costumer </h5>
                        </div>
                        <div class="card-body">
                            <label for="remove">
                      
                            <form name= "remove" action="../scripts/deleteUser-submit.php" method="post">
                            <input type="text" placeholder="Username" name="remove" id="remove" required></label>
                       
                            <hr> 
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash-alt" style="margin:2%"></i> Remove </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
</div>
</body>
</html>