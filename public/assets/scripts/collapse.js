(function(){
    var triggers=document.querySelectorAll("[data-collapse-target]");
    var collapses=document.querySelectorAll("[data-collapse]");
    if(triggers&&collapses){Array.from(triggers).forEach(function(trigger){return Array.from(collapses).forEach(function(collapse){if(trigger.dataset.collapseTarget===collapse.dataset.collapse){trigger.addEventListener("click",function(){if(collapse.style.maxHeight&&collapse.style.maxHeight!=="0px"){collapse.style.maxHeight=0;trigger.removeAttribute("open")}else{collapse.style.maxHeight="900px";trigger.setAttribute("open","")}})}})})}})();
