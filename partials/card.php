<!-- Card Template um Übungen auszugeben -->
<?php 

if(session_id() == ''){
    //session has not started
    session_start();
}

?>
<aside class="workout-card">
    <form name="workout" class="exercise-save-form-<?php echo $row['id'] ?>" method="POST">
    <img class="exer-picture" src="img/<?php echo $row['exer_picture']?>" alt="<?php $row['exer_name'];?>">
    <p class="exer-name"><?php echo $row['exer_name']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-description"><?php echo $row['exer_description']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-category"><?php echo $row['exer_category']?></p>
    <!-- Button um Workout zu speichern -->
    <?php 
    if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
       echo '<input type="submit" class="btn-save btn" value="save" name="save" id="control-'. $row["id"] .'">';
    }
    ?>
    
    </form>
</aside>

<script>
// Wenn Workout gespeichert wird, Neuladen der Seite verhindern
$(document).ready(function(){
$(".exercise-save-form-<?php echo $row['id'] ?>").submit(function(e) {
    e.preventDefault();

    console.log('<?php echo $row['exer_name']?>');
    toastr.success('Saved!');
    // POST-Anfrage schicken mit ID von Workout
    $.post("partials/saveexercises.php", {exer_id: <?php echo $row['id'] ?>}, function(data) {
        $("#control-<?php echo $row["id"]?>").addClass("disabled");
        $("#control-<?php echo $row["id"]?>").attr("disabled", true);
        console.table(data);
    });
})});
</script>


