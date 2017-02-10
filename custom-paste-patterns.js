jQuery(document).ready(function($) {
	function maybePasteLink(event, editor, regexPattern) {
		var pastedStr = event.content;
		var regexp = new RegExp(regexPattern, 'i');
		if (!editor.selection.isCollapsed() && !regexp.test(editor.selection.getContent())) {
			pastedStr = pastedStr.replace(/<[^>]+>/g, '');
			pastedStr = tinymce.trim(pastedStr);

			if (regexp.test(pastedStr)) {
				editor.execCommand('mceInsertLink', false, {
					href: editor.dom.decode(pastedStr)
				});
				event.preventDefault();
			}
		}
	}

	tinymce.PluginManager.add('custom_paste_event', function(editor, url) {
		editor.on('pastepreprocess', function(event) {
			for (var i = ntz_mce_custom_paste.custom_patterns.length - 1; i >= 0; i--) {
				maybePasteLink(event, editor, ntz_mce_custom_paste.custom_patterns[i]);
			}
		});
	});
});