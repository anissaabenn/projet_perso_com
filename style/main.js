var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

let article = document.getElementsByClassName('article');


function displayModal(elem) {
  id = elem.id.split('_')[1];
  modal = document.getElementById('myModal_'+id);
  modal.style.display = "block";
  }

span.onclick = function() {
    modal.style.display = "none";
  }

window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }