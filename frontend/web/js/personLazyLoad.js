jQuery.noConflict();
(function( $ ) {
	$(function () {
		$("tr#tr").slice(0, 10).show();
		$(".btn").on('click', function(e) {
			e.preventDefault();
			$("tr:hidden").slice(0, 10).slideDown(1500);
		});
});
})(jQuery);