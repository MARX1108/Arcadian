
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


<ul class="content">
    <li>
        <a href="../html/pic_002.html"><img src="<?= BASE_URL ?>/public/assets/001.jpg" alt="001" /></a>
        <!--source: https://dribbble.com/shots/7111300-HLA-Men-s-wardrobe-2 -->
    </li>
    <li>
        <a href="../html/pic_002.html"><img src="<?= BASE_URL ?>/public/assets/002.png" alt="002" /></a>
        <!-- source: https://dribbble.com/ugem -->
    </li>
    <li>
        <a href="../html/pic_002.html"><img src="<?= BASE_URL ?>/public/assets/003.png" alt="003" /></a>
        <!-- source: https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwimlazFr43lAhXDm-AKHTKLDDcQjRx6BAgBEAQ&url=https%3A%2F%2Fmarketplace.pipedrive.com%2Fapp%2Flive-chat%2F3661791d9e4ecbdf&psig=AOvVaw27bkW5JqcGTdlud29euZFD&ust=1570648440619095 -->
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/004.png" alt="004" /></a>
        <!-- https://dribbble.com/Ramotion -->
    </li>
</ul>

<ul class="content">
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/005.png" alt="005" /></a>
        <!-- source: https://dribbble.com/ -->
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/006.png" alt="006" /></a>
        <!-- source: https://dribbble.com/shots/7097107-Hagrid-s-Hut -->
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/007.png" alt="007" /></a>
        <!-- source: https://dribbble.com/outcrowd -->
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/008.png" alt="008" /></a>
        <!-- source: https://dribbble.com/denklenkov -->
    </li>
</ul>

<ul class="content">
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/007.png" alt="005" /></a>
        <!-- source: https://dribbble.com/outcrowd -->
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/003.png" alt="006" /></a>
        <!-- source: https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwimlazFr43lAhXDm-AKHTKLDDcQjRx6BAgBEAQ&url=https%3A%2F%2Fmarketplace.pipedrive.com%2Fapp%2Flive-chat%2F3661791d9e4ecbdf&psig=AOvVaw27bkW5JqcGTdlud29euZFD&ust=1570648440619095 -->
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/001.jpg" alt="007" />
            <!--source: https://dribbble.com/shots/7111300-HLA-Men-s-wardrobe-2 -->
        </a>
    </li>
    <li>
        <a href="../html/pic_002_alternative.html"><img src="<?= BASE_URL ?>/public/assets/002.png" alt="008" />
            <!-- source: https://dribbble.com/ugem -->
        </a>
    </li>
</ul>
</div>