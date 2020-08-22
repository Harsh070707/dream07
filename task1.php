<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
   

    <title>Stylo</title>
  </head>
  <body>
    <div class="container mt-2 mb-4 p-2 shadow bg-black">
      <form action="process.php" method="POST">
        <div class="form-row justify-content-center">
        <div class="col-auto">
          <input type="text" name="Name" class="form-control" id="username" placeholder="User Name">
        </div>
          <div class="col-auto">
          <input type="text" name="Location" class="form-control" id="username" placeholder="Location">
        </div>
          <div class="col-auto">
          <input type="varchar" name="Email" class="form-control" id="username" placeholder="Email">
        </div>
          <div class="col-auto">
          <input type="number" name="Phone" class="form-control" id="username" placeholder="Phone no">
        </div>
       <div class="col-auto">
          <button type="submit" name="save" class="btn btn-info"> Save</button>
        </div> 
      </div>
        

      </form>
</div>

    <?php require_once  "process.php";
    ?>
     <div class="container">
       <?php if(isset($_SESSION['msg'])){?>
        <div class="<?=$_SESSION['alert']; ?>">
          <?= $_SESSION['msg'];
		  unset($_SESSION['msg']);?>
        </div>
       <?php } ?>
    <table class= "table">
   <thead>
     <tr>
     <th>Name</th>
           <th>Location</th>
             <th>Email</th>
              <th>Phone</th>
      <th>Action</th>
   </tr>
</thead>
<tbody>
  <form action="process.php" method="POST">
  <?php
  $sQuery= "SELECT * FROM data LIMIT 20";
  $result=$conn->query($sQuery);
  while ($row = $result->fetch_assoc()){
  ?>
        <tr>
           <td><?= $row['ID']; ?> </td>
           <td><?= $row['Name']; ?> </td>
           <td><?= $row['Location']; ?> </td>
           <td><?= $row['Email']; ?> </td>
           <td><?= $row['Phone']; ?> </td>
           <td>
            <button type="submit" name="delete" value="<?= $row['ID']; ?>" class="btn btn-danger">Delete</button>
          <button type="submit" name="edit" value="" class="btn btn-primary">Edit</button>
         </td>
         </tr>

     <?php } ?>
	 
     </form>
  </tbody>
 </table>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script type="text/javascript">
          $(document).ready(function(){
            setTimeout(function(){
              $(".alert").remove();

            },3000);
			$(".btn-primary").click(function(){
				$('.table').find('tr').eq(this.value).each(function(){
					$("Name").val($(this).find('td').eq(1).text());
					$("Location").val($(this).find('td').eq(1).text());
					$("Email").val($(this).find('td').eq(1).text());
					$("Phone").val($(this).find('td').eq(1).text());
				});
				$(".btn-info").attr("name","edit");
			});
          });

        </script>
  </body>
</html>