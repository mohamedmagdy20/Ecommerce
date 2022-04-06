$(".navspan").click(() => {
    $(".sidebar").animate({ width: "300px" }, 500);
    $(".navspan").animate({ marginLeft: "300px" }, 500);
});

$("#Exit").click(() => {
    $(".sidebar").animate({ width: "0px" }, 500);
    $(".navspan").animate({ marginLeft: "0" }, 500);
});
$(".nav-cart").click(() => {
    $(".cart").slideToggle(500);
});

setTimeout(function () {
    $("#success").fadeOut("fast");
}, 2000);

$("#input").click(() => {
    $("#label").fadeIn(1000);
});

//== Select kind of shipment ==//

var select = document.getElementById("select");
var select_sub = document.getElementById("shipment");
var cencle = document.getElementById("cencle");
var fixedbox_submit = document.getElementById("fixedbox_submit");
var close = document.getElementById("close");
var fixedBox = document.getElementById("fixedBox");
// select.addEventListener("click", function (e) {
//     var target = e.target;
//     console.log(target);
//     fixedBox.classList.replace("d-flex", "d-none");
// });
select_sub.addEventListener("click", function (e) {
    // var target = e.target;
    console.log("slkls");
    fixedbox_submit.classList.replace("d-none", "d-flex");
});
close.addEventListener("click", function (e) {
    fixedbox_submit.classList.replace("d-flex", "d-none");
});

cencle.addEventListener("click", function (e) {
    fixedbox_submit.classList.replace("d-flex", "d-none");
});
