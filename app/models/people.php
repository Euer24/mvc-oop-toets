<?php   
/**
 * Dit is de model van de controller
 */

class People
{
    //properties
    private $db;
    // Dit is een contsructor van de country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPeoples()
    {
        $this->db->query('SELECT * FROM People');
        return $this->db->resultSet();
    }

    public function getSinglePeople($id)
    {
        $this->db->query('SELECT * FROM People WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updatePeople($post)
    {
        $this->db->query("UPDATE people
                            SET Name = :name,
                            Nettoworth = :Nettoworth,
                            Age = :Age,
                            Company = :Company
                            WHERE id = :id");
    // hier naam change?
        $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
        $this->db->bind(':name', $post['name'], PDO::PARAM_STR);
        $this->db->bind(':Nettoworth', $post['Vermogen'], PDO::PARAM_STR);
        $this->db->bind(':Age', $post['Age'], PDO::PARAM_STR);
        $this->db->bind(':Company', $post['Company'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deletePeople($id) {

        $this->db->query("DELETE FROM people WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createPeople($post)
    {
        //var_dump($post);exit();
        $this->db->query("INSERT INTO people (id,
                        Name,
                        Nettoworth,
                        Age,
                        Company )
            VALUES     (:id,
                        :name,
                        :Nettoworth,
                        :Age,
                        :Company)");

        $this->db->bind(':id',NULL, PDO::PARAM_NULL);
        $this->db->bind(':name',$post['name'], PDO::PARAM_STR);
        $this->db->bind(':Nettoworth',$post['Nettoworth'], PDO::PARAM_STR);
        $this->db->bind(': Age',$post['Age'], PDO::PARAM_STR);
        $this->db->bind(':Company',$post['Company'], PDO::PARAM_INT);
        return $this->db->execute();
    }

}

?>