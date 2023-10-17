<?php

namespace App\Models;

class Ask extends BaseModel
{
  public function add($data)
  {
    $sql = "INSERT INTO sneakers (title, description, brand_id, user_id,  image) VALUES (:p_title, :p_description, :p_brand_id, :p_user_id, :p_image);";
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute([
      ':p_title' => $data['title'],
      ':p_description' => $data['description'],
      ':p_brand_id' => $data['brand_id'],
      ':p_user_id' => 1,
      ':p_image' => basename($data['image'])
    ]);

    print_r($pdo_statement->errorInfo());
  }
}
