<?php if (isset($_POST['name'])){
$name = $_POST['name'];
$email = $_POST['email'];

require __DIR__ . "/classes/dbase.php";
$database = new Database();

$database->query('INSERT INTO testtable ( 
        name,
        email)
        VALUES ( 
        :name,
        :email)');
$database->bind(':name', $name);  
$database->bind(':email', $email);   
$database->execute();
$subscriber_id = $database->lastInsertId();

header("Location: index.php"); 
       die("index.php"); 


}
?>





<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


<?php require ('classes/queries/common.php');?>

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-primary" role="alert" style="margin-top: 40px;">
                <h1>This is a web page</h1>
            </div>

            <table class="table table-striped table-bordered" style="width:100%" id="myTable">
             <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
               </tr>
            </thead>
        <tbody>
        <?php foreach ($records as $row) { ?>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <button id="add-record-button" name="add-record-button" class="btn btn-sm btn-primary btn-block" style="margin-top: 30px;">Add a record</button>
       </div>
</div>

<div class="row" id="add-record">
        <div class="col-md-12">
<form action="index.php" method="post">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-3">
            Name
        </div>
        <div class="col-md-9">
            <input type="text" name="name" class="form-control" required="required">
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-3">
            Email
        </div>
        <div class="col-md-9">
            <input type="text" name="email" class="form-control" required="required">
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-success btn-block">Save</button>
        </div>
    </div>


</form>

        </div>
</div>





    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            $("#add-record").hide();
        } );

        $("#add-record-button").click(function(){
            $("#add-record").fadeIn();
        });


    </script>



	

	