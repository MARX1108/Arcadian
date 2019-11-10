
    <div class="main">

<?php 
$count = 0;
foreach($stories as $story): 
$count = $count + 1;
?>

<?php if($count% 4 == 1): ?>
<!-- <ul class="content"> -->
<div id="news" class="row card-deck">

    <?php endif; ?>
    <div class="card pic_story">
        <!-- <li> -->
        <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>"><img src="<?= $story->img_url ?>" class="pic"
                width="100%" alt="001" /></a>
        <!--source: <?= $story->url ?> -->
        <!-- </li> -->
    </div>
    <?php if($count % 4 == 0): ?>
    <!-- </ul> -->
</div>
<?php endif; ?>
<?php endforeach; ?>
</ul>

</div>