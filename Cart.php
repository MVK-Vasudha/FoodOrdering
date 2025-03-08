<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom CSS for bold bisque-colored table borders and hr tag */
        #myToast {
  position: fixed;
  bottom: 20px; /* Adjust this value as needed */
  right: 20px; /* Adjust this value as needed */
  z-index: 1050; /* Ensure it's above other content */
}
        #popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      height: 200px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      padding: 20px;
      text-align: center;
    }
    #popup h3 {
      margin-bottom: 10px;
    }

    #popup p {
      margin-bottom: 10px;
    }

    .popup-buttons {
      margin-top: 20px;
    }

    .popup-buttons button {
      margin-right: 10px;
    }

    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    .no-scroll {
      overflow: hidden;
    }
        .table {
            border-collapse: collapse;
            border: 4px solid bisque; /* Bold black-colored table border */
            max-width: 65%; /* Reduced max-width */
            max-height: 100%;
            margin: 0 auto; /* Center the table */
            background-color: bisque; /* Bisque background color */
        }
        .table thead tr{
            background-color : bisque;
        }
        th, td {
            border: 2px solid bisque; /* Border color black */
            padding: 8px;
            text-align: left;
            color: brown; /* Brown text color */
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternate row background color */
        }
        tr:nth-child(odd) {
            background-color: white; /* Alternate row background color */
        }
        hr.table-divider {
            border-top: 4px solid bisque; /* Bold bisque-colored hr tag */
            color: bisque; /* Set color of hr tag */
        }
        .payment-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: brown;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .payment-button:hover {
            background-color: darkred;
        }
    </style>
    <link rel="stylesheet" href="Items.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg " id="main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="Main.html">
                <img src="https://img.freepik.com/free-vector/food-shopping-logo-template-design_460848-10299.jpg?size=626&ext=jpg&ga=GA1.1.2082370165.1711411200&semt=ais"
                    id="nav-img">
                Fast Foodzz
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mx-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Main.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Menu.html">Our Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Deal.html">Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cart.php">Your Cart</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <center><h2 style="color: brown;">Food Cart</h2></center>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th style="color: brown;">Id</th>
                <th style="color: brown;">Name</th>
                <th style="color: brown;">Quantity</th>
                <th style="color: brown;">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname= "demo";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password,$dbname);
            $sql="select * from book";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "
                        <tr>
                        <td style='color: brown;'>" . $row['Book_Id'] . "</td>
                        <td style='color: brown;'>" . $row['Item_Name'] . "</td>
                        <td style='color: brown;'>" . $row['Item_Count'] . "</td>
                        <td style='color: brown;'>" . $row['Item_Cost'] . "</td>
                        </tr>";
    
                }
            }else{
                echo "<tr><td colspan='4' style='text-align: center; color : brown;'>No data found</td></tr>"; // Center align "No data found" message
            }
            
            ?>
        </tbody>
    </table>
    <div id="popup">
    <h3>Are you sure to make this purchase?</h3>
    <div id="popup-form"></div>
    <div class="popup-buttons">
      <button id="popup-submit">Submit</button>
      <button id="popup-close">Close</button>
    </div>
  </div>
  <div id="overlay"></div>

  <button class="payment-button">Make Payment</button>
  <div class="toast toast-bottom-right" id="myToast" role="alert" aria-live="assertive" aria-atomic="true"
    data-delay="5000">
    <div class="toast-header">
      <strong class="mr-auto">Payment Succesful <span class="tick-icon">&#10003;</span id="toast-head"></strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Payment has been made succesfully
    </div>
  </div>

    <script>
        $(document).ready(function () {

$('.payment-button').click(function (e) {
  e.preventDefault();
  

  $.ajax({
    type: 'POST',
    url: 'carty.php',
    data: {
    },
    success: function (response) {
      $('#popup-form').html(response);
      console.log(response);
      $('#popup, #overlay').show();
      $('body').addClass('no-scroll');
    }
  });
});

$('#popup-close, #overlay').click(function () {
  $('#popup, #overlay').hide();
  $('body').removeClass('no-scroll');
});
});


$(document).ready(function () {
      $('#popup-submit').click(function () {
        // Collect form data
        $('#popup, #overlay').hide();
        $('body').removeClass('no-scroll');
        
        // AJAX call to send form data to external PHP file
        $.ajax({
          type: 'POST',
          url: 'delete.php', // Path to your external PHP file
          data: {},
          success: function (response) {
        // location.reload();
          $('#myToast').toast('show');
          setTimeout(function () {
                    location.reload();
                }, 1500);
        
          },
          error: function (xhr, status, error) {
            console.error(error); // Log any errors
          }
        });
      });
    });


    </script>
</body>
</html>
