<?php
	if (!isset($ShortcodeParser)){
		$ShortcodeParser = new ShortcodeParser\ShortcodeParser();
	}
	
	// Count all reviews in the system
	$reviewCount = \Reviews\Review::count();

	// Query all reviews in the system, ordered by posted_timestamp column DESC (newest first)
	$reviews = \Reviews\Review::query(null,
		resultOrder: (new \Nox\ORM\ResultOrder())
			->by("posted_timestamp", "DESC")
		);
	
	// If there are no reviews, exit the include
	if ($reviewCount === 0){
		return;
	}
	
	// Calculate either 4-span for > 2 reviews, 6-span for two reviews, or 12-span for one review.
	$reviewColumnSpan = ($reviewCount > 2) ? 4 :
		($reviewCount === 2 ? 6 : 12);
?>	
<div class="reviewPage">
	<div id="review-carousel" class="carousel slide" data-ride="carousel" style="height:100%!important;">
		<div class="carousel-inner">
			<?php
				// Chunk into multiple arrays of 3 items
				$chunkedReviews = array_chunk($reviews, 3);
				foreach($chunkedReviews as $index=>$chunk){
					?>
					<div class="carousel-item <?= $index === 0 ? "active" : "" ?>">
						<div class="row">
						<?php
							foreach($chunk as $reviewItem){
								$reviewBody = $reviewItem->body;
								
								// Truncate text with ellipsis if it is longer than 200 characters
								if (strlen($reviewBody) > 200){
									$reviewBody = substr($reviewBody, 0, 199) . " [...]";
								}
								
								?>
								<div class="col-xl-<?= $reviewColumnSpan ?> pb-4">
									<div class="review-item bg-dark text-white fancy-quote-border p-4 mb-3 shadow">
										<div class="open-quote-review">
											<i aria-hidden="true" class="fas fa-quote-left"></i>
										</div>
										<div class="review-inner">
											<p class="review-content"><?= $reviewBody ?></p>
											<div class="testimonial-author-data mt-auto">
												<div>
													<i class="fas fa-comment fa-lg me-2"></i> <span class="testimonial-name me-1"><?=$reviewItem->firstName?> <?= $reviewItem->lastName ?></span>
												</div>
												<div class="ms-4 text-warning">
													<i class="bi bi-star-fill"></i>
													<i class="bi bi-star-fill"></i>
													<i class="bi bi-star-fill"></i>
													<i class="bi bi-star-fill"></i>
													<i class="bi bi-star-fill"></i>
												</div>
											</div>
										</div>
										<div class="close-quote-review">
											<i aria-hidden="true" class="fas fa-quote-right"></i>
										</div>
									</div>
								</div>
								<?php
							}
						?>
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</div>
