<?php

class People extends Controller
{
    //properties
    private $countryModel;

    // Dit is de contructor van de controller
    public function __construct()
    {
        // Dit is de model van de controller
        $this->countryModel = $this->model('People');
    }


    public function index($land = 'Nederland', $age = 21)
    {
        $records = $this->countryModel->getPeople();

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->id</td>
                        <td>$items->Name</td>
                        <td>$items->CapitalCity</td>
                        <td>$items->Continent</td>
                        <td>$items->Population</td>
                        <td><a href='" . URLROOT . "/Peoples/update/$items->id'>Update</a></td>
                        <td><a href='" . URLROOT . "/Peoples/delete/$items->id'>Delete</a></td>
                       </tr>"; 
        }
        
        // var_dump($records);
        $data = [
            'title' => 'Overzicht van alle Rijke mensen',
            'rows' => $rows
        ];

        $this->view('Peoples/index', $data);

    }

    public function update($id = null){
        // var_dump($id);exit();
        //var_dump($_SERVER);exit();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->countryModel->updateCountry($_POST);
        header("Location: " . URLROOT . "/Peoples/index");
        } else {
            $row = $this->countryModel->getSingleCountry($id);
            $data = [
                'title' => '<h1>Update land</h1>',	
                'row' => $row
            ];
            $this->view("Peoples/update", $data);
        }
        
    }

    public function delete($id = null){
        //echo $id;exit();
        $this->countryModel->deleteCountry();
        $data =[
            'deleteStatus' => "Het record met id  = $id is verwijderd"

        ];
        $this->view("countries/delete", $data); 
        header("Refresh:2; url=" . URLROOT . "/countries/index");
        } 
    

    public function test()
    {
        $data = [
            'title' => 'Tijd voor een pro PHP moment',
        ];
        $this->view('countries/test', $data);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // POST schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this -> countryModel->createCountry($_POST);

            if ($result) {
                echo "Het is gelukt!";
                header("Refresh:3; URL=" . URLROOT . "/countries/index");
            } else {
                echo "Het is niet gelukt!";
                header("Refresh:3; URL=" . URLROOT . "/countries/index");
            }
        }
        
        $data = [
            'title' => 'voeg een nieuw land toe'
        ];
        $this->view('countries/create', $data);
    }
}