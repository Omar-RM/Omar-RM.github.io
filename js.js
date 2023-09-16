let nav = document.querySelector('#btn-nav');
nav.addEventListener("click", btnSelected, false);

function btnSelected(e) {
    if (e.target !== e.currentTarget) {
        var clicked = e.target.id;
        btnCheck(clicked)
    }
}
var arrayBox = ["skill-data", "frontend", "backend", "languages"];
function currenBox(e) {
    if (e == "btn1") {
        return 0;
    } else if (e == "btn2") {
        return 1;
    } else if (e == "btn3") {
        return 2;
    } else if (e == "btn4") {
        return 3;
    }
}
var disActive;
var itembox;
var boxId = 0;
var previousItembox ;
function btnCheck(e) {
    disActive = document.querySelectorAll('.active');  //select all the queries with an 'active' class
     var temp = currenBox(e); //find current value in the array
    itembox= document.getElementById(arrayBox[temp]); //get the current div item
    previousItembox =document.getElementById(arrayBox[boxId])//store previous div items
    disbaleActive() //remove all the class 'active'
    // var idItem = document.getElementById(e); 
    if (idItem.parentElement.classList.contains('active')) {
        idItem.parentElement.classList.remove('active')
    } else {
        idItem.parentElement.classList.add('active');
        itembox.classList.add('active');
        itembox.style.display=null;
        boxId=temp;
        disableActiveBox();
    }
}
function disableActiveBox(){
   previousItembox.style.display="none";
}
function disbaleActive() {
    disActive.forEach(element => {
        element.classList.remove('active')
    });
}
