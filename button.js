function tiny_plugin() {
    return "[tiny-plugin]";
}
 
(function() {
    tinymce.create('tinymce.plugins.blue', {
 
        init : function(ed, url){
            ed.addButton('tinyplugin', {
            title : 'Add Button',
                onclick : function() {
                    ed.selection.setContent('[button link="#" target="_blank" color="default" shape="rounded" size="small" align="left"]Replace This Text[/button]');
                },
                image: url + "/button.png"
            });
        }
    });
 
    tinymce.PluginManager.add('tinyplugin', tinymce.plugins.blue);
})();

Jquery(function() {
	$(".bk-button").hover(function () {	
		// SET OPACITY TO 50%
		$(this).stop().animate({
		opacity: .5
		}, "slow");
	},
	
	// ON MOUSE OUT
	function () {
		// SET OPACITY BACK TO 50%
		$(this).stop().animate({
		opacity: 0
		}, "slow");
	});
});
