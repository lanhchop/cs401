<?php
require_once 'dao.php';
class eventDao extends dao
{
    public function createEvent($host_user_id, $game, $location, $date, $players)
    {
        $dbh = $this->getConnection();
        $stmt = $dbh->prepare("INSERT INTO event (host_user_id, game, location, date, players) VALUES (:host_user_id, :game, :location, :date, :players);");
        $stmt->bindValue(':host_user_id', $host_user_id, PDO::PARAM_INT);
        $stmt->bindValue(':game', $game, PDO::PARAM_STR);
        $stmt->bindValue(':location', $location, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':players', $players, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function getFutureEvents()
    {
        $conn = $this->getConnection();

        $query = <<<SQL
SELECT *
FROM event
JOIN users
  ON event.host_user_id = users.user_id
    AND event.date >= NOW();
SQL;

        $stmt = $conn->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

}
