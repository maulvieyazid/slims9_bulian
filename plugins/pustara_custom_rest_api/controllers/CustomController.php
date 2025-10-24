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

    public function activateMember($token)
    {
        // Decrypt token nya, kalau token tidak valid akan otomatis menampilkan halaman error
        $memberId = decrypt($token);

        // Kalau sudah dapat memberId, cek apakah memberId tersebut sudah aktif atau belum
        $pdo = \SLiMS\DB::getInstance();
        $stmt = $pdo->prepare("SELECT is_pending FROM member WHERE member_id = :member_id");
        $is_pending = $stmt->execute(['member_id' => $memberId]) ? $stmt->fetchColumn() : null;

        // Kalau is_pending bernilai 0 (sudah aktif), maka langsung lemparkan ke halaman login saja
        if (!$is_pending) {
            redirect('?p=member');
        }

        // Kalau belum aktif, maka update is_pending menjadi 0 (aktif)
        $stmt = $pdo->prepare("UPDATE member SET is_pending = 0 WHERE member_id = :member_id");
        $stmt->execute(['member_id' => $memberId]);

        // Lalu arahkan ke halaman informasi akun berhasil diaktifkan
        redirect('?p=activated_self_register');
    }
}
