
<div class="main">


<?php 
        $count = 0;
        foreach($stories as $story): 
        $count = $count + 1;
        ?>
        
        <?php if($count% 4 == 1): ?>
        <ul class="content">
        <?php endif; ?>
            <li>
                <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>"><img src="<?= $story->img_url ?>" width="20%"
                        alt="001" /></a>
                <!--source: <?= $story->url ?> -->
            </li>
            <?php if($count % 4 == 0): ?>
        </ul>
        <?php endif; ?>
        <?php endforeach; ?>
        </ul>
</div>