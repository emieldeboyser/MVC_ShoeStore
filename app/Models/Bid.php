<?php

namespace App\Models;

class Bid extends BaseModel
{
  protected function getBids($id)
  {
    $sql = 'SELECT bids.id, bid, user_id, sneaker_id, created_at, users.id as u_id, firstname, lastname FROM BIDS
    INNER JOIN users on bids.user_id = users.id
    WHERE sneaker_id = :p_sneaker_id
    ORDER BY bid 
    DESC';

    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute([
      ':p_sneaker_id' => $id
    ]);

    $db_items = $pdo_statement->fetchAll();

    return self::castToModel($db_items);
  }

  public function addBidDetail($data)
  {
    $sql = "INSERT INTO bids (bid, user_id, sneaker_id, created_at) VALUES (:p_bid, :p_user_id, :p_sneaker_id, :p_created_at);";
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute([
      ':p_bid' => $data['bid'],
      ':p_user_id' => 1,
      ':p_sneaker_id' => $data['sneaker_id'],
      ':p_created_at' => date('Y-m-d H:i:s'),
    ]);

    print_r($pdo_statement->errorInfo());
  }
}
