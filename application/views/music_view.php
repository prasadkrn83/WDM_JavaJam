<div class="right">
    <header id="header">
        <h1>JavaJam Coffee House</h1>
    </header>
    <div>
        <img id="headerimg" src="<?php echo base_url()?>assets/images/heroguitar.jpg">
    </div>
    <div id="musiccontent">
        <div id="musicHeader">
            <h3>Music at JavaJam</h3>
            <p>The first Friday each month at JavaJam is a special night. Join us from 8 pm to 11 pm for some music you wo'nt want to miss!</p>
        </div>
        <?php
            foreach ($performanceArray as $key => $value) {

                echo '<article>';
                echo '<header>'.$key.'</header>';

                    foreach ($value as  $key => $performance) {
                        echo '<p><img class=\'musicimg\' src=assets/'.$performance->getImageURL().'><span>'.$performance->getDescription().'</span></p>';
                        echo '<br>';
                    }
                echo '</article>';

               
            }
        ?>
    </div>
</div>