$(document).ready(function(){
  sideNavActiveItem();
});

function sideNavActiveItem() {
  var $location = window.location.pathname;
  switch($location) {
    case '/':
      $('.home').addClass('active');
      break;
    case '/cash':
      $('.cash').addClass('active');
      break;
    case '/warehouse':
      $('.warehouse').addClass('active');
      break;
    case '/abacus':
      $('.abacus').addClass('active');
      break;
    case '/report':
      $('.report').addClass('active');
      break;
    case '/manage':
      $('.manage').addClass('active');
      break;
    case '/customer':
      $('.customer').addClass('active');
      break;
    case '/settings':
      $('.settings').addClass('active');
      break;
  }
}
