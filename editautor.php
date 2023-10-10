<?php
require_once './connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
<form action="index.php" method="post">
<div class="form-group">
<label for="">Id for edit:</label>
<input type="text" name="id" class="form-control">  
<label for="">Name new:</label>
<input type="text" name="name" class="form-control">

</div>
<?php
$stmt=$pdo->query('select * from autors');

$autors=$stmt->fetchAll(PDO::FETCH_OBJ);
?>

<table class="table">
    <?php foreach ($autors as $autor) : ?>
        <tr>
    <td><?= $autor->Id ?></td>
    <td><?= $autor->name ?></td>
    <td></td>
    
    
    
    
        </tr>
    <?php endforeach?>
    
    
    </table>
    
    
    </div>
<button class="btn btn-primary mt-3" style="margin-left:100px" name="edit">Edit</button>
</form>
</div>


</body>
</html>