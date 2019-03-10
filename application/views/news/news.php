<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-12">

        <div class="well bs-component">

            <h2>Jaunumi</h2>
            <?php if ($news) { ?>

                <?php
                foreach ($news as $article) {
                    $article = (object) $article; // quick and dirty 
                    ?>

                    <div class="row" id="article-<?php echo $article->id; ?>">
                        <h3 class="text-body"><?php echo $article->title; ?> <small><?php echo $article->date; ?></small></h3>
                        <p class="text-secondary">Lasi vairāk: <?php echo anchor($article->uri, $article->uri, ['target' => '_blank', 'class' => 'text-primary']); ?></p>
                    </div> 

                <?php } ?>

                <?php
            }
            else {
                echo '<p class="text-danger">Radušās problēmas ar ziņu parādīšanu.</p>';
            }
            ?>

        </div>
    </div>
</div>

<?php 