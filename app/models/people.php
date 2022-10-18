<?php   
/**
 * Dit is de model van de controller
 */

class Country
{
    //properties
    private $db;
    // Dit is een contsructor van de country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCountries()
    {
        $this->db->query('SELECT * FROM Country');
        return $this->db->resultSet();
    }

    public function getSingleCountry($id)
    {
        $this->db->query('SELECT * FROM Country WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateCountry($post)
    {
        $this->db->query("UPDATE country
                            SET Name = :name,
                                CapitalCity = :capitalcity,
                                Continent = :continent,
                                Population = :population
                            WHERE id = :id");

        $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
        $this->db->bind(':name', $post['name'], PDO::PARAM_STR);
        $this->db->bind(':capitalcity', $post['Vermogen'], PDO::PARAM_STR);
        $this->db->bind(':continent', $post['Leeftijd'], PDO::PARAM_STR);
        $this->db->bind(':population', $post['Bedrijf'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deleteCountry($id) {

        $this->db->query("DELETE FROM country WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createCountry($post)
    {
        //var_dump($post);exit();
        $this->db->query("INSERT INTO country (id,
                        Name,
                        Vermogen,
                        Leeftijd,
                        Bedrijf )
            VALUES     (:id,
                        :name,
                        :Vermogen,
                        :Leeftijd,
                        :Bedrijf)");

        $this->db->bind(':id',NULL, PDO::PARAM_NULL);
        $this->db->bind(':name',$post['name'], PDO::PARAM_STR);
        $this->db->bind(':Vermogen',$post['Vermogen'], PDO::PARAM_STR);
        $this->db->bind(':Leeftijd',$post['Leeftijd'], PDO::PARAM_STR);
        $this->db->bind(':Bedrijf',$post['Bedrijf'], PDO::PARAM_INT);
        return $this->db->execute();
    }

}

?>