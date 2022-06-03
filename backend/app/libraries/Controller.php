<?php
/*
   * Base Controller
   * Loads the models and views
   */
class Controller
{
  // Load model
  public function model($model)
  {
    // Require model file
    require_once '../app/models/' . $model . '.php';

    // Instatiate model
    return new $model();
  }

  // Load view
  public function view($view, $data = [])
  {
    // Check for view file
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      // View does not exist


      ('View does not exist');
    }
  }


  public function isPostRequest()
  {
    return $_SERVER["REQUEST_METHOD"] == "POST";
  }

  public function json($data)
  {
    header("content-type: application/json");
    echo json_encode($data);
  }

  public function getBody()
  {
    if (count($_POST) > 0) {
      return $_POST;
    }
    return json_decode(file_get_contents("php://input"), true);
  }

  public function session()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    return $_SESSION;
  }

  function dd($data){
    header("content-type: text/html");
    dump($data);
    die();
  }
}
