"use strict";

var mywindow = document.getElementById('mywindow'),
    addapplication = document.getElementById('addapplication'),
    close = document.querySelector('.close');
addapplication.style.height = '50px';
addapplication.style.width = '50px';
addapplication.style.position = 'fixed,bottom:0,right:0';

addapplication.onclick = function () {
  mywindow.style.display = 'block'; // addapplication.style.display='none';
};

close.onclick = function () {
  mywindow.style.display = 'none'; // addapplication.style.display='block';
};

mywindow.onclick = function (event) {
  if (event.target == mywindow) {
    mywindow.style.display = 'none'; // addapplication.style.display='block';
  }
};