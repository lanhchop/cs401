<?php
require_once("dao.php");
class scheduleDao extends Dao
{

    public function joinGame($user_id, $event_id)
    {
        $dbh = $this->getConnection();
        $stmt = $dbh->prepare("INSERT INTO schedule (user_id, event_id) VALUES (:user_id, :event_id);");
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function leaveGame($user_id, $event_id)
    {
        $dbh = $this->getConnection();
        $stmt = $dbh->prepare("DELETE from schedule where user_id=:user_id AND event_id=:event_id"); 
        //no $ cuz sql cmd, not php variables
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    function getAttendees($event_id){
        $dbh = $this->getConnection();
        $stmt = $dbh->prepare("SELECT user_id FROM SCHEDULE WHERE event_id = :event_id");
        $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
