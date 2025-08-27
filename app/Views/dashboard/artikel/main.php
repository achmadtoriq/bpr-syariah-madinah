<div class="container mx-auto mt-28">

    <?php
    if ($tipe == 1) :
    ?>
        <div class="grid grid-cols-5 gap-3">
            <?php
            echo '<pre>';
            print_r($articles);
            echo '</pre>';
            if (isset($articles) && is_array($articles)):
                foreach ($articles as $article):
            ?>
                    <div class="border rounded-sm p-2 space-y-2">
                        <img src="<?= base_url('articles/thumbnails/' . $article['thumbnail']) ?>" alt="" srcset="">
                        <a href="<?= base_url('artikel/' . $article['slug']) ?>" target="_blank">
                            <h2 class="text-lg font-semibold"><?= $article['title'] ?></h2>
                        </a>
                        <div class="flex gap-2">

                        </div>
                        <div class="flex justify-between text-gray-400 text-xs border-t border-t-gray-300 py-2">
                            <p><?= $article['user_id'] ?></p>
                            <p><?= $article['published_at'] ?></p>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    <?php
    elseif ($tipe == 2) :
    ?>
        <div class="max-w-5xl mx-auto space-y-10">
            <h1 class="text-xl font-bold"><?= $article['title'] ?></h1>

            <div class="ck-content space-y-8 text-justify flex flex-col">
                <?= $article['content'] ?>
            </div>
        </div>
    <?php
    endif;
    ?>
</div>