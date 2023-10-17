<?php

namespace App\Models;

class Sneaker extends BaseModel
{
  protected function get($brand_id = null)
  {

    if ($brand_id) {
      $sql = 'SELECT
      sneakers.id,
      sneakers.user_id,
      title,
      description,
      brand_id,
      image,
      users.id as u_id,
      firstname,
      lastname,
      COUNT(bids.id) as num_bids,
      MAX(bids.bid) as highest_bid_amount, 
      MAX(bids.created_at) as latest_bid_created_at
      FROM sneakers
      INNER JOIN users ON sneakers.user_id = users.id
      LEFT JOIN bids ON sneakers.id = bids.sneaker_id
      WHERE brand_id = :p_brand_id
      GROUP BY
      sneakers.id,
      sneakers.user_id,
      title,
      description,
      brand_id,
      image,
      users.id,
      firstname,
      lastname
      ORDER BY num_bids DESC;

      LIMIT 20';
      $pdo_statement = $this->db->prepare($sql);
      $pdo_statement->execute([
        ':p_brand_id' => $brand_id
      ]);
    } else {
      $sql = 'SELECT
                sneakers.id,
                sneakers.user_id,
                title,
                description,
                brand_id,
                image,
                users.id as u_id,
                firstname,
                lastname,
                COUNT(bids.id) as num_bids,
                MAX(bids.created_at) as latest_bid_created_at
              FROM sneakers
              INNER JOIN users ON sneakers.user_id = users.id
              LEFT JOIN bids ON sneakers.id = bids.sneaker_id
              GROUP BY
                sneakers.id,
                sneakers.user_id,
                title,
                description,
                brand_id,
                image,
                users.id,
                firstname,
                lastname
              ORDER BY num_bids DESC;

              LIMIT 20';
      $pdo_statement = $this->db->prepare($sql);
      $pdo_statement->execute();
    }

    $db_items = $pdo_statement->fetchAll();

    return self::castToModel($db_items);
  }
  protected function findById($id)
  {
    $sql = 'SELECT sneakers.id, sneakers.user_id, title, description, brand_id, image, users.id as u_id, firstname, lastname
      FROM sneakers
      INNER JOIN users ON sneakers.user_id = users.id
      where sneakers.id = :p_sneakers_id';
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute([
      ':p_sneakers_id' => $id
    ]);

    $db_item = $pdo_statement->fetch();

    return self::castToModel($db_item);
  }

  protected function search($brand_id = null)
  {
    $search = $_GET['search'] ?? null;

    $sql = 'SELECT sneakers.id, sneakers.user_id, title, description, brand_id, image, users.id as u_id, firstname, lastname
            FROM sneakers
            INNER JOIN users ON sneakers.user_id = users.id';

    if ($brand_id !== null) {
      $sql .= ' WHERE brand_id = :p_brand_id AND title LIKE :p_search';
    } else {
      $sql .= ' WHERE title LIKE :p_search';
    }

    $pdo_statement = $this->db->prepare($sql);

    $parameters = [
      ':p_search' => '%' . $search . '%'
    ];

    if ($brand_id !== null) {
      $parameters[':p_brand_id'] = $brand_id;
    }

    $pdo_statement->execute($parameters);

    $db_items = $pdo_statement->fetchAll();

    return self::castToModel($db_items);
  }
}
