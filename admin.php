
<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newProgramme':
    newProgramme();
    break;
  case 'editProgramme':
    editProgramme();
    break;
  case 'deleteProgramme':
    deleteProgramme();
    break;
  default:
    listProgrammes();
}


function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login | Widget News";

  if ( isset( $_POST['login'] ) ) {

    // User has posted the login form: attempt to log the user in

    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {

      // Login successful: Create a session and redirect to the admin homepage
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php" );

    } else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/admin/loginForm.php" );
    }

  } else {

    // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/admin/loginForm.php" );
  }

}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}


function newProgramme() {

  $results = array();
  $results['pageTitle'] = "New Programme";
  $results['formAction'] = "newProgramme";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the programme edit form: save the new programme
    $programme = new Programme;
    $programme->storeFormValues( $_POST );
    $programme->insert();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the programme list
    header( "Location: admin.php" );
  } else {

    // User has not posted the programme edit form yet: display the form
    $results['programme'] = new Programme;
    require( TEMPLATE_PATH . "/admin/editProgramme.php" );
  }

}


function editProgramme() {

  $results = array();
  $results['pageTitle'] = "Edit Programme";
  $results['formAction'] = "editProgramme";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the programme edit form: save the programme changes

    if ( !$programme = Programme::getById( (int)$_POST['programmeId'] ) ) {
      header( "Location: admin.php?error=programmeNotFound" );
      return;
    }

    $programme->storeFormValues( $_POST );
    $programme->update();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the programme list
    header( "Location: admin.php" );
  } else {

    // User has not posted the programme edit form yet: display the form
    $results['programme'] = Programme::getById( (int)$_GET['programmeId'] );
    require( TEMPLATE_PATH . "/admin/editProgramme.php" );
  }

}


function deleteProgramme() {

  if ( !$programme = Programme::getById( (int)$_GET['programmeId'] ) ) {
    header( "Location: admin.php?error=programmeNotFound" );
    return;
  }

  $programme->delete();
  header( "Location: admin.php?status=programmeDeleted" );
}


function listProgrammes() {
  $results = array();
  $data = Programme::getList();
  $results['programmes'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Programmes";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "programmeNotFound" ) $results['errorMessage'] = "Error: Programme not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "programmeDeleted" ) $results['statusMessage'] = "Programme deleted.";
  }

  require( TEMPLATE_PATH . "/admin/listProgrammes.php" );
}

?>