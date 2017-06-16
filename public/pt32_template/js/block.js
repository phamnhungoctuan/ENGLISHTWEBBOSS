  function accept_del(msg){
    if(window.confirm(msg)){
      return true;
    }
      return false;
  }

  function goback() {
    history.back(-1)
}
jQuery(document).ready(function($){ 
      $('.block-success').delay(3000).slideUp();
    });