(function ($, window, document, undefined) {
	"use strict";

	var pluginName = "smSwitcher",
		defaults = {
			theme: "dark",
		};

	function Plugin(element, options) {
		this.element = element;
		this.settings = $.extend({}, defaults, options);
		this._defaults = defaults;
		this._name = pluginName;
		this.init();
	}

	$.extend(Plugin.prototype, {
		init() {
			$(".sw-theme-switcher").on("click", () => {
				$("body").toggleClass("swdark");
			});
		},
	});

	$.fn[pluginName] = function (options) {
		return this.each(function () {
			if (!$.data(this, "plugin_" + pluginName)) {
				$.data(this, "plugin_" + pluginName, new Plugin(this, options));
			}
		});
	};

	$(() => {
		$(document).smSwitcher();
	});
})(jQuery, window, document);
