<?php

require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'archive':
    archive();
    break;
  case 'viewProgramme':
    viewProgramme();
    break;
  case 'infos':
    infos();
    break;
  case 'contact':
    contact();
    break;
  case 'programmation':
    programmation();
    break;
  case 'billeterie':
    billeterie();
    break;
  case 'mentionLegales':
    mentionsLegales();
    break;
  default:
    homepage();
}


function archive() {
  $results = array();
  $data = Programme::getList();
  $results['programmes'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Programme Archive | ArtsMotsRia";
  require( TEMPLATE_PATH . "/archive.php" );
}

function viewProgramme() {
  if ( !isset($_GET["programmeId"]) || !$_GET["programmeId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results['programme'] = Programme::getById( (int)$_GET["programmeId"] );
  $results['pageTitle'] = $results['programme']->title . " | Programme";
  require( TEMPLATE_PATH . "/viewProgramme.php" );
}

function homepage() {
  $results['pageTitle'] = "ArstMotsRia";
  require( TEMPLATE_PATH . "/homepage.php" );
}

function infos() {
  $results['pageTitle'] = "Infos pratiques";
  require( TEMPLATE_PATH . "/infos.php" );
}

function contact() {
  $results['pageTitle'] = "Contact";
  require( TEMPLATE_PATH . "/contact.php" );
}

function admin() {
  $results['pageTitle'] = "Mon Compte";
  require( "/admin.php" );
}

function programmation() {
  $results = array();
  $data = Programme::getList( HOMEPAGE_NUM_ARTICLES );
  $results['programmes'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Programmation";
  require( TEMPLATE_PATH . "/programmation.php" );
}

function billeterie() {
  $results['pageTitle'] = "Billeterie";
  require( TEMPLATE_PATH . "/billeterie.php" );
}

function mentionsLegales() {
  $results['pageTitle'] = "Mention Légales";
  require( TEMPLATE_PATH . "/mentionsLegales.php" );
}
?>