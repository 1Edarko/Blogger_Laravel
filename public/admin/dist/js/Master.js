


var title = document.getElementById('title');
var char = document.getElementById('characters');

title.onkeyup = function(){
    'use strict';
    char.textContent = this.value.length;


}