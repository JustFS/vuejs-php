<?php

namespace models;

require_once 'Model.php';

class Wines extends Model
{
  public function list($limit)
  {
    $sql = $this->pdo->query("
      SELECT * 
      FROM wines 
      ORDER BY publish_date 
      DESC
      $limit
    ");
    $sql->setFetchMode(\PDO::FETCH_ASSOC);

    return $sql;
  }

  public function create()
  {
    $sth = $this->pdo->prepare("
      INSERT INTO wines (name, year, grapes, country, region, description, picture, author) 
      VALUES (:name,:year, :grapes, :country, :region,:description, :picture, :author)
    ");

    return $sth;
  }

  public function update(int $id)
  {
    $sth = $this->pdo->prepare("
      UPDATE wines 
      SET name=:name, year=:year, grapes=:grapes,country=:country, region=:region, description=:description
      WHERE id=$id
    ");

    return $sth;
  }

  public function delete(int $id)
  {
    $sql = $this->pdo->query("DELETE FROM wines WHERE id=$id");

    return $sql;
  }
}
