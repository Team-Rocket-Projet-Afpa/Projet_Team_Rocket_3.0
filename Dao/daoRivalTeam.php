<?php

class DaoRivalTeam
{
    public function showRivalteamList(): array
    {
        $pdo = Dao::getConnection(); // Connection to the DB
        $tab = [];
        $request = $pdo->prepare("SELECT * FROM equipe_adverse"); // Prepare the request to be executed

        try {
            $request->execute(); // execute the request

            while ($line = $request->fetch(PDO::FETCH_ASSOC))   // While all datas are not display the loop keeps going
            {
                $line['Id_equipe_adverse'];
                $line['Nom_equipe'];

                $tab[] = $line;  //  $tab is where $line's containt is stocked
            }

            return $tab;
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }

    public function showOneRivalTeam($idRivalTeam): array
    {
        $pdo = Dao::getConnection(); // Connection to the DB
        $tab = [];
        $request = $pdo->prepare("SELECT * FROM equipe_adverse WHERE equipe_adverse.Id_equipe_adverse=?"); // Prepare the request to be executed

        try {
            $request->execute(array($idRivalTeam)); // execute the request

            while ($line = $request->fetch(PDO::FETCH_ASSOC))   // While all datas are not display the loop keeps going
            {
                $line['Id_equipe_adverse'];
                $line['Nom_equipe'];

                $tab[] = $line;  //  $tab is where $line's containt is stocked
            }

            return $tab;
            $request->closeCursor();
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }

    public function addRivalTeam($rivalTeam): void
    {

        $pdo = Dao::getConnection();     // Connection to the DB
        $request = $pdo->prepare("INSERT INTO equipe_adverse (Nom_equipe) VALUES (?)");  // Prepare the request to be execute

        try {
            $request->execute(array($rivalTeam->get_nameRivalTeam(),));    // Execute the request
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }

    public function modifyRivalTeam($rivalTeam): void
    {

        $pdo = Dao::getConnection();     // Connection to the DB       
        $request = $pdo->prepare("UPDATE equipe_adverse SET Nom_equipe=? WHERE Id_equipe_adverse=?");  // Prepare the request to be execute

        try {
            $request->execute(array($rivalTeam->get_nameRivalTeam(), $rivalTeam->get_idRivalTeam()));    // Execute the request

        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }

    public function deleteRivalTeam($idRivalTeam): void
    {
        $pdo = Dao::getConnection();     // Connection to the DB
        $request = $pdo->prepare("DELETE FROM equipe_adverse WHERE Id_equipe_adverse=?"); // Prepare the request to be execute

        try {
            $request->execute(array($idRivalTeam));    // Execute the request
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }
}
