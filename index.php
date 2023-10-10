<?php
//1 cпосіб застарілий

//$connect=mysql('','','')-щлях підключення' '
//$res=mysql_query($connect, 'Select ...')


//2 cпосіб робота з  класами  тілики з СБД mysql

//$connect=new mysqli('');
//$res=$connect->query('Select ...');

//3 cпосіб-бази данних PostgreSql, Oracle, SQLite, Ms SQL Server, Firebird ...

//$connect=new PDO('')




require_once './connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<h1>CRUD autors</h1>

<?php

/*if(isset ($_POST['add']))
{
    $name=$_POST['name'] ??'';
    //$pdo->query("INSERT into autors(name) values('$name')");
    $stmt=$pdo->prepare("INSERT into autors(name) values(?)");
   
    $stmt->execute([$name]);

    //$stmt=$pdo->prepare("INSERT into autors(name) values(:name)");
    //$stmt->execute(['name'=>$name]);
}*/


if(isset ($_POST['add']))
{
    $name=$_POST['name'] ??'';
    //$pdo->query("INSERT into autors(name) values('$name')");
    $stmt=$pdo->prepare("INSERT into autors(name) values(?)");
   
    $stmt->execute([$name]);

    //$stmt=$pdo->prepare("INSERT into autors(name) values(:name)");
    //$stmt->execute(['name'=>$name]);
}



if(isset ($_POST['add1']))
{
    $title=$_POST['title'] ??'';
    $autor_id=$_POST['autor_id'] ??'';
  
    $stmt=$pdo->prepare("INSERT into books(title, autor_id) values(?, ?)");
   
    $stmt->execute([$title,$autor_id]);

   
}




if(isset ($_POST['edit']))
{
    if (isset($_POST["id"]) ) {
      
        $sql = "SELECT * FROM autors ";
        $id = $_POST['id'] ??'';

        $name=$_POST['name'] ??'';
               
          $stmt=$pdo->prepare("UPDATE autors SET name=:name WHERE id = :id");

         $stmt->bindValue(":id",$_POST['id']);
         $stmt->bindValue(":name",$_POST['name']);
         
        $stmt->execute();
        $sql = "SELECT * FROM autors ";
      
       

    }
    
    
}


if(isset ($_POST['delete']))
{
    if (isset($_POST["id"]) ) {
      
        
        $sql = "SELECT * FROM autors ";
        $id = $_POST['id'] ??'';

       

         // $stmt=$pdo->prepare("DELETE FROM autors WHERE id = :id");
        

try {
    $stmt=$pdo->prepare("DELETE FROM autors WHERE autors.id = :id");
    $stmt->bindValue(":id",$_POST['id']);
         
         
    $stmt->execute();
   
    echo 'Видалено';
      
    $sql = "SELECT * FROM autors ";
    //throw new Exception('Помилка');    
} 
catch (Exception $e) {
    echo 'Не можна видалити автора, у якого є книги';
}

    
    
}
}











//$stmt=$pdo->query('select * from autors');
//$autors=$stmt->fetchAll(PDO::FETCH_OBJ);



//echo '<pre>' . print_r($autors,true). '</pre>';
//$autors=$stmt->fetch(PDO::FETCH_ASSOC);
//$autors=$stmt->fetch(PDO::FETCH_NUM);
//$autors=$stmt->fetch(PDO::FETCH_OBJ);
//$autors=$stmt->fetch(PDO::FETCH_CLASS,  );

?>
<!--<div class="container">
    <div>
    <a href="createautor.php">Create</a>
    <a href="editautor.php" style="margin-left: 100px;">Edit</a>
    <a href="editautor.php" style="margin-left: 100px;">Delete</a>
    </div>
    
<table class="table">
<?php foreach ($autors as $autor) : ?>
    <tr>
<td><?= $autor->Id ?></td>
<td><?= $autor->name ?></td>

<td></td>




    </tr>
<?php endforeach?>-->

<?php
$stmt=$pdo->query('SELECT autors.Id , autors.name, books.title  FROM autors,books WHERE books.autor_id=autors.Id');
$autorbook=$stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container" style="width: 600px;">
    <div>
    <a href="createautor.php">Create autor</a>
    <a href="createbook.php">Create book</a>
    <a href="editautor.php" style="margin-left: 100px;">Edit</a>
    <a href="deleteautor.php" style="margin-left: 100px;">Delete</a>
    </div>
    
<table class="table">
<?php foreach ($autorbook as $ab) : ?>
    <tr>
<td><?= $ab->Id ?></td>
<td><?= $ab->name ?></td>
<td><?= $ab->title ?></td>

<td></td>
    </tr>
<?php endforeach?>


</table>

</div>


<?php





?>
  



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


