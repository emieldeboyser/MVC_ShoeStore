<a href="/sneaker/<?= $sneaker->id ?>" class="product">
    <div class="product__image">
        <img src="/images/<?= $sneaker->image ?>" alt="<?= $sneaker->title ?>" />
    </div>
    <div class="product__info">
        <h3 class="product__info__title"><?= $sneaker->title ?></h3>
        <div class="product__info__size">Size: EU 44</div>
        <div class="product__info__user"><?= $sneaker->firstname ?> <?= $sneaker->lastname ?></div>

        <div class="product__info__price">
            Highest Bid: €<?= $sneaker->highest_bid_amount ?? 'N/A' ?> (<?= $sneaker->num_bids ?> bids)
        </div>

    </div>

</a>