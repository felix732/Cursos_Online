
 const pass = document.getElementById("pass");
       icon = document.querySelector(".bx");
icon.addEventListener("click", e => {
  if (pass.type === "password") {
      pass.type = "text";
      icon.classList.remove('bx-show')
      icon.classList.add('bx-hide')
  } else {
    pass.type = "password"
    icon.classList.add('bx-show')
    icon.classList.remove('bx-hide')
  }
})

