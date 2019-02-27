$(function() {
    $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
        e.preventDefault();
        $("#dialog-confirm").dialog("close");
    });
    $("a[href]:not(#dialog-confirm a)").click(function(e) {
        e.preventDefault();
        $("#dialog-confirm").dialog("option", "title", $(this).text()).dialog("open").find("a.ok").attr({href: this.href, target: this.target});
    });
});
