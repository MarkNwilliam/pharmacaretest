<?php

$cache_file = "customer.json";
   header('Content-Type: text/javascript; charset=utf8');
?>
var customerList = <?php echo file_get_contents($cache_file); ?> ; 

APchange = function(event, ui){
	$(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
    $(function() {
      
        $( ".customerSelection" ).autocomplete(
		{
            source:customerList,
			delay:300,
			focus: function(event, ui) {
				$(this).parent().find(".customer_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				return false;
			},
			select: function(event, ui) {
				$(this).parent().find(".customer_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				$(this).unbind("change");
				return false;
			}
		});
			$( ".customerSelection" ).focus(function(){
				$(this).change(APchange);
			
			});
    });
