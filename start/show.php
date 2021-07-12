<?php require 'lib/functions.php'; ?>
<?php require 'layout/header.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id =$_SERVER['QUERY_STRING'];
 $pet=show_pets($id);
}else{
    $no = 0;
}
//my code wasn't working because of the slight difference of fetch and fetch all
?>
<div class="container">
        <div class="row">
                <h1>Displaying the content of <?php echo $pet['name']; ?> pet</h1>
                <div class="col-xs-3 pet-list-item">
            <img src="images/<?php echo $pet['image']; ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $pet['bio']; ?>
            </p>

            <table class="table">
                <tbody>
                    <tr>
                        <th>Breed</th>
                        <td><?php echo $pet['breed']; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $pet['age']; ?></td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td><?php echo $pet['weight']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>

   <!-- like each member in the database has his or her own profile page.  -->

<?php require 'layout/footer.php'; ?>