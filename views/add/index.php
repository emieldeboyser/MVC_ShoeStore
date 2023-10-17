<main>
  <h2>Een sneaker toevoegen</h2>
  <form action="/add-sneaker" method="POST">
    <label>
      Naam
      <input type="text" maxlength="256" name="title" required>
    </label>
    <label>
      Omschrijving
      <textarea name="description"></textarea>
    </label>
    <label>
      Categorie
      <select required name="brand_id">
        <option value="">Kies een categorie</option>
        <?php foreach ($brands as $brand) : ?>
          <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>
      Maat
      <input type="number" name="size" min="20" max="55" required>
    </label>

    <label>
      Afbeelding
      <input type="file" accept="image/*" name="image">
    </label>

    <button type="submit" class="button">Toevoegen</button>
  </form>
</main>