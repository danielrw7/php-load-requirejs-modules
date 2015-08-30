define(['jquery', 'datatables'], function($, test) {
   return {
      init: function(config) {
         for(var k in config) {
            this.initialize(config[k]);
         }
      },
      initialize: function(options) {
         if (!options.selector) return;
         $(options.selector).DataTable(options);
      }
   }
});
