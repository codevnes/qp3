<?php
/**
 * Template Name: Media Library
 *
 * @package QP3
 */

get_header();
?>

<main id="primary" class="site-main media-library">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php the_content(); ?>

        <div class="media-library-tabs">
            <ul class="tabs-navigation">
                <li class="tab-item active" data-tab="images">Thư Viện Ảnh</li>
                <li class="tab-item" data-tab="videos">Thư Viện Video</li>
            </ul>

            <div class="tabs-content">
                <!-- Image Library Tab -->
                <div class="tab-panel active" id="images-panel">
                    <?php
                    $images = get_field('library_images', 'option');

                    if ($images) : ?>
                        <div class="image-gallery">
                            <?php foreach ($images as $image) : ?>
                                <div class="gallery-item">
                                    <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($image['caption']); ?>">
                                        <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="no-items-message">
                            <p>Chưa có hình ảnh nào được thêm vào thư viện.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Video Library Tab -->
                <div class="tab-panel" id="videos-panel">
                    <?php
                    $videos = get_field('library_videos', 'option');

                    if ($videos) : ?>
                        <div class="video-grid">
                            <?php foreach ($videos as $video) : 
                                $video_title = $video['title'];
                                $video_thumbnail = $video['thumbnail'];
                                $video_url = $video['video_url'];
                            ?>
                                <div class="video-item">
                                    <div class="video-thumbnail">
                                        <?php if ($video_thumbnail) : ?>
                                            <a href="<?php echo esc_url($video_url); ?>" data-fancybox="video">
                                                <img src="<?php echo esc_url($video_thumbnail['sizes']['medium']); ?>" alt="<?php echo esc_attr($video_title); ?>">
                                                <div class="play-button"></div>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url($video_url); ?>" data-fancybox="video">
                                                <div class="placeholder-thumbnail">
                                                    <div class="play-button"></div>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <h4 class="video-title"><?php echo esc_html($video_title); ?></h4>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="no-items-message">
                            <p>Chưa có video nào được thêm vào thư viện.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // JavaScript functionality moved to media-library.js
    // See functions.php for enqueuing
</script>

<style>
/* Basic Styling for Media Library */
.media-library {
    padding: 40px 0;
}

.media-library-tabs {
    margin-top: 30px;
}

.tabs-navigation {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0 0 30px;
    border-bottom: 1px solid #ddd;
}

.tab-item {
    padding: 10px 20px;
    cursor: pointer;
    border: 1px solid transparent;
    border-bottom: none;
    margin-bottom: -1px;
    background-color: #f5f5f5;
    margin-right: 5px;
}

.tab-item.active {
    background-color: #fff;
    border-color: #ddd;
    border-bottom-color: #fff;
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
}

/* Image Gallery Styling */

.image-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.gallery-item img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
}

.gallery-item a {
    display: block;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.gallery-item:hover img {
    transform: scale(1.05);
}

/* Video Grid Styling */
.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.video-item {
    margin-bottom: 20px;
}

.video-thumbnail {
    position: relative;
    margin-bottom: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow: hidden;
}

.video-thumbnail img,
.placeholder-thumbnail {
    width: 100%;
    height: auto;
    display: block;
}

.placeholder-thumbnail {
    background-color: #f0f0f0;
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background-color: rgba(0,0,0,0.7);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s;
}

.play-button:before {
    content: "";
    width: 0;
    height: 0;
    border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
    border-left: 20px solid white;
    margin-left: 5px;
}

.video-thumbnail:hover .play-button {
    background-color: rgba(0,0,0,0.9);
}

.video-title {
    margin: 10px 0;
}

.video-description {
    color: #666;
    font-size: 14px;
}

.no-items-message {
    background-color: #f8f8f8;
    padding: 30px;
    text-align: center;
    border-radius: 5px;
}
</style>

<?php get_footer(); ?> 