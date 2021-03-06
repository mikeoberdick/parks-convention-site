<?php
//vars
$images = get_field('images');
$imageList = explode (",", $images);

$price = get_field('price');
if (is_numeric($price)) {
  $formattedPrice = number_format($price); 
}

$specialPrice = get_field('special_price');
if (is_numeric($specialPrice)) {
  $formattedSpecialPrice = number_format($specialPrice); 
}

$flag = get_field('flag');

$year = get_field('year'); //2020
$make = get_field('make'); //Cadillac
$coachbuilder = get_field('coachbuilder');  //Platinum Coach
$model = get_field('model'); //Phoenix
$chassis = get_field('chassis'); //XTS
$body = get_field('body'); //Hearse
?>

<div class="link" data-link = "<?php the_permalink(); ?>">
    <div class="car-wrapper">
        <div class="image-wrapper position-relative">
        <img class = "lazy w-100" src="<?php echo $imageList[0] . '?auto=compress&fit=clamp&h=340&w=510'; ?>">

        <?php if( $formattedSpecialPrice ) { ?>     
               <div class="ribbon convention-special"><span>Convention Special</span></div>
        <?php } else if ( $flag != 'New' && $flag != 'Pre-Owned' && $flag != 'Featured' ) { ?>
            <div class="ribbon<?php if($flag === 'Deal Pending') {echo ' deal-pending';} elseif ($flag === 'Consignment') {echo ' consignment';} elseif ($flag === 'Coming Soon') {echo ' coming-soon';} elseif ($flag === 'Parks Auction') {echo ' parks-auction';} elseif ($flag === 'As Is') {echo ' as-is';} elseif ($flag === 'Sold') {echo ' sold';} elseif ($flag === 'EBay Auction') {echo ' ebay-auction';}; ?>"><span><?php the_field('flag'); ?></span>
            </div>
        <?php } ?>

        </div><!-- .image-wrapper -->
        
        <div class="featured-info content-wrapper p-3">
            <div>
            <h5 class = "mb-3 font-weight-bold black"><span class = 'gold'><?php echo $year . ' ' . $make; ?></span> <?php echo $coachbuilder . ' ' . $chassis . ' ' . $model . ' ' . $body; ?></h5>
            <div class="details small">
                <p>Stock #: <?php the_field('stock'); ?>
                <?php //limit the length of options string
                $options = get_field('options');
                if ($options) {
                $options = mb_strimwidth($options, 0, 65, "..."); ?>
                | <?php echo $options; ?></p>
                <?php } ?>
            <hr>
            </div><!-- .details -->    
            </div>
            <div class="d-flex justify-content-between align-items-center mt-auto">
                <div class="price">
                    <h4 class = "font-weight-bold black">
                        <?php if ( $flag == 'New' || empty($price) ) {
                            echo 'Call For Pricing';
                        } else {
                            echo '$' . $formattedPrice;
                        } ?></h4>
                </div><!-- .price -->
                <?php if (get_field('video')) : ?>
                <div class="video-icon d-flex justify-content-center align-items-center">
                    <i class="gold fa fa-youtube-play mr-2" aria-hidden="true"></i>
                    <span class = "gold h5 small mb-0">Video<br>Available</span>
                </div><!-- .video-icon -->
                <?php endif; ?>
            </div>
        </div><!-- .featured-info -->
    </div><!-- .car-wrapper -->	
</div><!-- .car -->