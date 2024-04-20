function sweetalertclick(){ //Alerta contacto
  var name = document.forms["FormConctacto"]["nameContacto"].value;
  var lastname = document.forms["FormConctacto"]["lastnameContacto"].value;
  var email = document.forms["FormConctacto"]["emailContacto"].value;
  var phone = document.forms["FormConctacto"]["phoneContacto"].value;
  var msg = document.forms["FormConctacto"]["msgContacto"].value;
  var error_flag = 0; 

  if(name == '' || lastname == '' || email == '' || phone == '' || msg === ''){
    error_flag = 1;
    if (error_flag == 1){
      swal.fire({
        position: 'top-center',
        icon: 'error',
        title: '¡Faltan campos por llenar!',
        showConfirmButton: false,
        timer: 2500
      });
      error_flag = 0;
    }
  } else {
    swal.fire({
      position: 'top-center',
      icon: 'success',
      title: '¡Información enviada correctamente!',
      showConfirmButton: false,
      timer: 2500
    });
  };
};

/*function regAlert(){ //Alerta registro
  var name = document.forms["regForm"]["nameCompany"].value;
  var email = document.forms["regForm"]["emailCompany"].value;
  var pass1 = document.forms["regForm"]["passCompany"].value;
  var pass2 = document.forms["regForm"]["confirm_passCompany"].value;
  var direction = document.forms["regForm"]["ubiCompany"].value;
  var phone = document.forms["regForm"]["phoneCompany"].value;
  var error_flag = 0; 

  if(name == '' || email == '' || pass1 == '' || pass2 == '' || direction == '' || phone == '') {
    error_flag = 1;
    if (error_flag == 1){
      swal.fire({
      position: 'top-center',
      icon: 'error',
      title: '¡Faltan campos por llenar!',
      showConfirmButton: false,
      timer: 2500
      });
      error_flag = 0;
    }
  } else {
    swal.fire({
      position: 'top-center',
      icon: 'success',
      title: '¡Ya eres parte de la familia FOODCHIIDA!',
      showConfirmButton: false,
      timer: 2500
     });
  };
};*/

/*function loginAlert(){ //Alerta Login
  var email = document.forms["logForm"]["emailCompany"].value;
  var pass1 = document.forms["logForm"]["passCompany"].value;
  var error_flag = 0; 

  if(email == '' || pass1 == ''){
    error_flag = 1;
    if (error_flag == 1){
      swal.fire({
      position: 'top-center',
      icon: 'error',
      title: '¡Faltan campos por llenar!',
      showConfirmButton: false,
      timer: 2500
      });
      error_flag = 0;
    }
  } else {
    swal.fire({
      position: 'top-center',
      icon: 'success',
      title: '¡Bienvenido de regreso!',
      showConfirmButton: false,
      timer: 2500
     });
  };
};*/