const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

    
    function submitData(){
      var username = document.getElementById('username').value
      $(document).ready(function(){
          var data = {
            name: $("#name").val(),
            username: $("#username").val(),
            password: $("#password").val(),
            action: $("#action").val(),
          };
    
          $.ajax({
            url: 'function.php',
            type: 'post',
            data: data,
            success:function(response){
              if(response == "Login Successful"){
                Swal.fire({
                  icon : "success",
                  title : "Hello "+ username + " Selamat bermain",
                  timer : 5000,
                  showCancelButton: false,
                showConfirmButton: false
                })
                let detik 
                detik = setTimeout(move, 5000)
                function move(){
                  location.href = "game.php"
                }
              }else{
                Swal.fire({
                  icon : 'error',
                  title : 'Oops...',
                  text: 'Username & Password Salah',
                  timer : 1000,
                  showCancelButton: false,
                showConfirmButton: false
                })
              }
            }
          });
        });
      }
    
      function submitDataReg(){
    
        var data = {
          name: $("#name2").val(),
          username: $("#username2").val(),
          password: $("#password2").val(),
          action: $("#action2").val(),
        };
    
        if(data.username==""  && data.password== ""){
          Swal.fire({
            title : "gagal",
            icon : "error",
            text : "Username dan Password harus di isi",
            timer : 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
        }else if(data.username && data.password == ""){
    
          Swal.fire({
            title : "gagal",
            icon : "error",
            text : "Password harus di isi",
            timer : 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          
        }else if(data.username == "" && data.password){
    
          Swal.fire({
            title : "gagal",
            icon : "error",
            text : "Username harus di isi",
            timer : 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
    
        }else{
          Swal.fire({
            icon : "success",
            title : "Selamat bermain",
            timer : 2000,
            showCancelButton: false,
                showConfirmButton: false
          })
          var username = document.getElementById('username').value
        $(document).ready(function(){
    
          
    
          $.ajax({
            url: 'function.php',
            type: 'post',
            data: data,
            success:function(response){
              if(data.username === value && data.password === value){
                Swal.fire({
                  icon : "success",
                  title : "Hello Selamat bergabung",
                  timer : 5000,
                  showCancelButton: false,
                showConfirmButton: false,
                })
                let detik 
                detik = setTimeout(move, 5000)
                function move(){
                  location.href = "login.php"
                }
              }else{
                Swal.fire({
                  icon : 'error',
                  title : 'Oops...',
                  text : 'Username & Password Salah',
                  timer : 5000,
                  showCancelButton: false,
                showConfirmButton: false
                })
              }
            }
          });
        });
      }
    
        }