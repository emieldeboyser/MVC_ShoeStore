<main class="product_detail">
  <h1><?= $sneaker->title ?></h1>

  <div class="product__image">
    <img src="/images/<?= $sneaker->image ?>" alt="Product image" />
  </div>
  <div class="product__info">
    <div class="product__info__size">Size: EU 44</div>
    <div class="product__info__user"><?= $sneaker->firstname ?> <?= $sneaker->lastname ?></div>
  </div>

  <div class="bids">
    <?php
    if ($bids === null || !is_array($bids)) {
      $highestBid = 0;
      $bidCount = 0;
    } else {
      $highestBid = empty($bids) ? 0 : max($bids);
      $highestBid = $highestBid->bid;
      $bidCount = count($bids);
    }


    ?>
    <h2>Highest Bid €<?= $highestBid ?> (<?= $bidCount ?> bids)</h2>

    <form class="bid" method="post" action="/add-bid">
      <input type="number" name="bid" id="bid" placeholder="Enter your bid" required />
      <input type="hidden" name="sneaker_id" value="<?= $sneaker->id; ?>">

      <button type="submit">Bid</button>
    </form>
    <?php
    foreach ($bids as $bid) {
      include BASE_DIR . '/views/sneaker/_partial/bid_item.php';
    }
    ?>
  </div>
</main>