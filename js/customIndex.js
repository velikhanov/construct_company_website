if(document.getElementById('submitBtn')){
document.getElementById('submitBtn').onclick = function(e) {
  e.preventDefault();
  const send = {
    name: document.querySelector('input[name=name]').value,
    phone: document.querySelector('input[name=phone]').value,
    token: document.querySelector('input[name=token]').value
  };
  const jsonString = JSON.stringify(send);
  const isIE = /*@cc_on!@*/false || !!document.documentMode;
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'configs/contact.php', true);
  xhr.setRequestHeader('Content-type', 'application/json');
  xhr.onload = function() {
        if (this.readyState == 4 && this.status == 200) {

            if(xhr.responseText == 'Ошибка проверки токена безопасности! Свяжитесь с администратором!'){
              if(!isIE){
                if(document.querySelector('.toast-header').classList.contains('bg-success')){
                  document.querySelector('.toast-header').classList.remove('bg-success');
                  document.querySelector('.toast-header').classList.add('bg-danger');
                };
                document.querySelector(".notif_text").innerHTML = this.responseText;
              }else{
                alert(xhr.responseText);
              };
            }else{
              //
                if((send['name'].length >= 2) && (send['name'].length <= 50) && (send['phone'].length == 17)){
                  document.getElementById('appForm').reset();
                  if(!document.querySelector('input[name=name]').hasAttribute('readonly') && !document.querySelector('input[name=phone]').hasAttribute('readonly')){
                    document.querySelector('input[name=name]').disabled = true;
                    document.querySelector('input[name=phone]').disabled = true;
                  };
                  if(!document.getElementById('submitBtn').classList.contains('disabled')){
                    document.getElementById('submitBtn').classList.add('disabled');
                  };
                  if(!isIE){
                  if(document.querySelector('.toast-header').classList.contains('bg-danger')){
                    document.querySelector('.toast-header').classList.remove('bg-danger');
                    document.querySelector('.toast-header').classList.add('bg-success');
                  };
                }else{
                  alert(xhr.responseText);
                };
                }else{
                  if(!isIE){
                  if(document.querySelector('.toast-header').classList.contains('bg-success')){
                      document.querySelector('.toast-header').classList.remove('bg-success');
                      document.querySelector('.toast-header').classList.add('bg-danger');
                  };
                }else{
                  alert(xhr.responseText);
                };
                };
                //
              document.querySelector(".notif_text").innerHTML = this.responseText;
            }
            if(!isIE){
              var toastElList = [].slice.call(document.querySelectorAll('.toast'))
              var toastList = toastElList.map(function(toastEl) {
              // Creates an array of toasts (it only initializes them)
                return new bootstrap.Toast(toastEl) // No need for options; use the default options
              });
             toastList.forEach(function(toast) { toast.show() }); // This show them
           };
       };
    };
  xhr.send(jsonString);
};
};
