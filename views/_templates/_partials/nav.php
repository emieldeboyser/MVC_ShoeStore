 <header>
     <div class="brand">SneakerX</div>
     <form class="search">
         <input type="text" crocs="Search" name="search" />
         <button type="submit">Search</button>
     </form>
     <div>
         <span>Dieter De Weirdt</span>
         <a href="/auth" class="">Logout</a>
         <a href="/add" class="button">Add sneaker</a>
     </div>
 </header>
 <nav>
     <a href="/" class="<?= (!$current_brand) ? 'active' : ''; ?>">Home</a>
     <?php foreach ($brands as $brand) : ?>
         <a href="/brand/<?= $brand->slug ?>" class="<?= ($current_brand && $current_brand->id == $brand->id) ? 'active' : ''; ?>"><?= $brand->name ?></a>
     <?php endforeach; ?>
 </nav>