<!-- Card Template um Übungen zu löschen -->
<aside class="workout-card workout-card-<?php echo $row['id'] ?>">
    <form name="workout" class="exercise-delete-form-<?php echo $row['id'] ?>" method="POST">
    <img class="exer-picture" src="img/<?php echo $row['exer_picture']?>" alt="<?php $row['exer_name'];?>">
    <p class="exer-name"><?php echo $row['exer_name']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-description"><?php echo $row['exer_description']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-category"><?php echo $row['exer_category']?></p>
    <!-- Button um Workout zu löschen -->
    <input type="submit" value="Delete" name="delete" class="btn-delete btn">
    </form>
</aside>

<script>
// Wenn Workout gelöscht wird, Neuladen der Seite verhindern
$(document).ready(function(){
$(".exercise-delete-form-<?php echo $row['id'] ?>").submit(function(e) {
    e.preventDefault();
    toastr.success('Deleted!');

    $(".workout-card-<?php echo $row['id'] ?>").remove();
    // POST-Anfrage schicken mit ID von Workout    
    $.post("includes/deleteexercises.php", {exer_id: <?php echo $row['id'] ?>}, function(data) {
        console.log('deleted');
        console.log(data);
        });
    })
});
</script>


