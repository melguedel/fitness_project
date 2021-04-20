<!-- Card Template um Übungen auszugeben -->
<aside class="workout-card">
    <form name="workout" class="exercise-save-form-<?php echo $row['id'] ?>" method="POST">
    <img class="exer-picture" src="img/<?php echo $row['exer_picture']?>" alt="<?php $row['exer_name'];?>">
    <p class="exer-name"><?php echo $row['exer_name']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-description"><?php echo $row['exer_description']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-category"><?php echo $row['exer_category']?></p>
    <!-- Button um Workout zu speichern -->
    <input type="submit" value="Save" name="save" class="btn-save btn">
    </form>
</aside>

<script>
// Wenn Workout gespeichert wird, Neuladen der Seite verhindern
$(document).ready(function(){
$(".exercise-save-form-<?php echo $row['id'] ?>").submit(function(e) {
    e.preventDefault();
    console.log('<?php echo $row['exer_name']?>');
    toastr.success('Saved!');
    });
});
</script>


