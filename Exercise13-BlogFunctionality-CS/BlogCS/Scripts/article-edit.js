/* Last modified by Asen Kiprov on 10-Dec-2017 */

$("#saveButton").hide();
var oldArticle = $("form").serialize();
$("#Title").on("change", function () {
    var newArticle = $("form").serialize();
    if (newArticle != oldArticle) {
        $("#saveButton").show();
    }
    else {
        $("#saveButton").hide();
    }
});
$("#Content").on("change", function () {
    var newArticle = $("form").serialize();
    if (newArticle != oldArticle) {
        $("#saveButton").show();
    }
    else {
        $("#saveButton").hide();
    }
});