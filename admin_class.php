<?php
ini_set('display_errors', 1);
?>
<?php
$poster = new Action();

if (isset($_POST['post'])) {
	if (isset($_POST['title'])) {
		$title = $_POST['title'];
	}
	if (isset($_POST['content'])) {
		$content = $_POST['content'];
	}
	if (isset($_POST['location'])) {
		$location = $_POST['location'];
	}

	$poster->save_post($title, $content, $location);
	if (isset($_POST['img'])) {

		$count = count($_POST['img']);
		for ($i = 0; $i < $count; $i++) {
			$image = $_POST['img'][$i];
			$namePhoto = $_POST['namePhoto'][$i];
			$category = $_POST['category'][$i];
			$poster->save_photo($image, $namePhoto, $category);
		}
	}
}


if (!isset($_SESSION)) {
	session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$_SESSION['postdata'] = $_POST;
	unset($_POST);
	header("Location: " . $_SERVER['PHP_SELF']);
	exit;
}
?>

?>
<?php
class Action
{
	private $db;


	public function __construct()
	{
		include 'db_connect.php';

		$this->db = $conn;
	}
	function getID()
	{
		$sql = "SELECT MAX(idPost) as maxID from post";
		$res = mysqli_query($this->db, $sql);
		return $res->fetch_assoc();
	}

	function save_post($title, $content, $location)
	{
		$sql = "INSERT INTO post (title,descriptions,location) 
			VALUES ('$title','$content','$location')";
		$res = mysqli_query($this->db, $sql);

		$idPostQuery = $this->getID();
		$idPost = (int) $idPostQuery['maxID'];
		mkdir('assets/uploads/' . $idPost);

		return $res;
	}
	function save_photo($image, $namePhoto, $category)
	{
		$idCategory = (int) $category;
		$idPostQuery = $this->getID();
		$idPost = (int) $idPostQuery['maxID'];
		//Sẽ check và put vào folder
		$fname = strtotime(date('Y-m-d H:i')) . "_" . $namePhoto . ".jpg";
		//Vào folder uploads
		file_put_contents('assets/uploads/' . $idPost . '/' . $fname, file_get_contents($image));
		$sql = "INSERT INTO photos (image,namePhoto,idPost,idCategory)
			VALUES ('$fname','$namePhoto',$idPost,$idCategory)";
		$res = mysqli_query($this->db, $sql);
		//Tạo folder theo ID
		return $res;
	}

}

?>