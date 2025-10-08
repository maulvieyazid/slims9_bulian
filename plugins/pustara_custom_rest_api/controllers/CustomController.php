<?php

require_once SB . "api/v1/controllers/Controller.php";

class CustomController extends Controller
{
    protected $sysconf;

    /**
     * @var mysqli
     */
    protected $db;

    function __construct($sysconf, $obj_db)
    {
        $this->sysconf = $sysconf;
        $this->db = $obj_db;
    }

    public function getLatestBooks()
    {
        // Get the base URL dynamically
        $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

        // Path to the images directory
        $path = $base_url . SWB . IMG . '/docs/';

        // Get latest book from search_biblio table
        $sql = "SELECT biblio_id, title, 
                        CONCAT('$path', image) AS image
                FROM search_biblio 
                WHERE opac_hide < 1 
                ORDER BY input_date DESC
                ";

        $query = $this->db->query($sql);


        $response = [
            'status' => 200,
            'data' => $query->fetch_all(MYSQLI_ASSOC),
        ];

        parent::withJson($response);
    }
}
