<?php
require 'layout/header.php';?><!--inside the header file,we wil have to make the code inside it responsive by making a breadcrumb appear when it collapses.-->
<br>
<br>
<br>
<?php
include 'lib/functions.php';
//we need to read the super global variable known as $_POST
//we have numerous types of suger globals all of which have their functions on various scope in php program
//var_dump($_SERVER["CONTEXT_DOCUMENT_ROOT"]);
//you can use array_key_exists or use isset
// if(array_key_exists('name',$_POST)){
//     $name =$_POST['name'];
// }else{
//     $name='';
// }

// if(array_key_exists('breed',$_POST)){
//     $breed=$_POST['breed'];
// }else{
//     $breed ='';
// }
// if(array_key_exists('weight',$_POST)){
//     $weight=$_POST['weight'];
// }else{
//     $weight ='';
// }
// if(array_key_exists('bio',$_POST)){ 
//     $bio=$_POST['bio'];
// }else{
//     $bio ='';
// }
//using isset which is a short form of array_key_exists
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_POST['name'])){
    $name =$_POST['name'];
}else{
    $name='';
}

if(isset($_POST['breed'])){
    $breed=$_POST['breed'];
}else{
    $breed ='';
}
if(isset($_POST['weight'])){
    $weight=$_POST['weight'];
}else{
    $weight ='';
}
if(isset($_POST['bio'])){ 
    $bio=$_POST['bio'];
}else{
    $bio ='';
}

$pets =get_pets();
$newPet = array(
    'name'=> $name,
    'breed'=> $breed,
    'weight'=> $weight,
    'bio' => $bio,
    'age' => '',
    'image' => '',
);
$pets[] =$newPet;
$json = json_encode($pets , JSON_PRETTY_PRINT); 

file_put_contents('data/pets.json',$json);
//var_dump($name, $breed,$weight,$bio);
}

//var_dump(var_export($name));

?>



<div class="container">
<div class="row">
    <div class ="col-lg-6 col-sm-6 ">
    <h1>Add your Pet!</h1>
    </div>
    <div class ="col-lg-6 col-sm-6">
    <h1>Better adding an image on this side to or on the next div col in the 2nd row</h1>
    </div>
</div>
<div class="row"><!-- i plan on this being the 2nd form class where the content will be placed-->
<div class="col-xs-6">
<form class="" action="pets_new.php " method="POST">
    <div class="form-group">
    <label for="pet-name" class="control-label" >Name</label>
    <input class="form-control" type="text" name="name" id="pet-name">
    </div>
    <div class="form-group">
    <label for="pet-breed" class="control-label">Breed</label>
    <input class="form-control" type="text" name="breed" id="pet-breed">
    </div>
    <div class="form-group">
    <label for="pet-weight" class="control-label">Weight(lbs)</label>
    <input class="form-control" type="number" name="weight" id="pet-weight">
    </div>
    <div class="form-group">
    <label for="pet-bio" class="control-label">Pet Bio</label>
    <textarea class="form-control"  name="bio" id="pet-bio"></textarea>
    </div>
<button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-heart"></span>Add 
</button>
</form>
</div>
</div>
</div>
</div>



<?php
require 'layout/footer.php';?>

