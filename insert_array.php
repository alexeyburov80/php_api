<?php
    require_once 'conn.php';
    try {
        if (isset($_POST['array'])) {
            $backup_item = $_POST['contact_list'];
            $contact_list = json_decode($backup_item);
            $source_id = $contact_list->source_id;
            $arr = $contact_list->items;
            $query = "INSERT INTO `contacts` (source_id, name, phone, email) VALUES";
            $format = ' (%s, "%s", %s, "%s"),';
            foreach ($arr as $value) {
                $query .= sprintf($format, $source_id, $value->name, $value->phone, $value->email);
            }
           $res = $conn->exec(substr_replace($query,';',-1));

            $conn = null;
            header('location: index.php?response='.$res);
        }
    }
    catch (PDOException $e) {
        header('location: errors.php?err=' . $e->getMessage());
    }
    catch (Exception $e)
    {
        header('location: errors.php?err=' . $e->getMessage());
    }

?>