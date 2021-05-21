<!-- Start of header -->

<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>

    </title>

      <!-- Boostrap CDN Link -->

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

      <!-- Data Table -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

</head>
<body>
<!-- End of header -->

<?php
    define("DB_SERVER","localhost");
    define("DB_USER","root");
    define("DB_PASS","");
    define("DB_NAME","test");

    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if(!$con){
        die("Connection Failed".mysqli_connect_error());
    }

?>



<!-- -------------------------------Start of Member Dispaly page in admin---------------------- -->

<section id="studentDisplay">

<div class="container">

<h2 class="d-flex justify-content-center font3"><strong>Student Data</strong></h2>


<!-------------------------------- Input box for Search Button----------------------------->

<div class="row">

    <div class="col-lg-4">
      <input class="form-control" id="totalmarks_search" type="number" placeholder="Enter Marks">
    </div>

</div>

<br>

<div class="table-responsive" id="downloadTable">

  <table id="mytable" class='table table-bordered table-striped'>

        <thead>

          <tr>

            <th>Student Name</th>

            <th>Phone Number</th>

            <th>Email ID</th>

            <th>Marks Subject 1</th>

            <th>Marks Subject 2</th>

            <th>Marks Subject 3</th>

            <th>Marks Subject 4</th>

            <th>Marks Subject 5</th>

            <th>Total Marks</th>

          </tr>

        </thead>

        <tbody id='myTableB'>



        <?php

        $query="SELECT * FROM `krishworks`";

        $result = $con->query($query);

        if($result->num_rows == 0)

        {

                echo "<p class='d-flex justify-content-center' style='color:red'><b>Not available</b></p>";

        }

        else{

            while($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>".$row['student_name']."</td>";

            echo "<td>".$row['phone_number']."</td>";

            echo "<td>".$row['email_id']."</td>";

            echo "<td>".$row['marks_sub1']."</td>";

            echo "<td>".$row['marks_sub2']."</td>";

            echo "<td>".$row['marks_sub3']."</td>";

            echo "<td>".$row['marks_sub4']."</td>";

            echo "<td>".$row['marks_sub5']."</td>";

            echo "<td class='totalmarks'>".$row['total_marks']."</td>";

            echo "</tr>";

            }

       }

       echo  "</tbody></table>";

    ?>
</div>
</div>
<div id="bypassme"></div>
</section>

<!-- -------------------------------End of Member Dispaly page in admin---------------------->

<!-- Start of footer -->

<!--Script tag for functioning of Search button --->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- JQuery CDN Link -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Bootstrap Bundle JS CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.jqueryui.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.jqueryui.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js" charset="utf-8"></script>

<script type="text/javascript">
$(document).ready(function(){

    $("#totalmarks_search").on("keyup", function() {
      var value = $(this).val();
      $("#myTableB tr").filter(function() {
        $(this).toggle($(this).find('.totalmarks').text() >= value)
      });

    });

    var table = $('#mytable').DataTable({
        lengthChange: false,
        buttons: ['pdf']
    });
    table.buttons().container().insertBefore('#mytable');


  });
</script>


<!-- Custom JS Link -->
<script src="js/custom.js"></script>

</body>

</html>




<!-- INSERT INTO `krishworks` (`id`, `student_name`, `phone_number`, `email_id`, `marks_sub1`, `marks_sub2`, `marks_sub3`, `marks_sub4`, `marks_sub5`, `total_marks`) VALUES (NULL, 'Ganesh', '9874512360', 'ganesh@gmail.com', '78', '95', '74', '98', '78', '423'); -->
