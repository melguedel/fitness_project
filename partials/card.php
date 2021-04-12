<aside class="workout-card">
    <!-- <img src="http://placekitten.com/200/200" alt=""> -->
    <img class="exer-picture" src="../img/<?php echo $row['exer_img']?>" alt="<?php $row['exer_name'];?>">
    <p class="exer-name"><?php echo $row['exer_name']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-description"><?php echo $row['exer_description']?></p>
    <span class="horizontal-rule"></span>
    <p class="exer-category"><?php echo $row['exer_category']?></p>
    <a href="" class="btn">Save</a>
    <!-- <a href="" class="btn">Details</a> -->
</aside>